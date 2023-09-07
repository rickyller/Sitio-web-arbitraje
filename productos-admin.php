<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="Estilos.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-HKdIa1VPX9JbAl5D5o5yIjKf5HY+1nGJ/jpNz+f6UZb6U9z6KjEB6UtpwJ/lwJVfLlVqxQ2TN6xWVcQatYHSSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<header class="admin-header">
    <h1>Panel de Administración de productos</h1>
    <ul>
        <li><a href="Inicio-admin.html">Inicio</a></li>
        <li><a href="Productos-admin.html">Productos</a></li>
        <li><a href="Descripcion-admin.html">Descripción</a></li>
        <li><a href="Ubicacion-admin.html">Ubicación</a></li>
        <li><a href="Pagina%20arbitro%201.html">Salir</a></li>
    </ul>

</header>
<main class="admin-main">
    <section class="admin-section">
        <div class="admin-table">
            <?php
            // incluir archivo de conexión a la base de datos
            include 'connection.php';

            // realizar consulta a la base de datos
            $sql = "SELECT * FROM productos";
            $resultado = mysqli_query($con, $sql);
            ?>

            <form method="post" action="agregar-producto.php" class="admin-form">
                <input type="text" name="nombre" placeholder="Nombre">
                <input type="text" name="precio" placeholder="Precio">
                <input type="text" name="color" placeholder="Color">
                <input type="text" name="stock" placeholder="Stock">
                <button type="submit">Agregar</button> <br> <br>
            </form>

            <!-- tabla HTML -->
            <table id="productos">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Color</th>
                        <th>Stock</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $fila['id']; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['precio']; ?></td>
                        <td><?php echo $fila['color']; ?></td>
                        <td><?php echo $fila['stock']; ?></td>
                        <td>
                            <form method="post" action="editar-producto.php">
<input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
<input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>">
<input type="text" name="precio" value="<?php echo $fila['precio']; ?>">
<input type="text" name="color" value="<?php echo $fila['color']; ?>">
<input type="text" name="stock" value="<?php echo $fila['stock']; ?>">
<button type="submit" class="admin-btn-edit"><i class="fas fa-edit">Editar</i></button>
</form>
<form method="post" action="eliminar-producto.php">
<input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
<button type="submit" class="admin-btn-delete"><i class="fas fa-trash">Eliminar</i></button>
</form>
</td>
</tr>
<?php } ?>
</tbody>
</table>
<?php
        // cerrar conexión a la base de datos
        mysqli_close($con);
        ?>

    </div>
</section>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="main.js"></script>
<script>
// Initialize DataTables
$(document).ready(function() {
    $('#productos').DataTable();
});
// Add dynamic search input
$(document).ready(function(){

$("#search").on("keyup", function() {
var value = $(this).val().toLowerCase();
$("#productos tbody tr").filter(function() {
$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});
});
});
</script>

</html> 

