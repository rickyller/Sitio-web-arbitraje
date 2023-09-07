<?php
// incluir archivo de conexión a la base de datos
include 'connection.php';

// comprobar si se ha especificado el ID del usuario
if (!isset($_POST['id'])) {
    echo "Debe especificar un ID de producto para eliminar.";
} else {
    // obtener ID del usuario
    $id = $_POST['id'];
    
    // eliminar usuario de la base de datos
    $sql = "DELETE FROM productos WHERE id = $id";
    if (mysqli_query($con, $sql)) {
        header("Location: productos-admin.php?mensaje=Usuario agregado correctamente");
    } else {
        header("Location: productos-admin.php?mensaje=Error al eliminar producto");
    }
}

// cerrar conexión a la base de datos
mysqli_close($con);
?>