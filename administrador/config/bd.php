<?php
$host= "localhost:3307";
$usuario= "root";
$contrasenia= "";
$bd= "sitio";

try {                   //Prueba de conexion con la base de datos
    $conexion = new PDO("mysql:host=$host;dbname=$bd", $usuario, $contrasenia);
    //if($conexion){echo "Conectado... a sistema ";}
} catch (Exception $ex) {
    echo $ex->getMessage();
}

    $conect= mysqli_connect($host, $usuario, $contrasenia, $bd);
?>