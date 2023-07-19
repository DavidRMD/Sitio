<?php
session_start();

include("./administrador/config/bd.php");

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
									<span class="text-muted"  style="text-align: right; color: #000000;"><?php echo $carritoCompra[$i]['precio'] * $carritoCompra[$i]['cantidad'];    ?> €</span>
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
            <a type="button" class="btn btn-success" href="../Carrito de compra paso 2/index.php">Continuar pedido</a>
        </div>
    </div>
  </div>
</div>


<style>
.container_card{    margin: 0 auto;    padding:  0px 20px 20px 20px;    display: grid;    /* width: 800px; */    grid-template-columns: 1fr 1fr ;   grid-gap:1em;        /* grid-row-gap: 60px; */}
.blog-post{    position: relative;    margin-bottom: 15px;    margin: 30px;}
.blog-post img{    width: 100%;    height: 450px;    object-fit: cover;    border-radius: 10px;    }
.blog-post .category{    position: absolute;    top: 20px;    left: 20px;    padding: 10px 15px;  font-size: 14px;    text-decoration: none;    background-color: #e67e22;    color: #fff;    border-radius: 5px;    box-shadow: 1px 1px 8px rgba(0,0,0,0.1);    text-transform: uppercase;}
.text-content{    position: absolute;    bottom: -30px;    padding: 20px;    background-color: #fff;    width: calc(100% - 20px);    left: 50%;    transform: translateX(-50%);    border-radius: 10px;    box-shadow: 1px 1px 8px rgba(0,0,0,0.08);/* padding-top: 50px; */}
.text-content h2{    font-size: 20px;    font-weight: 400;    /* margin-bottom: 30px; */}
.text-content img{    height: 70px;    width: 70px;    border: 5px solid rgba(0,0,0,0.1);    border-radius: 50%;    position: absolute;    top: -35px;    left: 35px;}
.tags a{    color: #888;    font-weight: 700;    text-decoration: none;    margin-right: 15px;    transition: 0.3s ease;}
.tags a:hover{    color: #000;}
@media screen and (max-width: 1100px) {    .container_card{        grid-template-columns: 1fr 1fr;        grid-row-gap: 60px;    }}
@media screen and (max-width: 600px) {    .container_card{        grid-template-columns: 1fr;        grid-row-gap: 60px;    }}
</style>

<main>
    <div class="center mt-5">
        <div class="card pt-3" >
                <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Mis pedidos</p>
                <div class="container-fluid p-2">
                        <table class="table">
                                <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Ref</th>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Estado</th>
                                        </tr>
                                </thead>
                                <tbody>
                                <?php
$busqueda=mysqli_query($conect,"SELECT t.ref, t.estado, t.medio, t.total, t2.cantidad, t2.articulo, t2.precio, t2.total AS 'total_precio', t3.nombre 
FROM programaciononline.pedidocp t
LEFT JOIN programaciononline.pedidodatos t2 ON t.ref = t2.ref
LEFT JOIN programaciononline.pedidocliente t3 ON t.cliente = t3.ref
GROUP BY t.ref
"); 
                                $numero = mysqli_num_rows($busqueda); ?>
                                        <h5 class="card-tittle">Resultados (<?php echo $numero; ?>)</h5>
                                        <div class="container_card">
                                                <?php 
                                                $num = '0';
                                                while ($resultado = mysqli_fetch_assoc($busqueda)){
                                                $num++;
                                                ?>
                                                        <tr onclick="location.href='../Carrito de compra paso 7/index.php?dat=<?php echo $resultado['ref']; ?>'" style="cursor: pointer;">
                                                        <th scope="row"><?php echo $num; ?></th>
                                                        <td><?php echo $resultado["ref"]; ?></td>
                                                        <td><?php echo $resultado["nombre"]; ?></td>
                                                        <td><?php echo $resultado["total"]; ?> €</td>
                                                        <td><?php echo $resultado["estado"]; ?></td>
                                                        </tr>    

                                                <?php } ?>
                                        </div>
                                </tbody>
                        </table>
                </div>
        </div>
</div>


</main>

<?php include("template/pie.php");?>