<?php
// incluir archivo de conexión a la base de datos
include 'connection.php';

// obtener datos enviados desde el formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$color = $_POST['color'];
$stock = $_POST['stock'];

// preparar consulta para insertar datos en la tabla usuarios
$sql = "INSERT INTO productos (nombre, precio, color, stock) VALUES ('$nombre', '$precio','$color','$stock')";

// ejecutar consulta y verificar si se insertaron los datos correctamente
if (mysqli_query($con, $sql)) {
    // redireccionar a la página de usuarios con mensaje de éxito
    header("Location: productos-admin.php?mensaje=Producto agregado correctamente");
} else {
    // redireccionar a la página de usuarios con mensaje de error
    header("Location: productos-admin.php?mensaje=Error al agregar producto");
}

// cerrar conexión a la base de datos
mysqli_close($con);
?>