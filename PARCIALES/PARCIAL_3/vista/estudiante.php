<?php
require_once '../sesion/ini_session.php';

if ($_SESSION['role'] !== 'estudiante') {
    header('Location: logout.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas Estudiante</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <h1>Bienvenido Estidiante, <?php echo htmlspecialchars($_SESSION['user']); ?></h1>
    <p>Tu calificación es: <?php echo $_SESSION['grade']; ?></p>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>
