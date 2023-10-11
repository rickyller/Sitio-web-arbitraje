<!DOCTYPE html>
<link rel="stylesheet" href="Estilos.css">
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-HKdIa1VPX9JbAl5D5o5yIjKf5HY+1nGJ/jpNz+f6UZb6U9z6KjEB6UtpwJ/lwJVfLlVqxQ2TN6xWVcQatYHSSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="admin-header">
        <h1>Panel de Administración</h1>

            <ul>
                <li><a href="Inicio-admin.html">Inicio</a></li>
                <li><a href="Productos-admin.html">Productos</a></li>
                <li><a href="Descripcion-admin.html">Descripción</a></li>
                <li><a href="Ubicacion-admin.html">Ubicación</a></li>
                <li><a href="Pagina%20arbitro%201.php">Salir</a></li>
            </ul>

    </header>
    <main class="admin-main">

        <section class="admin-section">
            <div class="admin-table">
                
                <?php
// incluir archivo de conexión a la base de datos
include 'connection.php';

// realizar consulta a la base de datos
$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($con, $sql);
?>

<form method="post" action="agregar-usuario.php">
    <input type="text" name="usuario" placeholder="Usuario">
    <input type="text" name="correo" placeholder="Correo electrónico">
    <button type="submit">Agregar</button>
</form>

<!-- tabla HTML -->
<table id="usuarios">
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['usuario']; ?></td>
            <td><?php echo $fila['correo']; ?></td>
            <td>
            <form method="post" action="editar-usuario.php">
    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
    <input type="text" name="usuario" value="<?php echo $fila['usuario']; ?>">
    <input type="text" name="correo" value="<?php echo $fila['correo']; ?>">
    <button type="submit">Guardar</button>
</form>
<form method="post" action="eliminar-usuario.php">
    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
    <button type="submit">Eliminar</button>
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
                        </div>
                        </section>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
                        <script>
                        $(document).ready(function() {
                            $('#usuarios').DataTable({
                                "language": {
                                    "url": "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                                }
                            });
                        });
                        </script>
                        </body>
                        </html>
