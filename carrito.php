<link rel="stylesheet" href="./carrito.css">
<?php
session_start();

if (isset($_POST['comprar'])) {
    // Redirigir a la página de generación de pedido
    header("Location: generar_pdf_pedido.php");
    exit();
}

if (isset($_SESSION['usuario'])) {
    $identificadorUsuario = $_SESSION['usuario'];

    if (isset($_SESSION[$identificadorUsuario]) && !empty($_SESSION[$identificadorUsuario])) {
        $total = 0;

        // Puedes usar una tabla para mostrar los productos en el carrito
        echo '<div class="container">';
        echo '<h1>Carrito de compras</h1>';
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Producto</th>';
        echo '<th>Precio</th>';
        echo '<th>Cantidad</th>';
        echo '<th>Subtotal</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($_SESSION[$identificadorUsuario] as $producto) {
            $nombre = $producto['nombre'];
            $precio = $producto['precio'];
            $cantidad = $producto['cantidad'];
            $subtotal = $precio * $cantidad;

            echo '<tr>';
            echo '<td>' . $nombre . '</td>';
            echo '<td>$' . $precio . '</td>';
            echo '<td>' . $cantidad . '</td>';
            echo '<td>$' . $subtotal . '</td>';
            echo '</tr>';

            $total += $subtotal;
        }

        echo '<tr class="total">';
        echo '<td>Total</td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td>$' . $total . '</td>';
        echo '</tr>';

        echo '</tbody>';
        echo '</table>';
        echo '<div class="acciones">';
        echo '<form method="post" action="vaciar-carrito.php">';
        echo '<button type="submit">Vaciar carrito</button>';
        echo '</form>';
        echo '<form method="post" action="generar_pdf_pedido.php">';
        echo '<button type="submit" name="comprar">Comprar</button>';
        echo '</form>';
        echo '<a href="productos.php">Seguir comprando</a>';
        echo '</div>';
        echo '</div>';
    } else {
        header('Location:carrito-vacio.php');
    }
} else {
    header('Location: login.php'); // Redirigir a la página de inicio de sesión si el usuario no está autenticado
    exit();
}
?>
