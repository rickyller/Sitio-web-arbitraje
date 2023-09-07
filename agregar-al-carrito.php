<?php
session_start();

if(isset($_POST['agregar-al-carrito'])){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    $producto = array(
        'id' => $id, 
        'nombre' => $nombre, 
        'precio' => $precio,
        'cantidad' => 1
    );

    if(isset($_SESSION['carrito'])){
        $en_carrito = false;
        foreach($_SESSION['carrito'] as $indice=>$producto_actual){
            if($producto_actual['id'] == $id){
                $_SESSION['carrito'][$indice]['cantidad']++;
                $en_carrito = true;
            }
        }

        if(!$en_carrito){
            array_push($_SESSION['carrito'], $producto);
        }

    }else{
        $_SESSION['carrito'] = array();
        array_push($_SESSION['carrito'], $producto);
    }
    echo '<p>El producto ' . $nombre . ' ha sido agregado al carrito</p>';
    header('location: carrito.php');
}
?>


