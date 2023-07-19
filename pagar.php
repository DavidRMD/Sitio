<?php  session_start();
include("./administrador/config/bd.php");
//insertamos los datos del cliente
//creamos referencia de cliente
$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
$password = "";
for($i=0;$i<5;$i++) {
$password .= substr($str,rand(0,64),1);
}
$ref_cliente = $password;
$query = "INSERT INTO pedidocliente (ref,nombre,apellidos,localidad,telefono)
VALUES ('".$ref_cliente."', '".$_POST["nombre"]."', '".$_POST["apellidos"]."', '".$_POST["localidad"]."', '".$_POST["telefono"]."')";
$result = mysqli_query($conect,$query);

//creamos referencia de pedido
$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
$password = "";
for($i=0;$i<5;$i++) {
$password .= substr($str,rand(0,64),1);
}
$ref = $password;

//insertamos el pedido
if(isset($_SESSION['carrito'])){
    $carritoCompra=$_SESSION['carrito'];
    // $_SESSION['carrito']=$carrito_mio;
    }
    if(isset($_SESSION['carrito'])){
        $total=0;
        for($i=0;$i<=count($carritoCompra)-1;$i ++){
            if(isset($carritoCompra[$i])){
                if($carritoCompra[$i]!=NULL){
                    $cantidad = $carritoCompra[$i]['cantidad'];
                    $articulo = $carritoCompra[$i]['nombre'];
                    $precio = $carritoCompra[$i]['precio'];
                    $total_precio = $precio * $cantidad;
                    $query = "INSERT INTO pedidodatos (ref,cantidad,nombre,precio,total)
                    VALUES ('$ref', '$cantidad', '$articulo', '$precio', '$total_precio')";
                    $result = mysqli_query($conect,$query);            
                }
            }
        }
    }
    if(isset($_SESSION['carrito'])){
        $total=0;
        for($i=0;$i<=count($carritoCompra)-1;$i ++){
            if(isset($carritoCompra[$i])){
                if($carritoCompra[$i]!=NULL){ 
                    $total=$total + ($carritoCompra[$i]['precio'] * $carritoCompra[$i]['cantidad']);
                }
            }
        }
    }
    if(!isset($total)){
        $total = '0';
    }
    else{ 
        $total = $total;
    }
//echo $total; 
$ref_user = $ref_cliente;
$estado = 'Falta de pago';
$medio = 'Tarjeta bancaria';
$total_pedido = $total;

$query = "INSERT INTO pedidocp (ref,cliente,estado,medio,total)
VALUES ('$ref', '$ref_user', '$estado', '$medio', '$total_pedido')";
$result = mysqli_query($conect,$query);


unset( $_SESSION["carrito"] ); 

header("Location: check.php");



?>