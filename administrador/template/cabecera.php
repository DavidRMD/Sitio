<?php 
    session_start();
    if(!isset($_SESSION['usuario'])){
      header("location:../index.php");      //Si no hay usuario logeado, dirigete al index del php, ( el inicio de sesion)
    }
    else{
      if($_SESSION['usuario']=="ok"){
        $nombreUsuario= $_SESSION["nombreUsuario"];
      }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  
<?php $url="http://" .$_SERVER['HTTP_HOST']."/sitioWeb"?>

    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="<?php echo $url;?>/administrador/inicio.php">Administrador del sitio Web</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/inicio.php">Inicio</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/clientes.php">Clientes</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/cerrar.php">Cerrar Sesion</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>">Ver sitio Web</a>

        </div>
    </nav>
    <div class="container">
        <br/>
        <div class="row">