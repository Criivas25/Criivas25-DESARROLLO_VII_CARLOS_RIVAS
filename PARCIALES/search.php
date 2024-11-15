<?php
session_start(); // Inicia la sesión para acceder a las credenciales del usuario

require_once 'google_books.php'; // Incluir el archivo con las funciones de Google Books

// Verificar si el usuario está autenticado
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario']; // Usuario autenticado desde la base de datos
} elseif (isset($_SESSION['google_usuario'])) {
    $usuario = $_SESSION['google_usuario']; // Usuario autenticado con Google OAuth
} else {
    // Redirige al login si no hay sesión de usuario
    header("Location: login.html");
    exit();
}

// Verificar si se ha enviado una búsqueda
if (isset($_GET['q'])) {
    $query = $_GET['q'];
    $libros = buscarLibros($query);  // Buscar libros usando la API
} else {
    $libros = [];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Libros</title>
    <link rel="stylesheet" href="style.css"> <!-- Enlace al archivo CSS -->
    <style>
        /* Estilo para la barra superior */
        .barra-superior {
            background-color: #007bff; /* Azul */
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
        }
        .barra-superior .boton-mis-libros {
            background-color: #0056b3;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <!-- Barra superior con las credenciales del usuario y botón para ver libros guardados -->
    <div class="barra-superior">
    Bienvenido, <?php echo htmlspecialchars($usuario); ?>!
        <a href="mis_libros.php" class="boton-mis-libros">Mis Libros</a>
    </div>

    <h1>Buscar libros</h1>
    <form method="GET" action="search.php">
        <input type="text" name="q" placeholder="Introduce el título del libro" required>
        <button type="submit">Buscar</button>
    </form>

    <?php if (!empty($libros)): ?>
        <h2>Resultados de la búsqueda</h2>
        <ul>
            <?php foreach ($libros as $libro): ?>
                <li>
                    <strong><?php echo $libro['volumeInfo']['title']; ?></strong><br>
                    Autor: <?php echo implode(', ', $libro['volumeInfo']['authors']); ?><br>
                    <img src="<?php echo $libro['volumeInfo']['imageLinks']['thumbnail']; ?>" alt="Portada"><br>
                    <!-- Formulario para agregar el libro a la base de datos -->
                    <form action="libreria.php" method="POST">
                        <input type="hidden" name="google_books_id" value="<?php echo $libro['id']; ?>">
                        <button type="submit">Agregar a mi biblioteca</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>

