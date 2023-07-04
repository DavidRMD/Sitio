<?php include("template/cabecera.php"); ?>

<?php 
include("administrador/config/bd.php");

$sentenciaSQL = $conexion->prepare("SELECT * FROM libros");
$sentenciaSQL->execute();
$listaLibros = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="informacion">
    <div class="container">
        <br>
        <div class="row">
            <div class="jumbotron text- justify">
                <h2 style="text-align: center;">Productos y Servicios</h2><br></br>
                <p>Aquí encontraras lo necesario para la elaboración de tus <a href="#">proyectos</a>. Desde componentes electronicos y mecanicos, hasta espacios de trabajo y maquinaria especial a muy bajo costo.</p>
                <h2>Productos</h2>
                <p>Descubre nuestra amplia selección de componentes electrónicos para proyectos. Desde resistencias hasta microcontroladores, tenemos todo lo necesario para personalizar tus dispositivos electrónicos con calidad y rendimiento garantizados.</p>
                <h2>Servicios</h2>
                <p>Además de los mejores componentes electrónicos, te ofrecemos servicios para llevar tus proyectos al siguiente nivel.</p>
                <ul>
                    <li>Disfruta de espacios de trabajo equipados y colaborativos, donde podrás dar vida a tus ideas.</li>
                    <li>También contamos con maquinaria especializada para tus proyectos, sin necesidad de invertir en su compra.</li>
                </ul>
                <!--<p><small>This line of text is meant to be treated as fine print.</small></p>
                <p>The following is <strong>rendered as bold text</strong>.</p>
                <p>The following is <em>rendered as italicized text</em>.</p>
                <p>An abbreviation of the word attribute is <abbr title="attribute">attr</abbr>.</p>-->
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
        <br>
        <div class="row">
            
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="./img/<?php echo $libro['imagen'];?>" alt="">
                    <div class="card-body">
                        <h4 class="card-title">     <?php echo $libro['nombre'];?>   </h4>
                        <a name="+info" id="+info" class="btn btn-info" href="https://github.com/" role="button"><h3><strong>Ver más</strong></h3></a>
                        <a name="apartar" id="apartar" class="btn btn-success" href="https://github.com/" role="button"><h3><strong>Apartar</strong></h3></a>
                    </div>                       
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="./img/<?php echo $libro['imagen'];?>" alt="">
                    <div class="card-body">
                        <h4 class="card-title">     <?php echo $libro['nombre'];?>   </h4>
                        <a name="+info" id="+info" class="btn btn-info" href="https://github.com/" role="button"><h3><strong>Ver más</strong></h3></a>
                        <a name="apartar" id="apartar" class="btn btn-success" href="https://github.com/" role="button"><h3><strong>Apartar</strong></h3></a>
                    </div>                       
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="./img/<?php echo $libro['imagen'];?>" alt="">
                    <div class="card-body">
                        <h4 class="card-title">     <?php echo $libro['nombre'];?>   </h4>
                        <a name="+info" id="+info" class="btn btn-info" href="https://github.com/" role="button"><h3><strong>Ver más</strong></h3></a>
                        <a name="apartar" id="apartar" class="btn btn-success" href="https://github.com/" role="button"><h3><strong>Apartar</strong></h3></a>
                    </div>                       
                </div>
            </div>
        </div>
        <br><hr><br>
    </div>
</section>

<section class="productos">
    <div class="container">

    <h2 style="text-align: center;">Componentes electronicos</h2><br></br>
        <br>
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
