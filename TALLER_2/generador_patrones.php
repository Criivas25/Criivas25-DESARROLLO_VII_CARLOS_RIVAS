<?php

// Crear un patrón de triángulo rectángulo con asteriscos usando un bucle for
echo "Patrón de triángulo rectángulo con asteriscos:<br>";
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>"; // Salto de línea en HTML
}

echo "<br>";

// Utilizando un bucle while para mostrar los números impares del 1 al 20
echo "Números impares del 1 al 20:<br>";
$num = 1;
while ($num <= 20) {
    if ($num % 2 != 0) {
        echo $num . "<br>"; // Salto de línea en HTML
    }
    $num++;
}

echo "<br>";

// Bucle do-while para un contador regresivo desde 10 hasta 1, saltando el número 5
echo "Contador regresivo desde 10 hasta 1, saltando el número 5:<br>";
$contador = 10;
do {
    if ($contador != 5) {
        echo $contador . "<br>"; // Salto de línea en HTML
    }
    $contador--;
} while ($contador >= 1);

?>

