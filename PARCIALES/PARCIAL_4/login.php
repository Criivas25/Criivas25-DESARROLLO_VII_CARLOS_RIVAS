<?php
session_start();
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta a la base de datos
    $query = "SELECT * FROM usuarios WHERE nombre = :username AND contraseña = :password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() === 1) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Almacenar usuario_id y nombre en la sesión
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario'] = $usuario['nombre'];

        header('Location: http://localhost/TALLERES/Criivas25-DESARROLLO_VII_CARLOS_RIVAS/PARCIALES/prueba/search.php');
        exit;
    } else {
        echo "Credenciales incorrectas.";
    }
}

