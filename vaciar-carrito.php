<?php
session_start();

if (isset($_SESSION['usuario'])) {
    // Obten el identificador único del usuario (por ejemplo, el nombre de usuario o el ID de usuario)
    $identificadorUsuario = $_SESSION['usuario'];

    // Verifica si el usuario tiene un carrito en la sesión
    if (isset($_SESSION[$identificadorUsuario])) {
        // Elimina el carrito del usuario
        unset($_SESSION[$identificadorUsuario]);
    }

    // Redirigir a la página de carrito
    header('Location: carrito.php');
    exit();
} else {
    // Redirigir a la página de inicio de sesión si el usuario no está autenticado
    header('Location: login.php');
    exit();
}
?>
