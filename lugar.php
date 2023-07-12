<?php include("template/cabecera.php"); include("administrador/config/bd.php");
    $sql = "SELECT * FROM apartado";
    $result =mysqli_query($conect, $sql);
    $mostrar = mysqli_fetch_array($result);
?>

<section class="principal">
            <div class="container">
                <br>
                <div class="row">
                    <div class="jumbotron text-center">
                        <h1 class="display-3">¡Ha apartado el lugar correctamente!</h1><br>
                        <h5 class="lead">Su Espacio ha sido apartado para el dia: <?php echo $mostrar['dia']; ?></h5>
                        <h5 class="lead">A las: <?php echo $mostrar['hora']; ?></h5>
                        <hr class="my-2">
                        <img width="300" src="img/calendario.jpg" class="img-tumbnail rounded mx-auto d-block" >
                        <br><p>Sequir viendo</p>
                        <p class="lead"><a class="btn btn-primary btn-lg" href="index.php" role="button">Inicio</a></p>
                    </div>
                </div>
            </div>
        </section>

<?php include("template/pie.php");?>