<?php ?>


<div class="modal fade" id="modal_car" tabindex="-1" aria-hidden="true">
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
                                session_start();
                                    if(isset($_SESSION['carrito'])){
                                        $carritoCompra= $_SESSION['carrito'];
                                        $total = 0;
                                        for($i=0; $i<=count($carritoCompra)-1; $i ++){
                                            if(isset($carritoCompra[$i])){
                                                if($carritoCompra[$i] != NULL){
                                ?>                                                                                                                        
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div class="row col-12">
                                        <div class="col-6 p-0" style="text-align: left; color: #000000;">
                                            <h6 class="my-0">Cantidad: <?php echo $carritoCompra[$i]['cantidad']; ?> : <?php echo $carritoCompra[$i]['nombre']; ?>  |  $ <?php echo $carritoCompra[$i]['precio']; ?> </h6>
                                        </div>
                                        <div class="col-6 p-0" style="text-align: right; color: #000000;">
                                            <span class="text-muted" style="text-align: right; color: #000000;"> <?php echo $carritoCompra[$i]['precio'] * $carritoCompra[$i]['cantidad']; ?> </span> 
                                        </div>
                                    </div>
                                </li>
                                <?php
                                $total = $total + ($carritoCompra[$i]['precio'] * $carritoCompra[$i]['cantidad']);
                                                }
                                            }
                                        }
                                    }
                                ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span style="text-align: left; color: #000000;">Total (MX)</span>
                                    <strong style="text-align: left; color: #000000;"> $ <?php
                                    if(isset($_SESSION['carrito'])){
                                        $total = 0;
                                        for($i= 0; $i<=count($carritoCompra)-1;$i ++){
                                            if(isset($carritoCompra[$i])){
                                                if($carritoCompra[$i]!=NULL){
                                                    $total = $total + ($carritoCompra[$i]['precio'] * $carritoCompra[$i]['cantidad']);
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
                                    echo $total; ?> Mx</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secundary" data-bs-dismiss="modal">Cerrar</button> 
                <a type="button" class="btn btn-primary" href="borrarCarro.php">Vaciar Carrito</a>
                <a type="button" class="btn btn-success" href="">Continuar Pedido</a> 
            </div>
        </div>
    </div>
</div>