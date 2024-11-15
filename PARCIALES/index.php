<?php
// Incluir el archivo de Google OAuth
require_once 'config/google-oauth.php';

// Verificar si el usuario está autenticado
if (!isset($user_info)) {
    header('Location: login.html');
    exit();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Biblioteca</title>
</head>
<body>
    <h1>Bienvenido, 
        <?php echo $user_info['name']; ?>!</h1>
    <a href="search.php">Buscar libros</a><br>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>