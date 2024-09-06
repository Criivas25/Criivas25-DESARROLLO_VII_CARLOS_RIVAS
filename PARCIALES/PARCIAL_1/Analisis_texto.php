<?php

// Incluir el archivo de utilidades
include 'utilidades_texto.php';

// Definir un array con 3 frases diferentes
$frases = [
    "todas las mañanas son hermosas",
    "todos los dias llego tarde al trabajo",
    "cansado de hacer tantas tareas"
];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Cuadro de Texto</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Análisis de Frases</h2>

<table>
    <tr>
        <th>Frase</th>
        <th>Número de Palabras</th>
        <th>Número de Vocales</th>
        <th>Frase Invertida</th>
    </tr>

    <?php
    // se utiliza el metodo para hacer un ciclo por cada uno de los elementos
    foreach ($frases as $frase) {
        echo "<td>" . $frase . "</td>";
        echo "<td>" . contar_palabras($frase) . "</td>";
        echo "<td>" . contar_vocales($frase) . "</td>";
        echo "<td>" . invertir_palabras($frase) . "</td>";
        echo "</tr>";
    }
    ?>

</table>

</body>
</html>

