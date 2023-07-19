<?php
session_start();
if(isset($_SESSION['carrito'])){
    $carritoCompra = $_SESSION['carrito'];
}
if(isset($_SESSION['carrito'])){
    for($i=0; $i<=count($carritoCompra)-1; $i ++){
        if(isset($carritoCompra[$i])){
            if($carritoCompra[$i]!= NULL){
                if(!isset($carritoCompra['cantidad'])){
                    $carritoCompra['cantidad']= '0';
                }
                else{
                    $carritoCompra['cantidad'] = $carritoCompra['cantidad'];
                }
                $total_cantidad = $carritoCompra['cantidad'];
                $total_cantidad ++;
                if(!isset($totalcantidad)){
                    $totalcantidad = '0';
                }
                else{
                    $totalcantidad = $totalcantidad;
                }
                $totalcantidad += $total_cantidad;
            }
        }
    }
}
if(!isset($totalcantidad)){
    $totalcantidad = '';
}
else{
    $totalcantidad = $totalcantidad;
}
?>
<?php 
    include("template/cabecera.php"); 
?>
<nav class= "navbar navbar-expand-lg navbar-dark" style="background-color: #112956;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Mi tienda</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toogle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: red; cursor: pointer;"><i class="fas fa-shopping-cart"></i> <?php echo $totalcantidad; ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- MODAL CARRITO -->
<div class="modal fade" id="modal_cart" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mi carrito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   
   
     
			<div class="modal-body">
				<div>
					<div class="p-2">
						<ul class="list-group mb-3">
							<?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carritoCompra)-1;$i ++){
                                if(isset($carritoCompra[$i])){
                                if($carritoCompra[$i]!=NULL){
							?>
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div class="row col-12" >
									<div class="col-6 p-0" style="text-align: left; color: #000000;"><h6 class="my-0">Cantidad: <?php echo $carritoCompra[$i]['cantidad'] ?> : <?php echo $carritoCompra[$i]['nombre']; // echo substr($carrito_mio[$i]['titulo'],0,10); echo utf8_decode($titulomostrado)."..."; ?></h6>
									</div>
									<div class="col-6 p-0"  style="text-align: right; color: #000000;" >
									<span class="text-muted"  style="text-align: right; color: #000000;"> $ <?php echo $carritoCompra[$i]['precio'] * $carritoCompra[$i]['cantidad'];    ?> </span>
									</div>
								</div>
							</li>
							<?php
							$total=$total + ($carritoCompra[$i]['precio'] * $carritoCompra[$i]['cantidad']);
							}
                            }
							}
							}
							?>
							<li class="list-group-item d-flex justify-content-between">
							<span  style="text-align: left; color: #000000;">Total (MX)</span>
							<strong  style="text-align: left; color: #000000;"> $ <?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carritoCompra)-1;$i ++){
                                if(isset($carritoCompra[$i])){
							if($carritoCompra[$i]!=NULL){ 
							$total=$total + ($carritoCompra[$i]['precio'] * $carritoCompra[$i]['cantidad']);
                            }
							}}}
                            if(!isset($total)){$total = '0';}else{ $total = $total;}
							echo $total; ?> </strong>
							</li>
						</ul>
					</div>
				</div>
			</div>
        </div>
        <div class="modal-footer">        
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <a type="button" class="btn btn-primary" href="borrarcarro.php">Vaciar carrito</a>
            <a type="button" class="btn btn-success" href="item.php" target="_blank" >Continuar pedido</a>
        </div>
    </div>
  </div>
</div>


<?php //include("nav_cart.php"); //include("modal_cart.php")?>

<?php 
include("administrador/config/bd.php");
$sentenciaSQL = $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="informacion">
    <div class="container">
        <br>
        <div class="row">
            <div class="jumbotron text- justify">
                <h1 style="text-align: center;">Productos y Servicios</h2><br></br>
                <h5>Aquí encontraras lo necesario para la elaboración de tus <a href="apartado.php">proyectos</a>. Desde componentes electronicos y mecanicos, hasta espacios de trabajo y maquinaria especial a muy bajo costo.</h5>
                <h2>~ Productos ~</h2>
                <h5>Descubre nuestra amplia selección de componentes electrónicos para proyectos. Desde resistencias hasta microcontroladores, tenemos todo lo necesario para personalizar tus dispositivos electrónicos con calidad y rendimiento garantizados.</h5>
                <h2>~ Servicios ~</h2>
                <h5>Además de los mejores componentes electrónicos, te ofrecemos servicios para llevar tus proyectos al siguiente nivel.</h5>
                <ul>
                    <li><h5>Disfruta de espacios de trabajo equipados y colaborativos, donde podrás dar vida a tus ideas.</h5></li>
                    <li><h5>También contamos con maquinaria especializada para tus proyectos, sin necesidad de invertir en su compra.</h5></li>
                </ul>
                <br><br>
            </div>
            <hr><hr>
        </div>
    </div>
</section>

<style>
    .card a{
        padding: 20px;
        margin: 20px;
    }
