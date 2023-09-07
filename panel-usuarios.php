<?php
// incluir archivo de conexión a la base de datos
include 'connection.php';

// realizar consulta a la base de datos
$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($con, $sql);

// mostrar resultados en una tabla HTML
echo "<table>";
echo "<thead>";
echo "<tr><th>ID</th><th>Nombre</th><th>Email</th></tr>";
echo "</thead>";
echo "<tbody>";
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>".$fila['id']."</td>";
    echo "<td>".$fila['nombre']."</td>";
    echo "<td>".$fila['correo']."</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";

// cerrar conexión a la base de datos
mysqli_close($con);
?>

