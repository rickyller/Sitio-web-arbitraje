<?php
session_start();

if (isset($_POST['agregar-al-carrito'])) {
    // Asegúrate de que el usuario esté autenticado y tenga un identificador único, por ejemplo, $_SESSION['usuario']
    if (isset($_SESSION['usuario'])) {
        $identificadorUsuario = $_SESSION['usuario'];
        
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];

        // Define la estructura común
        $producto = array(
            'id' => $id,
            'nombre' => $nombre,
            'precio' => $precio,
            'cantidad' => 1 // Cantidad inicial es 1
        );

        if (isset($_SESSION[$identificadorUsuario])) {
            $enCarrito = false;
            foreach ($_SESSION[$identificadorUsuario] as $indice => $productoActual) {
                if ($productoActual['id'] == $id) {
                    $_SESSION[$identificadorUsuario][$indice]['cantidad']++;
                    $enCarrito = true;
                }
            }

            if (!$enCarrito) {
                array_push($_SESSION[$identificadorUsuario], $producto);
            }
        } else {
            $_SESSION[$identificadorUsuario] = array($producto);
        }

        // Redireccionar de nuevo a la página de productos
        header('location: productos.php');
        exit();
    } else {
        // Si el usuario no está autenticado, redirígelo a la página de inicio de sesión
        header('location: login.php');
        exit();
    }
}
