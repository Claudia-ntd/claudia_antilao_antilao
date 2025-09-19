<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Donaciones</title>
</head>
<body>
    <h1>Tu Carrito de Donaciones</h1>

    <?php
    // Simulamos la lista de campañas (igual que en donaciones.php)
    $campañas = [
        1 => ['nombre' => 'Reforestación en la Amazonía', 'monto' => 50],
        2 => ['nombre' => 'Educación Ambiental Infantil', 'monto' => 30],
        3 => ['nombre' => 'Protección de Fauna Marina', 'monto' => 40],
    ];

    if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
        echo "<p>Tu carrito está vacío.</p>";
    } else {
        $total = 0;
        echo "<ul>";
        foreach ($_SESSION['carrito'] as $id => $cantidad) {
            if (isset($campañas[$id])) {
                $nombre = $campañas[$id]['nombre'];
                $monto = $campañas[$id]['monto'];
                $subtotal = $monto * $cantidad;
                $total += $subtotal;

                echo "<li>
                        <strong>$nombre</strong> - Cantidad: $cantidad - Subtotal: \$$subtotal USD 
                        <a href='eliminar.php?id=$id'>Eliminar</a>
                      </li>";
            }
        }
        echo "</ul>";
        echo "<p><strong>Total: \$$total USD</strong></p>";
    }
    ?>

    <p><a href="donaciones.php">Volver a Campañas</a></p>
</body>
</html>
