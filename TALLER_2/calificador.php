<?php

$calificacion = 85; // calificacion por defecto 

// Determina la letra segun la calificacion
if ($calificacion >= 90) {
    $letra = 'A';
} elseif ($calificacion >= 80) {
    $letra = 'B';
} elseif ($calificacion >= 70) {
    $letra = 'C';
} elseif ($calificacion >= 60) {
    $letra = 'D';
} else {
    $letra = 'F';
}

// Imprimir el resultado con mensaje de aprobación o reprobación
$estado = ($calificacion >= 60) ? "Aprobado," : "Reprobado,";
echo "Tu calificación es $letra. $estado\n";

// Mensaje adicional basado en la calificación con switch
switch ($letra) {
    case 'A':
        echo "Excelente trabajo\n";
        break;
    case 'B':
        echo "Buen trabajo\n";
        break;
    case 'C':
        echo "Trabajo aceptable\n";
        break;
    case 'D':
        echo "Necesitas mejorar\n";
        break;
    case 'F':
        echo "Debes esforzarte más\n";
        break;
}

?>
