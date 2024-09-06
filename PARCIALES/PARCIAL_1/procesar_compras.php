<?php


include 'funciones_tienda.php';

// productos con sus precios
$productos = [
    'camisa' => 50,
    'pantalon' => 70,
    'zapatos' => 80,
    'calcetines' => 10,
    'gorra' => 25
];

//  carrito de compras
$carrito = [
    'camisa' => 2,
    'pantalon' => 1,
    'zapatos' => 1,
    'calcetines' => 3,
    'gorra' => 0
];

// Calcular el subtotal
$subtotal = 0;
foreach ($carrito as $producto => $cantidad) {
    if ($cantidad > 0) {
        $subtotal += $productos[$producto] * $cantidad;
    }
}

// Calcular el descuento, el impuesto y el total
$descuento = calcular_descuento($subtotal);
$impuesto = aplicar_impuesto($subtotal);
$total = calcular_total($subtotal, $descuento, $impuesto);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Resumen de Compra</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
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

<h3>Factura de compras</h3>

<table>
    <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio Unitario</th>
        <th>Total</th>
    </tr>

    <?php
    // Mostrar los productos comprados
    foreach ($carrito as $producto => $cantidad) {
        if ($cantidad > 0) {
            $precio_unitario = $productos[$producto];
            $total_producto = $precio_unitario * $cantidad;
            echo "<tr>";
            echo "<td>$producto</td>";
            echo "<td>$cantidad</td>";
            echo "<td>$$precio_unitario</td>";
            echo "<td>$$total_producto</td>";
            echo "</tr>";
        }
    }
    ?>

    <tr>
        <td colspan="3"><strong>Subtotal</strong></td>
        <td><strong>$<?php echo number_format($subtotal, 2); ?></strong></td>
    </tr>
    <tr>
        <td colspan="3"><strong>Descuento</strong></td>
        <td><strong>$<?php echo number_format($descuento, 2); ?></strong></td>
    </tr>
    <tr>
        <td colspan="3"><strong>Impuesto (7%)</strong></td>
        <td><strong>$<?php echo number_format($impuesto, 2); ?></strong></td>
    </tr>
    <tr>
        <td colspan="3"><strong>Total a Pagar</strong></td>
        <td><strong>$<?php echo number_format($total, 2); ?></strong></td>
    </tr>
</table>

</body>
</html>
