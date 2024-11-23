<?php
include 'db.php';
session_start();

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $sql = "SELECT * FROM usuarios WHERE correo='$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($contraseña, $user['contraseña'])) {
            $_SESSION['user'] = $user;
            header("Location: home.php");
        } else {
            $message = "Contraseña incorrecta.";
        }
    } else {
        $message = "Usuario no encontrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Sistema de Autenticación</h1>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="register.php">Registrarse</a>
        </nav>
    </header>
    <main>
        <form method="POST">
            <h2>Iniciar Sesión</h2>
            <!-- Mostrar mensaje de error dentro del cuadro blanco -->
            <?php if (!empty($message)): ?>
                <div class="form-message error"><?= $message ?></div>
            <?php endif; ?>
            <input type="email" name="correo" placeholder="Correo" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>
    </main>
</body>
</html>
