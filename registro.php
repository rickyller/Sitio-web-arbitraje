<?php
include 'connection.php';

if (isset($_POST['nombre'], $_POST['contrasena'], $_POST['edad'], $_POST['correo'], $_POST['usuario'], $_POST['telefono'])) {
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $telefono = $_POST['telefono'];

    var_dump($_POST);
    $sql = "INSERT INTO usuarios (id, nombre, contrasena, edad, correo, usuario, telefono) VALUES (0, '$nombre', '$contrasena', '$edad', '$correo', '$usuario', '$telefono')";
    echo $sql;
    
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        header("Location: Pagina%20arbitro%201.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

?>
