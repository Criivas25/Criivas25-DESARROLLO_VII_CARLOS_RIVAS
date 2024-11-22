<?php
session_start();
require_once 'users.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);


    if (strlen($username) < 3 || !ctype_alnum($username)) {
        die('El nombre de usuario debe tener al menos 3 caracteres');
    }
    if (strlen($password) < 5) {
        die('La contraseña debe tener al menos 5 caracteres.');
    }

    
    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $_SESSION['user'] = $username;
            $_SESSION['role'] = $user['role'];
            $_SESSION['grade'] = $user['role'] === 'estudiante' ? $user['grade'] : null;

            
            if ($user['role'] === 'profesor') {
                header('Location: ../vista/profesor.php');
            } else {
                header('Location: ../vista/estudiante.php');
            }
            exit;
        }
    }

    die('Usuario o contraseña incorrectos.');
}
?>
