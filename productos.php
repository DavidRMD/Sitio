<?php include("template/cabecera.php"); ?>

<?php 
include("administrador/config/bd.php");
$sentenciaSQL = $conexion->prepare("SELECT * FROM libros");
$sentenciaSQL->execute();
$listaLibros = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<script>
    const btnAbrirModal = document.querySelector("#btn-abrir-modal");
    const btnCerrarModal =document.querySelector("#btn-cerrar-modal");
    const modal =document.querySelector("#modal");

    btnAbrirModal.addEventListener("click", ()=>{
        modal.showModal();
    })
    btnCerrarModal.addEventListener("click", ()=>{
        modal.close();
    })
</script>

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
                        <a name="+info" id="+info" class="btn btn-info" href="https://github.com/" onclick="window.open(this.href, 'new', 'popup'); return false;" role="button" style="padding: 12px 18px 11px 18px;"><h5><strong>Ver más</strong></h5></a>
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
                        <a name="+info" id="+info" class="btn btn-info" href="https://github.com/" onclick="window.open(this.href, 'new', 'popup'); return false;" role="button" style="padding: 12px 18px 11px 18px;" ><h5><strong>Ver más</strong></h5></a>
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
                        <a name="+info" id="+info" class="btn btn-info" href="https://github.com/" onclick="window.open(this.href, 'new', 'popup'); return false;" role="button" style="padding: 12px 18px 11px 18px;"><h5><strong>Ver más</strong></h5></a>
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
        <div class="row">
            <?php foreach($listaLibros as $libro){  ?>
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="./img/<?php echo $libro['imagen'];?>" alt="">
                        <div class="card-body">
                            <h4 class="card-title">     <?php echo $libro['nombre'];?>   </h4>
                            <a name="" id="" class="btn btn-primary" href="https://github.com/" role="button">Ver más</a>
                        </div>                       
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</section>
<?php include("template/pie.php"); ?>