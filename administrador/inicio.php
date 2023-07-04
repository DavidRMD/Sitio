<?php include('template/cabecera.php');?>

            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-3">Binvenido <?php echo $nombreUsuario; ?></h1>
                    <p class="lead">Administración de Productos dentro del sitio web</p>
                    <hr class="my-2">
                    <p>Mas informacion</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="seccion/productos.php" role="button">Administrar Productos</a>
                        <a class="btn btn-danger btn-lg" href="seccion/administradores.php" role="button">Administrar Administradores</a>
                    </p>
                </div>
            </div>

<?php include('template/pie.php');?>
