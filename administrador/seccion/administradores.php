<?php error_reporting(E_ALL & ~E_WARNING);?>
<?php include('../template/cabecera.php');?>
<?php 
/*print_r($_POST);
print_r($_FILES);   //<!--para que el formulario acepte fotografias archivos y demas-->
*/      //Validamos que la información del formulario si llega al realizar una accion de los botones
$txtContrasenia = (isset($_POST['txtContrasenia']))?$_POST['txtContrasenia']:"";     //si existe algo en(2do)txtID entonces txtId(1ero) va a ser igual al valor enviado, al txtId(3ro), de lo contrario quedara vacio (comillas)
$txtNombre      = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";       //Verifica que se envie la informaicón
$accion         = (isset($_POST['accion']))?$_POST['accion']:"";

include('../config/bd.php');
switch($accion){
    case "Agregar":
        //INSERT INTO `libros` (`id`, `nombre`, `imagen`) VALUES (NULL, 'Libro de php', 'imagen.jpg');
        $sentenciaSQL = $conexion->prepare("INSERT INTO administradores (usuario, contrasenia) VALUES (:usuario, :contrasenia);"); //->Parametros a insertar en la bd 
        $sentenciaSQL->bindParam(':usuario',$txtNombre);
        $sentenciaSQL->bindParam(':contrasenia',$txtContrasenia);     //Se escribe en la base de datos con la inf. proporcionada por el usuario
    
        $sentenciaSQL->execute();
        header("Location:administradores.php");
        //echo "Presionado botón agregar";
    break;

    case "Modificar":
        $sentenciaSQL = $conexion->prepare("UPDATE administradores SET usuario=:usuario WHERE contrasenia= :contrasenia"); //->Parametros a insertar en la bd 
        $sentenciaSQL->bindParam(':usuario',$txtNombre);
        $sentenciaSQL->bindParam(':contrasenia',$txtContrasenia);
        $sentenciaSQL->execute();

        $sentenciaSQL = $conexion->prepare("UPDATE administradores SET contrasenia=:contrasenia WHERE usuario= :usuario"); //->Parametros a insertar en la bd 
        $sentenciaSQL->bindParam(':contrasenia',$txtContrasenia);
        $sentenciaSQL->bindParam(':usuario',$txtNombre);
        $sentenciaSQL->execute();
        header("Location:administradores.php");
    break;

    case "Cancelar":
        header("Location:administradores.php");       //La instruccion permite limpiar el buscador
        //echo "Presionado botón cancelar";
    break;
    
    case "Seleccionar":
        $sentenciaSQL = $conexion->prepare("SELECT * FROM administradores WHERE usuario= :usuario"); //->Selecciona los registros id con el id que se selecciono
        $sentenciaSQL->bindParam(':usuario',$txtNombre);
        $sentenciaSQL->execute();
        $persona = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtNombre      = $persona['usuario'];
        $txtContrasenia = $persona['contrasenia'];
        //echo "Presionado botón Seleccionar";
    break;

    case "Borrar":

        $sentenciaSQL = $conexion->prepare("SELECT contrasenia FROM administradores WHERE usuario= :usuario"); //->Selecciona los registros id con el id que se selecciono
        $sentenciaSQL->bindParam(':usuario',$txtNombre);
        $sentenciaSQL->execute();
        $persona = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        /*if(isset($libro["imagen"]) && ($libro["imagen"]!= "imagen.jpg")){
            if(file_exists("../../img/".$libro["imagen"])){
                unlink("../../img/".$libro["imagen"]);            
            }
        }*/

        $sentenciaSQL = $conexion->prepare("DELETE FROM administradores WHERE usuario= :usuario"); //->Parametros a insertar en la bd 
        $sentenciaSQL->bindParam(':usuario',$txtNombre);
        $sentenciaSQL->execute();
        header("Location: administradores.php");
        //echo "Presionado botón Borrar";
    break;
        
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM administradores");
$sentenciaSQL->execute();
$listaPersonas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="col-md-7">
    <table class="table table-bordered">        <!--Se le coloca un borde a la tabla de los elementos que se le inserten-->
        <thead>
            <tr> 
                <th>Usuario</th>
                <th>Contraseña</th>             <!--Titulos de las columnas-->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaPersonas as $persona) { ?>
                <tr>
                    <td><?php echo $persona['usuario']; ?></td>                   <!--1eros datos-->
                    <td><?php echo $persona['contrasenia']; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="txtNombre" id="txtNombre" value="<?php echo $persona['usuario']; ?>">
                            <input name="accion" class="btn btn-primary" type="submit" value="Seleccionar">
                            <input name="accion" class="btn btn-danger" type="submit" value="Borrar">
                        </form>
                    </td>
                </tr>
                <?php }?>
        </tbody>
    </table>
</div>

<div class="col-md-5"> <!--De la pantalla de 12, se elige una fraccion de 5-->

    <div class="card">
        <div class="card-header">
            Datos del administrador
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">      <!--enctype para poder recepcionar archivos-->
                <div class = "form-group">
                    <label for="txtNombre">Usuario</label>
                    <input type="text" required class="form-control" value="<?php echo $txtNombre;?>" name="txtNombre" id="txtNombre" placeholder="Nombre del Administrador">
                </div>

                <div class="form-group">
                    <label for="txtContrasenia">Contraseña</label>
                    <input type="text" required class="form-control" value="<?php echo $txtContrasenia;?>" name="txtContrasenia" id="txtContrasenia" placeholder="Contraseña del administrador">
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" <?php echo($accion=="Seleccionar")?"disabled":"";?> value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" <?php echo($accion!="Seleccionar")?"disabled":"";?> value="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion" <?php echo($accion!="Seleccionar")?"disabled":"";?> value="Cancelar" class="btn btn-info">Cancelar</button>       <!--//Botones para hacer una sola opcion, o seleccionar -->
                </div>
                    
            </form>
        </div>       
    </div>
</div>

<?php include('../template/pie.php');?>