<?php
include 'db.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (nombre, correo, contraseña) VALUES ('$nombre', '$correo', '$contrasena')";

    if ($conn->query($sql) === TRUE) {
        $message = "¡Registro exitoso! Ahora puedes iniciar sesión.";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Sistema de Autenticación</h1>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="login.php">Iniciar Sesión</a>
        </nav>
    </header>
    <main>
        <form method="POST">
            <h2>Registrarse</h2>
            <!-- Mostrar mensaje de éxito o error -->
            <?php if (!empty($message)): ?>
                <div class="form-message"><?= $message ?></div>
            <?php endif; ?>
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="email" name="correo" placeholder="Correo" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>
            <button type="submit">Registrar</button>
        </form>
    </main>
</body>
</html>
