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
    if(isset($_POST['cantidad'])){
        $id= $_POST['id'];
        $cuantos= $_POST['cantidad'];
        if($cuantos<1){
            $carritoCompra[$id]= NULL;
        }
        else{
            $carritoCompra[$id]['cantidad']=$cuantos;
        }
    }
    if(isset($_POST['id2'])){
        $id=$_POST['id2'];
		$carritoCompra[$id]=NULL;
    }
    $_SESSION['carrito']=$carritoCompra;
}
if(isset($_SESSION['carrito'])){
    for($i=0;$i<=count($carritoCompra)-1;$i ++){
        if($carritoCompra[$i]!=NULL){ 
            $totalc = $carritoCompra['cantidad'];
            $totalc ++ ;
            $totalcantidad += $totalc;
        }
    }
}


if ($_POST["imagen"] == 'portes'){
	header("Location: pago.php");
}else{
header("Location: ".$_SERVER['HTTP_REFERER']."");
}
?>