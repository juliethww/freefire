<?php
// game.php

// Posición inicial del jugador
$playerX = 100;
$playerY = 100;

// Posición del enemigo
$enemyX = 300;
$enemyY = 300;

// Puntaje inicial del jugador
$score = 0;

// Verificar si se ha enviado una acción de movimiento
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    // Actualizar la posición del jugador según la acción
    switch ($action) {
        case 'up':
            $playerY -= 10;
            break;
        case 'down':
            $playerY += 10;
            break;
        case 'left':
            $playerX -= 10;
            break;
        case 'right':
            $playerX += 10;
            break;
    }

    // Verificar si el jugador ha colisionado con el enemigo
    if ($playerX === $enemyX && $playerY === $enemyY) {
        $score -= 10; // Penalizar al jugador por colisión
    } else {
        $score += 5; // Otorgar puntos por moverse
    }
}

// Mostrar jugador y enemigo en el tablero de juego
echo "<div class='player' style='left:{$playerX}px;top:{$playerY}px;'></div>";
echo "<div class='enemy' style='left:{$enemyX}px;top:{$enemyY}px;'></div>";

// Mostrar el puntaje del jugador
echo "<p>Puntaje: $score</p>";
?>
