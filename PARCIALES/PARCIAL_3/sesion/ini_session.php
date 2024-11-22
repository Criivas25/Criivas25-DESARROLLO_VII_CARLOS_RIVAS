<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../vista/login.php');
    exit;
}
?>
