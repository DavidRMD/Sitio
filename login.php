<?php error_reporting(E_ALL & ~E_WARNING);?>
<?php $url="http://" .$_SERVER['HTTP_HOST']."/sitioWeb"?>

<?php
include("administrador/config/bd.php");
session_start();
$txtnombre     = (isset($_POST['txtnombre']))?$_POST['txtnombre']:"";
$txtpassword = (isset($_POST['txtpassword']))?$_POST['txtpassword']:"";
$txtemail = (isset($_POST['txtemail']))?$_POST['txtemail']:"";
$accion         = (isset($_POST['accion']))?$_POST['accion']:"";
    if(isset($_POST['registro'])){
        $txtnombre     = $_POST["txtname"];
        $txtemail      = $_POST["txtemail"];
        $txtpassword   = $_POST["txtpassword"];

        $sql = "INSERT INTO usuarios VALUES('$txtnombre',
                                            '$txtemail',
                                            '$txtpassword')";
        $ejecutar =mysqli_query($conect, $sql);
        if(!$ejecutar){
        }
        else{
            echo '<br><h3 style="text-align:center; border: 5px solid red;">Se han guardado los datos correctamente</h3>';
            header("Location:index.php");
        }
    }
    elseif(isset($_POST['entrar'])){
        $txtnombre      = $_POST["txtnombre"];
        $txtpassword   = $_POST["txtpassword"];
        $sentenciaSQL = $conexion->prepare("SELECT * FROM usuarios WHERE nombre= :nombre");
        $sentenciaSQL->bindParam(':nombre',$txtnombre);
        $sentenciaSQL->execute();
        $persona = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
        $txtnombre       = $persona['nombre'];
        $txtpassword    = $persona['password'];

        if($_POST){
            if(($_POST['txtnombre']== $txtnombre) && ($_POST['txtpassword']== $txtpassword)){
                $_SESSION['persona']="ok";
                $_SESSION['nombrePersona']= "$txtnombre";
                header("Location:index.php");    
            }
            else{
                $mensaje="Error: El usuario o contraseña son incorrectos";    
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>SignUp and Login</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css" />
    </head>
    <body>
        <br><br><hr><br><br><br><hr>
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form class="registro" method="post">
                    <h1>Registrate</h1>
                    <!--<div class="social-container">
                        <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="social"><i class="fa fa-google"></i></a>
                        <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
                    </div>-->
                    <p>Utiliza tu correo para conectar</p>
                    <input type="text" name="txtname" placeholder="Nombre">
                    <input type="email" name="txtemail" placeholder="Email">
                    <input type="password" name="txtpassword" placeholder="Contraseña">
                    <button name="registro" value="registro" >Registrate</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form class="Inisio" method="post" >
                    <h1>Iniciar Sesión</h1>
                    <!--<div class="social-container">
                        <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="social"><i class="fa fa-google"></i></a>
                        <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
                    </div>-->
                    <p>Ingresa tu Usuario y Contraseña</p>
                    <input type="text" name="txtnombre" placeholder="Usuario">
                    <input type="password" name="txtpassword" placeholder="Contraseña">
                    <a href="#">¿Olvidaste tu contraseña?</a>
                    <button name="entrar" value="entrar">Iniciar Sesion</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>¡Bienvenido de Vuelta!</h1>
                        <h5>Ingresa tus datos para acceder</h5>
                        <button class="ghost" id="signIn">Iniciar Sesión</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>¡Hola!</h1>
                        <h2>¿Primera vez?</h2>
                        <p>¡Registrate aqui!</p>
                        <button class="ghost" id="signUp">¡Registrarse!</button>
                    </div>
                </div>
            </div>
        </div>

    <script type="text/javascript">
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });
        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
    <br><br><hr><br><br>

    <br><hr>
    <style>
        footer{
            text-align: center;
            padding: 40px;
        }
    </style>
    <footer>
    <a href="index.php" ><img width="120" src="img/chip.jpg"></a>
        <p style="color: #FFFFFF; font-size: 13px; margin: 20px;" >&copy Copyright TESIP - 2023</p>
    </footer>
        
    </body>
</html>








