<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Sistema de Autenticación</h1>
        <nav>
            <a href="logout.php">Cerrar Sesión</a>
        </nav>
    </header>
    <main>
    <div class="welcome-section2">
        <h2>¡Hola, <?= $user['nombre'] ?>!</h2>
        <p>Has iniciado sesión correctamente. Tu correo es: <?= $user['correo'] ?></p>
    </div>
    </main>
</body>
</html>

