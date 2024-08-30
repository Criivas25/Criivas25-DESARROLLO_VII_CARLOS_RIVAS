<?php
// Definir las variables
$nombre_completo = "Carlos Rivas";
$edad = 22;
$correo = "carlosriivas25@gmail.com";
$telefono = "6627-3905";

// Definir la constante
define("OCUPACION", "Desarrollador");

// Imprimir la información usando diferentes métodos

// Usando echo
echo "<h2>Información del Usuario:</h2>";
echo "<p><strong>Nombre Completo:</strong> " . $nombre_completo . "</p>";
echo "<p><strong>Edad:</strong> " . $edad . "</p>";
echo "<p><strong>Correo Electrónico:</strong> " . $correo . "</p>";
echo "<p><strong>Teléfono:</strong> " . $telefono . "</p>";
echo "<p><strong>Ocupación:</strong> " . OCUPACION . "</p>";

// Usando print
print "<p><strong>Nombre Completo:</strong> " . $nombre_completo . "</p>";
print "<p><strong>Edad:</strong> " . $edad . "</p>";
print "<p><strong>Correo Electrónico:</strong> " . $correo . "</p>";
print "<p><strong>Teléfono:</strong> " . $telefono . "</p>";
print "<p><strong>Ocupación:</strong> " . OCUPACION . "</p>";

// Usando printf
printf("<p><strong>Nombre Completo:</strong> %s</p>", $nombre_completo);
printf("<p><strong>Edad:</strong> %d</p>", $edad);
printf("<p><strong>Correo Electrónico:</strong> %s</p>", $correo);
printf("<p><strong>Teléfono:</strong> %s</p>", $telefono);
printf("<p><strong>Ocupación:</strong> %s</p>", OCUPACION);

// Mostrar el tipo y valor de cada variable y constante usando var_dump
echo "<h3>Detalles de las Variables y la Constante:</h3>";
echo "<pre>";
var_dump($nombre_completo);
var_dump($edad);
var_dump($correo);
var_dump($telefono);
var_dump(OCUPACION);
echo "</pre>";
?>
