<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compras</title>
    <link rel="stylesheet" href="./carrito.css">
</head>
<body>
    <?php
        session_start();
        
        if (isset($_POST['comprar'])) {
            header("Location: generar_pdf_pedido.php");
            exit();
        }
        
        
        if(isset($_SESSION['carrito'])){
            $total = 0;
            $cantidad = 0;
    ?>
    <div class="container">
        <h1>Carrito de compras</h1>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($_SESSION['carrito'] as $producto){
                    if(isset($producto['nombre']) && isset($producto['precio']) && isset($producto['cantidad'])){ ?>
                        <tr>
                            <td><?php echo $producto['nombre']; ?></td>
                            <td>$<?php echo $producto['precio']; ?></td>
                            <td><?php echo $producto['cantidad']; ?></td>
                            <td>$<?php echo $producto['precio'] * $producto['cantidad']; ?></td>
                        </tr>
                        <?php
                            $total += $producto['precio'] * $producto['cantidad'];
                            $cantidad += $producto['cantidad'];
                    }
                } ?>
                <tr class="total">
                    <td>Total</td>
                    <td></td>
                    <td><?php echo $cantidad; ?></td>
                    <td>$<?php echo $total; ?></td>
                </tr>
            </tbody>
        </table>
        <div class="acciones">
            <form method="post" action="vaciar-carrito.php">
                <button type="submit">Vaciar carrito</button>
            </form>
            <form method="post" action="generar_pdf_pedido.php">
                <button type="submit">Comprar</button>
            </form>
            <a href="Productos.html">Seguir comprando</a>
        </div>
    </div>
    <?php
        } else {
            header("Location: carrito-vacio.php");
            exit;
        }
    ?>
        <div class="monkey-image">
        <img src="Images\perrito-bonito.png" alt="" style="
    width: 15em;
    margin-left: 20em;
">
        </div>
        
</body>
</html>