</style>

<section class="espacios">
    <div class="container">
    <h2 style="text-align: center;">Espacios y Áreas de trabajo</h2><br></br>
    <img width="400" class="img-tumbnail rounded mx-auto d-block" src="./img/espacios.jpg"  alt="Espacios de Trabajo"><br>

    <h3 style="text-align: center">Escoge entre nuestros diferentes espacios para trabajar</h3><br>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <br><h3 style="text-align: center">Espacio1 - GrupoE</h3><hr>
                    <img class="card-img-top" src="./img/espacio1.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Grupo E1 - para grupos de más de 6 personas.</h4><br>
                        <h5 class="card-title">Espacio de trabajo amplio, ideal para equipos/grupos grandes.</h5>
                        <a name="+info" id="+info" class="btn btn-info" href="template/espacio1.html" onclick="window.open(this.href, 'new', 'popup'); return false;" role="button" style="padding: 12px 18px 11px 18px;"><h5><strong>Ver más</strong></h5></a>
                        <a name="apartar" id="apartar" class="btn btn-success" href="./apartado.php" target="_blank" role="button" style="padding: 12px 18px 11px 18px;"><h5><strong>Apartar</strong></h5></a>
                    </div>
                </div> 
            </div>

            <div class="col-md-4">
                <div class="card">
                    <br><h3 style="text-align: center">Espacio2 - GrupoG</h3><hr>
                    <img class="card-img-top" src="./img/espacio2.jpg" alt=""><br>
                    <div class="card-body">
                        <br><h4 class="card-title">Grupo G1 - para grupos de 2 a 5 personas.</h4><br>
                        <h5 class="card-title">Espacio ideal de trabajo para equipos/grupos medianos a pequeños.</h5>
                        <a name="+info" id="+info" class="btn btn-info" href="template/espacio2.html" onclick="window.open(this.href, 'new', 'popup'); return false;" role="button" style="padding: 12px 18px 11px 18px;" ><h5><strong>Ver más</strong></h5></a>
                        <a name="apartar" id="apartar" class="btn btn-success" href="./apartado.php" target="_blank" role="button" style="padding: 12px 18px 11px 18px;"><h5><strong>Apartar</strong></h5></a>
                    </div>                       
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <br><h3 style="text-align: center">Espacio3 - GrupoM</h3><hr>
                    <img class="card-img-top" src="./img/espacio3.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Grupo M1 - para grupos de 2 a 4 personas.</h4><br>
                        <h5 class="card-title">Espacio ideal de trabajo para equipos/grupos pequeños o individuales.</h5>
                        <a name="+info" id="+info" class="btn btn-info" href="template/espacio3.html" onclick="window.open(this.href, 'new', 'popup'); return false;" role="button" style="padding: 12px 18px 11px 18px;"><h5><strong>Ver más</strong></h5></a>
                        <a name="apartar" id="apartar" class="btn btn-success" href="./apartado.php" target="_blank" role="button" style="padding: 12px 18px 11px 18px;"><h5><strong>Apartar</strong></h5></a>
                    </div>                       
                </div>
            </div>
        </div><br><hr><hr><br>
    </div>
</section>

<section class="productos">
    <div class="container">
        <h2 style="text-align: center;">Componentes electronicos</h2><br></br>
        <h3 style="text-align: center">Escoge los productos que necesitas de nuestra gran variedad de componentes electronicos</h3><br><br>
        <?php $busqueda = mysqli_query($conect, "SELECT * FROM productos");
        $numero = mysqli_num_rows($busqueda);?>
        <h5>Resultados (<?php echo $numero; ?>)</h5>
        <div class="row">
            <?php while($productos = mysqli_fetch_assoc($busqueda)){ ?>
                <div class="col-md-3">
                    <form id="formulario" name="formulario" method="post" action="cart.php"> 
                        <div class="card">
                            <img class="card-img-top" src="./img/<?php echo $productos['imagen'];?>" alt="producto">
                            <input name="imagen" type="hidden" id="imagen" value="<?php echo $productos['imagen'];  ?>"/>
                            <input name="precio" type="hidden" id="precio" value="<?php echo $productos['precio'];  ?>"/>
                            <input name="nombre" type="hidden" id="nombre" value="<?php echo $productos['nombre'];  ?>"/>
                            <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2"/> 
                            <div class="card-body">
                                <h4 class="card-title">     <?php echo $productos['nombre'];?>   </h4>
                                <h4 class="card-title">    $ <?php echo $productos['precio'];?> pz MX  </h4>
                                <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart"></i>Añadir al carrito</button> 
                            </div>                       
                        </div>
                    </form>
                </div>
            <?php }?>
        </div>
    </div>
    <div class="container">
        <br><hr><a name="CarritoCompra" class="btn btn-success" href="modal_cart.php" target="_blank" role="button" style="padding: 12px 18px 11px 18px;"><h5><strong>Carrito de Compra</strong></h5></a>
    </div>
</section>
<?php include("template/pie.php"); ?>