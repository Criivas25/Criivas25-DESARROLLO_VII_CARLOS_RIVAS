<?php
//$texto="carlos Rivas"; pueba de la funcion 
function contar_palabras($texto) {
    // Divide el texto en un array de palabras y cuenta los elementos
    return str_word_count($texto);
}
//echo str_word_count($texto); el resuldado due 2

function contar_vocales($texto) {
    // Convierte el texto a minúsculas y cuenta las vocales dentro de un ciclo para contar las vocales.
    $vocales = ['a', 'e', 'i', 'o', 'u'];
    $contador = 0;
    $texto = strtolower($texto);
    for ($i = 0; $i < strlen($texto); $i++) {
        if (in_array($texto[$i], $vocales)) {
            $contador++;
        }
    }
    return $contador;
}

function invertir_palabras($texto) {
    // Divide el texto en palabras, las invierte y las vuelve a unir
    $palabras = explode(" ", $texto);
    $palabras_invertidas = array_reverse($palabras); //se utliza esta funcion para invertir el orden agregado de la cadena 
    return implode(" ", $palabras_invertidas);
}



?>