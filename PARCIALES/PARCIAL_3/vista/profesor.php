<?php
require_once '../sesion/ini_session.php';
require_once '../logic/users.php';

if ($_SESSION['role'] !== 'profesor') {
    header('Location: logout.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Profesor</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
<h1>Bienvenido Profesor , <?php echo htmlspecialchars($_SESSION['user']); ?></h1>
    <table>
        <tr>
            <th>Nombre de Usuario</th>
            <th>Calificación</th>
        </tr>
        <?php
        foreach ($users as $user) {
            if ($user['role'] === 'estudiante') {
                echo "<tr><td>{$user['username']}</td><td>{$user['grade']}</td></tr>";
            }
        }
        ?>
    </table>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>
