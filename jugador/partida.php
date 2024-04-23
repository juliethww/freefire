<?php
require_once("../conexion/conexion.php");
$db = new Database();
$conn = $db->conectar(); // Obtener la conexión a la base de datos


?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partida</title>
    <style>
        /* Estilos CSS */
        .container {
            text-align: center;
            margin: 50px auto;
            width: 80%;
        }

        h1 {
            color: #333;
        }

        .controls {
            margin-top: 20px;
        }

        .controls h2 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Partida</h1>
        <div id="game-board">
            <!-- Aquí incluye la lógica de juego PHP -->
            <?php include 'game.php'; ?>
        </div>
        <div class="controls">
            <h2>Opciones</h2>
            <!-- Select para elegir armas según el nivel -->
            <label for="weapons">Arma:</label>
            <select name="weapons" id="weapons">
    <?php
    // Lógica para determinar las armas disponibles según el nivel del jugador
    $level = 1; // Nivel del jugador (este valor debe obtenerse dinámicamente)

    // Consulta SQL para obtener las armas disponibles según el nivel del jugador
    switch ($level) {
        case 1:
            $sql = "SELECT nombre FROM id_armas WHERE tipo IN ('cuerpo a cuerpo', 'revolver')";
            break;
        case 2:
            $sql = "SELECT * FROM id_armas WHERE tipo IN ('subfusil', 'escopeta', 'basuca', 'franco tirador')";
            break;
        // Agrega más casos según los niveles y armas disponibles
    }

    // Ejecutar la consulta
    $result = $conn->query($sql);

    // Verificar si se encontraron resultados
    if ($result->rowCount() > 0) {
        // Mostrar las armas disponibles en un select
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $weapon_name = $row["nombre"];
            echo "<option value='$weapon_name'>$weapon_name</option>";
        }
    }
    ?>
</select>


            <!-- Select para elegir el lugar de disparo -->
            <select name="locations" id="locations">
    <?php
    // Consulta para obtener los lugares de disparo disponibles
    $sql = "SELECT nombre FROM lug_disparo";
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        // Mostrar los lugares de disparo en un select
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $location_name = $row["nombre"];
            echo "<option value='$location_name'>$location_name</option>";
        }
    }
    ?>
</select>


            <!-- Select para elegir a quién disparar -->
            <label for="targets">Elegir Objetivo:</label>
            <select name="targets" id="targets">
    <?php
    // Consulta para obtener los nombres de los jugadores en la partida
    $sql = "SELECT nombre FROM usuarios WHERE id_estado = 1"; // Suponiendo que id_estado 1 representa que el jugador está en la sala
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        // Mostrar los nombres de los jugadores en un select
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $player_name = $row["nombre"];
            echo "<option value='$player_name'>$player_name</option>";
        }
    } else {
        echo "<option value='' disabled>No hay jugadores en la partida</option>";
    }
    ?>
</select>


            <!-- Botón para disparar -->
            <button onclick="shoot()">Disparar</button>
        </div>

        <?php
        // Consulta para obtener los otros jugadores en la sala
        $sql = "SELECT nombre FROM usuarios WHERE id_estado = 1"; // Suponiendo que id_estado 1 representa que el jugador está en la sala
        $result = $conn->query($sql);

        if ($result->rowCount() > 0) {
            echo "<h2>Jugadores en la sala:</h2>";
            echo "<ul>";
            // Mostrar los nombres de los otros jugadores
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<li>" . $row["nombre"] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "No hay otros jugadores en la sala.";
        }

        // Cerrar conexión
        $conn = null;
        ?>
    </div>
</body>
</html>