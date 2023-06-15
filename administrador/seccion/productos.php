<?php include('../template/cabecera.php');?>
<?php 
/*print_r($_POST);
print_r($_FILES);   //<!--para que el formulario acepte fotografias archivos y demas-->
*/      //Validamos que la información del formulario si llega al realizar una accion de los botones

$txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";     //si existe algo en(2do)txtID entonces txtId(1ero) va a ser igual al valor enviado, al txtId(3ro), de lo contrario quedara vacio (comillas)
$txtNombre = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen = (isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion = (isset($_POST['accion']))?$_POST['accion']:"";
/*echo $txtID."<br/>";
echo $txtNombre."<br/>";
echo $txtImagen."<br/>";
echo $accion."<br/>";       */ //Verificar que la infocaion si llegue
include('../config/bd.php');
switch($accion){
    case "Agregar":
        //INSERT INTO `libros` (`id`, `nombre`, `imagen`) VALUES (NULL, 'Libro de php', 'imagen.jpg');
        $sentenciaSQL = $conexion->prepare("INSERT INTO libros (nombre, imagen) VALUES (:nombre, :imagen);"); //->Parametros a insertar en la bd 
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':imagen',$txtImagen);     //Se escribe en la base de datos con la inf. proporcionada por el usuario
        $sentenciaSQL->execute();
        //echo "Presionado botón agregar";
    break;

    case "Modificar":
        echo "Presionado botón modificar";
    break;

    case "Cancelar":
        echo "Presionado botón cancelar";
    break;
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM libros");
$sentenciaSQL->execute();
$listaLibros = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="col-md-5"> <!--De la pantalla de 12, se elige una fraccion de 5-->

    <div class="card">
        <div class="card-header">
            Datos de Libro
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">      <!--enctype para poder recepcionar archivos-->
                <div class = "form-group">
                    <label for="txtID">Id</label>
                    <input type="text" class="form-control" name="txtID" id="txtID" placeholder="ID">
                </div>

                <div class="form-group">
                    <label for="txtNombre">Nombre</label>
                    <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre del libro">
                </div>

                <div class="form-group">
                    <label for="txtNombre">Imagen</label>
                    <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Imagen">
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" value="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
                </div>
                    
            </form>
        </div>
                    
    </div>

                
                
                

</div>



<div class="col-md-7">
    <table class="table table-bordered">        <!--Se le coloca un borde a la tabla de los elementos que se le inserten-->
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>             <!--Titulos de las columnas-->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2</td>                   <!--1eros datos-->
                <td>Aprende php</td>
                <td>image.jpg</td>
                <td>Seleccionar | Borrar</td>
            </tr>
        </tbody>
    </table>
</div>

<?php include('../template/pie.php');?>