<?php
session_start();
require_once 'conexion.php'; // Conexión a la base de datos

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

// Consultar los libros guardados en la base de datos para el usuario actual
$query = "SELECT titulo, autor, fecha_registro FROM biblioteca_usuario WHERE usuario_id = :usuario_id";
$stmt = $conn->prepare($query);
$stmt->bindValue(':usuario_id', $usuario_id);
$stmt->execute();
$libros = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Libros</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        .libros-guardados {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Mis Libros Guardados</h1>
    <?php if (!empty($libros)): ?>
        <ul class="libros-guardados">
            <?php foreach ($libros as $libro): ?>
                <li>
                    <strong><?php echo htmlspecialchars($libro['titulo']); ?></strong><br>
                    Autor: <?php echo htmlspecialchars($libro['autor']); ?><br>
                    Fecha de registro: <?php echo htmlspecialchars($libro['fecha_registro']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No tienes libros guardados.</p>
    <?php endif; ?>
</body>
</html>
