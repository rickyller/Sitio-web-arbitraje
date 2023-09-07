<?php
// incluir archivo de conexión a la base de datos
include 'connection.php';

// obtener término de búsqueda del formulario
$termino = $_GET['search'];

// realizar consulta a la base de datos
$sql = "SELECT * FROM productos WHERE nombre LIKE '%$termino%'";
$resultado = mysqli_query($con, $sql);
?>