<?php
include 'connection.php';

// Obtener el término de búsqueda desde el formulario
$termino = $_POST['busqueda'];

// Realizar la búsqueda en la base de datos
$query = "SELECT * FROM productos WHERE nombre LIKE '%$termino%'";
$resultado = mysqli_query($con, $query);

// Mostrar los resultados
while ($fila = mysqli_fetch_assoc($resultado)) {
  echo $fila['nombre'] . "<br>";
}

// Cerrar la conexión
mysqli_close($con);
?>
