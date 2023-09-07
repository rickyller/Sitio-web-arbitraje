<?php
// incluir archivo de conexión a la base de datos
include 'connection.php';

// obtener datos enviados desde el formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$color = $_POST['color'];
$stock = $_POST['stock'];

// preparar consulta para actualizar datos en la tabla usuarios
$sql = "UPDATE productos SET nombre='$nombre', precio='$precio',color='$color', stock='$stock' WHERE id=$id";

// ejecutar consulta y verificar si se actualizaron los datos correctamente
if (mysqli_query($con, $sql)) {
    // redireccionar a la página de usuarios con mensaje de éxito
    header("Location: productos-admin.php?mensaje=Usuario actualizado correctamente");
} else {
    // redireccionar a la página de usuarios con mensaje de error
    header("Location: productos-admin.php?mensaje=Error al actualizar usuario");
}

// cerrar conexión a la base de datos
mysqli_close($con);
?>

