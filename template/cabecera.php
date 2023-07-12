<?php error_reporting(E_ALL & ~E_WARNING);?>
<?php 
    include("./administrador/config/bd.php");
    session_start();
    $nombrePersona= $_SESSION["nombrePersona"];
?>

<?php $url="http://" .$_SERVER['HTTP_HOST']."/sitioWeb"?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE= edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TESIP</title>

    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/cabecera.css"/>
    <link rel="stylesheet" href="../css/estilo.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <h1><a href="index.php" style="color: white; text-decoration:none; padding: 7px 15px; transition: all 0.3s ease-in-out"><img width="70" src="img/chip.jpg">TESIP</a></h1>
                <ul class="nav navbar-nav" style="color: white; text-decoration-style: bold;">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productos.php">Servicios y Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="nosotros.php">Acerca de</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
                <form class="d-flex" class="container">
                    <input class="form-control me-sm-2" type="search" placeholder="Buscar">
                    <button class="btn btn-light my-2 my-sm-0" type="submit"><img width="20" src="img/buscar.jpg"></button>
                    <a name="login" id="login" href="login.php" style="padding: 10px 25px 0px 25px;" ><img width="25" src="img/usuario.jpg"> <?php echo $nombrePersona; ?></a>
                    <a name="cerrado" id="cerrado" class="btn btn-dark my-2" href="<?php echo $url;?>/template/close.php" role="button">LogOut</a>
                </form>
            </div>
        </nav>
    </header>

