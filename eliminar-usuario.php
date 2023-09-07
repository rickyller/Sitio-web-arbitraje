<?php
// incluir archivo de conexión a la base de datos
include 'connection.php';

// comprobar si se ha especificado el ID del usuario
if (!isset($_POST['id'])) {
    echo "Debe especificar un ID de usuario para eliminar.";
} else {
    // obtener ID del usuario
    $id = $_POST['id'];
    
    // eliminar usuario de la base de datos
    $sql = "DELETE FROM usuarios WHERE id = $id";
    if (mysqli_query($con, $sql)) {
        echo "Usuario eliminado correctamente.";
    } else {
        echo "Error al eliminar usuario: " . mysqli_error($con);
    }
}

// cerrar conexión a la base de datos
mysqli_close($con);
?>


