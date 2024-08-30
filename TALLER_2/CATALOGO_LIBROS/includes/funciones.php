<?php

function obtenerLibros() {
    return [
        [
            'titulo' => 'El Quijote',
            'autor' => 'Miguel de Cervantes',
            'anio_publicacion' => 1605,
            'genero' => 'Novela',
            'descripcion' => 'La historia del ingenioso hidalgo Don Quijote de la Mancha.'
        ],
        [
            'titulo' => 'Cien años de soledad',
            'autor' => 'Gabriel García Márquez',
            'anio_publicacion' => 1967,
            'genero' => 'Realismo mágico',
            'descripcion' => 'Una obra maestra de la literatura, que narra la historia de la familia Buendía.'
        ],
        [
            'titulo' => '1984',
            'autor' => 'George Orwell',
            'anio_publicacion' => 1949,
            'genero' => 'Distopía',
            'descripcion' => 'Un retrato sombrío de una sociedad totalitaria bajo el dominio del Gran Hermano.'
        ],
        [
            'titulo' => 'El señor de los anillos',
            'autor' => 'J.R.R. Tolkien',
            'anio_publicacion' => 1954,
            'genero' => 'Fantasía épica',
            'descripcion' => 'La épica historia de la lucha por la Tierra Media y el Anillo Único.'
        ],
        [
            'titulo' => 'Orgullo y prejuicio',
            'autor' => 'Jane Austen',
            'anio_publicacion' => 1813,
            'genero' => 'Romance',
            'descripcion' => 'Una novela sobre los prejuicios sociales y las relaciones románticas en la Inglaterra del siglo XIX.'
        ]
    ];
}

function mostrarDetallesLibro($libro) {
    $html = "<div class='libro'>";
    $html .= "<h3>" . htmlspecialchars($libro['titulo']) . "</h3>";
    $html .= "<p><strong>Autor:</strong> " . htmlspecialchars($libro['autor']) . "</p>";
    $html .= "<p><strong>Año de Publicación:</strong> " . htmlspecialchars($libro['anio_publicacion']) . "</p>";
    $html .= "<p><strong>Género:</strong> " . htmlspecialchars($libro['genero']) . "</p>";
    $html .= "<p><strong>Descripción:</strong> " . htmlspecialchars($libro['descripcion']) . "</p>";
    $html .= "</div>";
    return $html;
}

?>
