<?php
// incluir archivo de conexión a la base de datos
include 'connection.php';

// obtener datos enviados desde el formulario
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];

// preparar consulta para insertar datos en la tabla usuarios
$sql = "INSERT INTO usuarios (usuario, correo) VALUES ('$usuario', '$correo')";

// ejecutar consulta y verificar si se insertaron los datos correctamente
if (mysqli_query($con, $sql)) {
    // redireccionar a la página de usuarios con mensaje de éxito
    header("Location: admin.php?mensaje=Usuario agregado correctamente");
} else {
    // redireccionar a la página de usuarios con mensaje de error
    header("Location: admin.php?mensaje=Error al agregar usuario");
}

// cerrar conexión a la base de datos
mysqli_close($con);
?>
