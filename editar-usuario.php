<?php
// incluir archivo de conexión a la base de datos
include 'connection.php';

// obtener datos enviados desde el formulario
$id = $_POST['id'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];

// preparar consulta para actualizar datos en la tabla usuarios
$sql = "UPDATE usuarios SET usuario='$usuario', correo='$correo' WHERE id=$id";

// ejecutar consulta y verificar si se actualizaron los datos correctamente
if (mysqli_query($con, $sql)) {
    // redireccionar a la página de usuarios con mensaje de éxito
    header("Location: admin.php?mensaje=Usuario actualizado correctamente");
} else {
    // redireccionar a la página de usuarios con mensaje de error
    header("Location: admin.php?mensaje=Error al actualizar usuario");
}

// cerrar conexión a la base de datos
mysqli_close($con);
?>
