<?php session_start();

if(isset($_SESSION['carrito']) || isset($_POST['nombre'])){
    if(isset($_SESSION['carrito'])){
        $carritoCompra= $_SESSION['carrito'];
        if(isset($_POST['nombre'])){
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];
            $donde = -1;
            if($donde != -1){
                $cuanto = $carritoCompra[$donde]['cantidad'] + $cantidad;
                $carritoCompra[$donde] = array("nombre"=>$nombre, "precio"=>$precio, "cantidad"=>$cuanto);
            }
            else{
                $carritoCompra[] = array("nombre"=>$nombre, "precio"=>$precio, "cantidad"=>$cantidad);
            }
        }      
    }
    else{
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $carritoCompra[] = array("nombre"=>$nombre, "precio"=>$precio, "cantidad"=>$cantidad);      
    }
    $_SESSION['carrito']=$carritoCompra;
}
header("Location: ".$_SERVER['HTTP_REFERER']."");
?>