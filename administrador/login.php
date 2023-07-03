<?php error_reporting(E_ALL & ~E_WARNING);?>

<?php
include("config/bd.php");
session_start();

$txtusuario     = (isset($_POST['txtusuario']))?$_POST['txtusuario']:"";     //si existe algo en(2do)txtID entonces txtId(1ero) va a ser igual al valor enviado, al txtId(3ro), de lo contrario quedara vacio (comillas)
$txtcontrasenia = (isset($_POST['txtcontrasenia']))?$_POST['txtcontrasenia']:"";
$accion         = (isset($_POST['accion']))?$_POST['accion']:"";

switch($accion){
    case "entrar":
        //echo "Presionado boton de entrar";
        $sentenciaSQL = $conexion->prepare("SELECT * FROM administradores WHERE usuario= :usuario /*AND contrasenia= :contrasenia*/"); //->Selecciona los registros id con el id que se selecciono
        $sentenciaSQL->bindParam(':usuario',$txtusuario);
        //$sentenciaSQL->bindParam(':contrasenia',$txtcontrasenia);
        $sentenciaSQL->execute();
        $persona = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtusuario     = $persona['usuario'];
        $txtcontrasenia = $persona['contrasenia'];

        if($_POST){
            if(($_POST['txtusuario']== $txtusuario) && ($_POST['txtcontrasenia']== $txtcontrasenia)){
                $_SESSION['usuario']="ok";
                $_SESSION['nombreUsuario']= "$txtusuario";
                header("Location:inicio.php");    
            }
            else{
                $mensaje="Error: El usuario o contraseña son incorrectos";    
            }
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
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">              <!--Se agrega otra division de 4 para poder centrar el login-->
                </div>
                    <div class="col-md-4">          <!--ajustas la ventana del login-->
                        <br/><br/><br/>
                    <div class="card">
                        <div class="card-header">
                            Login
                        </div>
                        <div class="card-body">
                            <?php   if(isset($mensaje)){?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $mensaje;?>
                            </div>
                            <?php }?>
                            <form method="POST" >

                                <div class = "form-group">
                                    <label for="usuario">Usuario</label>
                                    <input type="text" class="form-control" name="txtusuario" id="txtusuario" placeholder="Escribe tu usuario">
                                </div>

                                <div class="form-group">
                                    <label for="contrasenia">Contraseña</label>
                                    <input type="password" class="form-control" name="txtcontrasenia" id="txtcontrasenia" placeholder="Escribe tu contraseña">
                                </div>
                                
                                <button type="submit" name="accion" class="btn btn-primary" value="entrar" >Entrar al administrador</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>