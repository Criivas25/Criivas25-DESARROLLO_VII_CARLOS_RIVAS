<?php
session_start();
require_once 'google_books.php';

require_once 'conexion.php'; // Archivo de conexión a la base de datos


// Obtener el ID del usuario autenticado
$usuario_id = $_SESSION['usuario_id'];

// Verificar si se ha enviado un libro para agregar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['google_books_id'])) {
    $google_books_id = $_POST['google_books_id'];

    // Recuperar los datos del libro desde la API de Google Books
    require_once 'google_books.php';
    $libro = obtenerLibroPorID($google_books_id); // Función para obtener el libro de la API

    if ($libro) {
        // Validación de datos para evitar errores si alguna clave no existe
        $titulo = $libro['volumeInfo']['title'] ?? 'Título desconocido';
        $autor = isset($libro['volumeInfo']['authors']) ? implode(', ', $libro['volumeInfo']['authors']) : 'Autor desconocido';
        $fecha_registro = date('Y-m-d H:i:s'); // Fecha actual

        // Insertar el libro en la base de datos
        try {
            $query = "INSERT INTO biblioteca_usuario (usuario_id, titulo, autor, fecha_registro, google_books_id)
                    VALUES (:usuario_id, :titulo, :autor, :fecha_registro, :google_books_id)";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':usuario_id', $usuario_id);
            $stmt->bindValue(':titulo', $titulo);
            $stmt->bindValue(':autor', $autor);
            $stmt->bindValue(':fecha_registro', $fecha_registro);
            $stmt->bindValue(':google_books_id', $google_books_id);

            if ($stmt->execute()) {
                echo "Libro agregado a tu biblioteca con éxito.";
            } else {
                echo "Error al agregar el libro a tu biblioteca.";
            }
        } catch (PDOException $e) {
            echo "Error en la base de datos: " . $e->getMessage();
        }
    } else {
        echo "No se encontró el libro en la API de Google Books.";
    }
} else {
    echo "Solicitud inválida.";
}

