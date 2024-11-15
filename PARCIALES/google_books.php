<?php
// Función para buscar libros usando la API de Google Books
function buscarLibros($query) {
    $url = 'https://www.googleapis.com/books/v1/volumes?q=' . urlencode($query); // URL de la API de Google Books
    $response = file_get_contents($url);  // Hacer la solicitud HTTP
    $data = json_decode($response, true); // Decodificar el JSON recibido

    // Retornar la lista de libros encontrados
    return $data['items'] ?? [];
}


function obtenerLibroPorID($google_books_id) {
    $url = "https://www.googleapis.com/books/v1/volumes/" . $google_books_id;
    $json = file_get_contents($url);
    return json_decode($json, true);
}

?>