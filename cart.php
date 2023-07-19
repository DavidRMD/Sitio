<?php session_start();

if(isset($_SESSION['carrito']) || isset($_POST['nombre'])){
    if(isset($_SESSION['carrito'])){
        $carritoCompra= $_SESSION['carrito'];
        if(isset($_POST['nombre'])){
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];
            $img    = $_POST['imagen'];
            $donde = -1;
            if($donde != -1){
                $cuanto = $carritoCompra[$donde]['cantidad'] + $cantidad;
                $carritoCompra[$donde] = array("nombre"=>$nombre, "precio"=>$precio, "cantidad"=>$cuanto, "imagen"=>$img);
            }
            else{
                $carritoCompra[] = array("nombre"=>$nombre, "precio"=>$precio, "cantidad"=>$cantidad, "imagen"=>$img);
            }
        }      
    }
    else{
        $img= $_POST['imagen'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $img    = $_POST['imagen'];
        $carritoCompra[] = array("nombre"=>$nombre, "precio"=>$precio, "cantidad"=>$cantidad, "imagen"=>$img);      
    }
    $_SESSION['carrito']=$carritoCompra;
}
header("Location: ".$_SERVER['HTTP_REFERER']."");
?>