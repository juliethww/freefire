<?php
require_once("../conexion/conexion.php");
$db = new Database();
$conn = $db->conectar(); // Obtener la conexión a la base de datos

// Consulta para obtener la información del jugador
$sql = "SELECT * FROM usuarios WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id_jugador);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    // Mostrar la información del jugador
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $nombre_usuario = $row["username"];
    $nivel = $row["nivel"];
    $puntos = $row["puntos"];
} else {
    $nombre_usuario = "";
    $nivel = "1";
    $puntos = "0";
}

$conn = null; // Cerrar la conexión
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Página Principal del Jugador</title>
    <link rel="stylesheet" href="../css/css.css">
</head>
<body>
    <header>
        <h1>Bienvenido, Jugador</h1>
        <div id="info-jugador">
            <p>Nombre de Usuario: <span id="username"><?php echo $nombre_usuario; ?></span></p>
            <p>Nivel: <span id="nivel"><?php echo $nivel; ?></span></p>
            <p>Puntos: <span id="puntos"><?php echo $puntos; ?></span></p>
        </div>
    </header>
    <main>
        <!-- Aquí puedes agregar enlaces o botones para acceder a otras secciones del juego -->
        <a href="armas.php">Seleccionar Armas</a>
        <a href="unirse.php">Unirse a Partida</a>
        <a href="mapas.php">Mapas</a>
        <!-- Puedes agregar más enlaces según sea necesario -->
    </main>
    <footer>
        <p>© 2024 Proyecto Free Fire. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
