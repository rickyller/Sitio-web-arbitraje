<?php
session_start(); // Iniciar la sesión al principio del archivo

include 'connection.php';

if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $result = mysqli_query($con, $sql);
    $sqladmin = "SELECT * FROM admins WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $resultadmin = mysqli_query($con, $sqladmin);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['usuario'] = $usuario; // Almacena el nombre de usuario en la sesión
        header("Location: Pagina%20arbitro%201.php");
        exit();
    } elseif (mysqli_num_rows($resultadmin) == 1) {
        $_SESSION['admin'] = true; // Marca al usuario como administrador en la sesión
        header("Location: admin.php");
        exit();
    } else {
        header("Location: login-datawrong.html");
        exit();
    }
}
?>
