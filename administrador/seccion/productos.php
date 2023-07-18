<?php include('../template/cabecera.php');?>
<?php 
/*print_r($_POST);
print_r($_FILES);   //<!--para que el formulario acepte fotografias archivos y demas-->
*/      //Validamos que la información del formulario si llega al realizar una accion de los botones
$txtID      = (isset($_POST['txtID']))?$_POST['txtID']:"";     //si existe algo en(2do)txtID entonces txtId(1ero) va a ser igual al valor enviado, al txtId(3ro), de lo contrario quedara vacio (comillas)
$txtNombre  = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";       //Verifica que se envie la informaicón
$txtImagen  = (isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$txtPrecio  = (isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
$accion     = (isset($_POST['accion']))?$_POST['accion']:"";

/*echo $txtID."<br/>";
echo $txtNombre."<br/>";
echo $txtImagen."<br/>";
echo $accion."<br/>";       */ //Verificar que la infocaion si llegue
include('../config/bd.php');
switch($accion){
    case "Agregar":
        //INSERT INTO `libros` (`id`, `nombre`, `imagen`) VALUES (NULL, 'Libro de php', 'imagen.jpg');
        $sentenciaSQL = $conexion->prepare("INSERT INTO productos (nombre, imagen, precio) VALUES (:nombre, :imagen, :precio);"); //->Parametros a insertar en la bd 
        $sentenciaSQL->bindParam(':nombre',$txtNombre);

        $fecha= new DateTime();
        $nombreArchivo= ($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";      //Se genera una instruccion de subida, una foto con una hora, se adjunta la imagen temporal(original), si no esta vacia se mueve a la carpeta del archivo seleccionada

        $tmpImagen= $_FILES["txtImagen"]["tmp_name"];
        if($tmpImagen!=""){
            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);     //Selecionamos donde guardar la imgaen
        }

        $sentenciaSQL->bindParam(':imagen',$nombreArchivo);     //Se escribe en la base de datos con la inf. proporcionada por el usuario
        $sentenciaSQL->bindParam(':precio', $txtPrecio);
        $sentenciaSQL->execute();

        header("Location:productos.php");
        //echo "Presionado botón agregar";
    break;

    case "Modificar":
        $sentenciaSQL = $conexion->prepare("UPDATE productos SET nombre=:nombre WHERE id= :id"); //->Parametros a insertar en la bd 
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        //echo "Presionado botón modificar";
        if($txtImagen!=""){     //Se valida que haya algo

            $fecha= new DateTime();
            $nombreArchivo= ($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";      //Se genera una instruccion de subida, una foto con una hora, se adjunta la imagen temporal(original), si no esta vacia se mueve a la carpeta del archivo seleccionada
            $tmpImagen= $_FILES["txtImagen"]["tmp_name"];                   //Se adjuntan los archivos renombrando y trabajando con ellos,
            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);     //Se hace el copiado de los archivos en la carpeta img
            
            $sentenciaSQL = $conexion->prepare("SELECT imagen FROM productos WHERE id= :id"); //->Selecciona los registros id con el id que se selecciono
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $libro = $sentenciaSQL->fetch(PDO::FETCH_LAZY);             //Se busca la imagen para borrar la imagen antigua

            
            if(isset($producto["imagen"]) && ($producto["imagen"]!= "imagen.jpg")){
                if(file_exists("../../img/".$producto["imagen"])){
                    unlink("../../img/".$producto["imagen"]);              //SE selecciona la imagen a borrar
                }
            }

            $sentenciaSQL = $conexion->prepare("UPDATE productos SET imagen=:imagen WHERE id= :id"); //->Parametros a insertar en la bd 
            $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();                               //Se actualiza la base de datos con una imagen nueva

            $sentenciaSQL = $conexion->prepare("UPDATE productos SET precio=:precio WHERE id= :id"); //->Parametros a insertar en la bd 
            $sentenciaSQL->bindParam(':precio', $txtPrecio);
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();  
        }
        header("Location:productos.php");
    break;

    case "Cancelar":
        header("Location:productos.php");       //La instruccion permite limpiar el buscador
        //echo "Presionado botón cancelar";
    break;
    
    case "Seleccionar":
        $sentenciaSQL = $conexion->prepare("SELECT * FROM productos WHERE id= :id"); //->Selecciona los registros id con el id que se selecciono
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $producto = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtNombre= $producto['nombre'];
        $txtImagen= $producto['imagen'];
        $txtPrecio= $producto['precio'];
        //echo "Presionado botón Seleccionar";
    break;

    case "Borrar":

        $sentenciaSQL = $conexion->prepare("SELECT imagen FROM productos WHERE id= :id"); //->Selecciona los registros id con el id que se selecciono
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $producto = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        
        if(isset($producto["imagen"]) && ($producto["imagen"]!= "imagen.jpg")){
            if(file_exists("../../img/".$producto["imagen"])){
                unlink("../../img/".$producto["imagen"]);            
            }
        }

        $sentenciaSQL = $conexion->prepare("DELETE FROM productos WHERE id= :id"); //->Parametros a insertar en la bd 
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        header("Location: productos.php");
        //echo "Presionado botón Borrar";
    break;    
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM Productos");
$sentenciaSQL->execute();
$listaProductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="col-md-5"> <!--De la pantalla de 12, se elige una fraccion de 5-->

    <div class="card">
        <div class="card-header">
            Datos del Producto
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">      <!--enctype para poder recepcionar archivos-->
                <div class = "form-group">
                    <label for="txtID">Id</label>
                    <input type="text" required readonly class="form-control" value="<?php echo $txtID;?>" name="txtID" id="txtID" placeholder="ID">
                </div>
                <div class="form-group">
                    <label for="txtNombre">Nombre</label>
                    <input type="text" required class="form-control" value="<?php echo $txtNombre;?>" name="txtNombre" id="txtNombre" placeholder="Nombre del Producto">
                </div>
                <div class="form-group">
                    <label for="txtPrecio">Precio</label>
                    <input type="text" required class="form-control" value="<?php echo $txtPrecio;?>" name="txtPrecio" id="txtPrecio" placeholder="Precio del Producto">
                </div>
                <div class="form-group">
                    <label for="txtNombre">Imagen: </label>
                    <br/>
                    <?php   if($txtImagen!=""){     ?>
                            <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen;?>" width="50" alt="" srcset="">
                    <?php    }      ?>
                    <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Imagen">
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



<div class="col-md-7">
    <table class="table table-bordered">        <!--Se le coloca un borde a la tabla de los elementos que se le inserten-->
        <thead>
            <tr> 
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>             <!--Titulos de las columnas-->
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaProductos as $producto) { ?>
                <tr>
                    <td><?php echo $producto['id']; ?></td>                   <!--1eros datos-->
                    <td><?php echo $producto['nombre']; ?></td>


                    <td>
                        <img class="img-thumbnail rounded" src="../../img/<?php echo $producto['imagen']; ?>" width="50" alt="" srcset="">

                    </td>
                    <td><?php echo $producto['precio'];?></td>                    
                    <td>

                        <form method="post">
                            <input type="hidden" name="txtID" id="txtID" value="<?php echo $producto['id']; ?>">
                            
                            <input name="accion" class="btn btn-primary" type="submit" value="Seleccionar">
                            <input name="accion" class="btn btn-danger" type="submit" value="Borrar">
                        </form>

                    </td>

                </tr>
                <?php }?>
        </tbody>
    </table>
</div>

<?php include('../template/pie.php');?>