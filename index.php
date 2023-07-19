<?php error_reporting(E_ALL & ~E_WARNING);?>
<?php include("template/cabecera.php"); ?>

    <style>
        .principal{
            padding: 3em 0;
            background: #FEFEFE;
            width: 940px;
            margin: 0 auto;
        }

        .informacion{
            padding: 3em 0;
            background: linear-gradient(#FEFEFE, #888888);
        }

        .video{
            width: 560px;
            margin: 1em auto;
        }

        .mapa{
            padding: 3em 0;
            background: #888888;
        }

        .mapa-contenido{
            width: 940px;
            margin: 0 auto;
        }

    </style>

    <main>
        <section class="principal">
            <div class="container">
                <br>
                <div class="row">
                    <div class="jumbotron text-center">
                        <h1 class="display-3">Bienvenidos</h1>
                        <p class="lead">Consulta los componentes que necesitas</p><br>
                        <hr class="my-2">
                        <img width="400" src="img/tesip2.jpg" class="img-tumbnail rounded mx-auto d-block" >

                        <p>Mas información</p>
                        <p class="lead"><a class="btn btn-primary btn-lg" href="productos.php" role="button">Catalogo de Productos</a></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="informacion" >
            <div class="container">
                <br>
                <div class="row">
                    <div class="jumbotron text-center">
                        <div class="video">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/7hI_3uM-heQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                    </div>
            </div>  
        </section>

        <section class="mapa">
            <div class="container">
                <br>
                <div class="row">
                    <div class="jumbotron text-center">
                        <h3 class="titulo-principal">Nuestra Ubicación</h3>
                        <p>Nuestro establecimiento esta ubicado en el norte de la ciudad</p>
                        <div class="mapa-contenido">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4344.8926938067525!2d-99.12744871368137!3d19.513109944211315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f9c228b343cf%3A0x2f403a140132e3e7!2sUPIITA%20-%20Unidad%20Profesional%20Interdisciplinaria%20en%20Ingenier%C3%ADa%20y%20Tecnolog%C3%ADas%20Avanzadas%20IPN!5e0!3m2!1ses-419!2smx!4v1688410475811!5m2!1ses-419!2smx" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>  
            </div>
        </section>

    </main>
<?php include("template/pie.php"); ?>
