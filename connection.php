<?php
$server= "localhost";
$database= "ArbitroZMG";
$username= "root";
$passwd= "fichur1t0";

$con = mysqli_connect($server,$username,$passwd,$database);

if($con){
    echo '';
}
else{
    echo "Conexion no exitosa";
}

?>