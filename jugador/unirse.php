<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Unirse a la Partida</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            padding: 20px 0;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        a.button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        a.button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 600px) {
            .container {
                margin: 20px auto;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Unirse a la Partida</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="tipo_partida">Tipo de Partida:</label>
            <select name="tipo_partida" id="tipo_partida">
                <option value="BR-Clasificatoria">BR-Clasificatoria</option>
                <option value="DE-Clasificatoria">DE-Clasificatoria</option>
            </select><br>
            <a href="partida.php" class="button">Unirse a la partida</a>
        </form>
    </div>
</body>
</html>
