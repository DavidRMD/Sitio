<?php error_reporting(E_ALL & ~E_WARNING);?>
<?php include('../template/cabecera.php');?>
<?php
$nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";     //si existe algo en(2do)txtID entonces txtId(1ero) va a ser igual al valor enviado, al txtId(3ro), de lo contrario quedara vacio (comillas)
$email = (isset($_POST['email']))?$_POST['email']:"";     //si existe algo en(2do)txtID entonces txtId(1ero) va a ser igual al valor enviado, al txtId(3ro), de lo contrario quedara vacio (comillas)
$tel = (isset($_POST['tel']))?$_POST['tel']:"";     //si existe algo en(2do)txtID entonces txtId(1ero) va a ser igual al valor enviado, al txtId(3ro), de lo contrario quedara vacio (comillas)
$dia = (isset($_POST['dia']))?$_POST['dia']:"";     //si existe algo en(2do)txtID entonces txtId(1ero) va a ser igual al valor enviado, al txtId(3ro), de lo contrario quedara vacio (comillas)
$hora = (isset($_POST['hora']))?$_POST['hora']:"";     //si existe algo en(2do)txtID entonces txtId(1ero) va a ser igual al valor enviado, al txtId(3ro), de lo contrario quedara vacio (comillas)
$contacto = (isset($_POST['contacto']))?$_POST['contacto']:"";     //si existe algo en(2do)txtID entonces txtId(1ero) va a ser igual al valor enviado, al txtId(3ro), de lo contrario quedara vacio (comillas)
$opcion = (isset($_POST['opcion']))?$_POST['opcion']:"";     //si existe algo en(2do)txtID entonces txtId(1ero) va a ser igual al valor enviado, al txtId(3ro), de lo contrario quedara vacio (comillas)
$texto = (isset($_POST['text']))?$_POST['texto']:"";     //si existe algo en(2do)txtID entonces txtId(1ero) va a ser igual al valor enviado, al txtId(3ro), de lo contrario quedara vacio (comillas)
$accion         = (isset($_POST['accion']))?$_POST['accion']:"";

include('../config/bd.php');
switch($accion){
    case "Cancelar":
        header("Location:clientes.php");       //La instruccion permite limpiar el buscador
        //echo "Presionado botón cancelar";
    break;
    case "Seleccionar":
        $sentenciaSQL = $conexion->prepare("SELECT * FROM apartado WHERE nombre= :nombre"); //->Selecciona los registros id con el id que se selecciono
        $sentenciaSQL->bindParam(':nombre',$nombre);
        $sentenciaSQL->execute();
        $persona = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $nombre     = $persona['nombre'];
        $email      = $persona['email'];
        $tel        = $persona['tel'];
        $dia        = $persona['dia'];
        $hora       = $persona['hora'];
        $contacto   = $persona['contacto'];
        $opcion     = $persona['opcion'];
        $texto      = $persona['text'];

        echo '<br><h3 style="text-align:center; border: 5px solid red;">Se ha leido exitosamente</h3>';        
    break;

    case "Enter":
        $sentenciaSQL = $conexion->prepare("SELECT * FROM comentarios WHERE email= :email"); //->Selecciona los registros id con el id que se selecciono
        $sentenciaSQL->bindParam(':email',$email);
        $sentenciaSQL->execute();
        $persona = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $email      = $persona['email'];
        $tel        = $persona['tel'];
        $contacto   = $persona['contacto'];
        $texto      = $persona['text'];

        echo '<br><h3 style="text-align:center; border: 5px solid red;">Se ha leido exitosamente</h3>';        
    break;
    case "Borrar":
        $sentenciaSQL = $conexion->prepare("SELECT nombre FROM apartado WHERE nombre= :nombre"); //->Selecciona los registros id con el id que se selecciono
        $sentenciaSQL->bindParam(':nombre',$nombre);
        $sentenciaSQL->execute();
        $persona = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $sentenciaSQL = $conexion->prepare("DELETE FROM apartado WHERE nombre= :nombre"); //->Parametros a insertar en la bd 
        $sentenciaSQL->bindParam(':nombre',$nombre);
        $sentenciaSQL->execute();
        header("Location: clientes.php");
        //echo "Presionado botón Borrar";
    break;
    case "Eliminar Comentario":
        $sentenciaSQL = $conexion->prepare("SELECT email FROM comentarios WHERE email= :email"); //->Selecciona los registros id con el id que se selecciono
        $sentenciaSQL->bindParam(':email',$email);
        $sentenciaSQL->execute();
        $persona = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $sentenciaSQL = $conexion->prepare("DELETE FROM comentarios WHERE email= :email"); //->Parametros a insertar en la bd 
        $sentenciaSQL->bindParam(':email',$email);
        $sentenciaSQL->execute();
        header("Location: clientes.php");
        //echo "Presionado botón Borrar";
    break;
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM apartado");
$sentenciaSQL->execute();
$listaApartado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

$sql = $conexion->prepare("SELECT * FROM comentarios");
$sql->execute();
$listaComentario = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<section class="reservacions"> 
    <h2 style="text-align:center" ><strong>Revisiones pendientes por revisar</strong></h2>
    <div class="col-md-10">
        <table class="table table-bordered">        <!--Se le coloca un borde a la tabla de los elementos que se le inserten-->
            <thead>
                <tr style="text-align: center;"> 
                    <th>Nombre</th>
                    <th>Email</th>             <!--Titulos de las columnas-->
                    <th>Teléfono</th>
                    <th>Dia seleccionado</th>
                    <th>Horario</th>
                    <th>Contacto</th>
                    <th>Tipo de espacio</th>
                    <th>Comentarios</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listaApartado as $persona) { ?>
                    <tr>
                        <td><?php echo $persona['nombre']; ?></td>                   <!--1eros datos-->
                        <td><?php echo $persona['email']; ?></td>
                        <td><?php echo $persona['tel']; ?></td>
                        <td><?php echo $persona['dia']; ?></td>
                        <td><?php echo $persona['hora']; ?></td>
                        <td><?php echo $persona['contacto']; ?></td>
                        <td><?php echo $persona['opcion']; ?></td>
                        <td><?php echo $persona['texto']; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="nombre" id="nombre" value="<?php echo $persona['nombre']; ?>">
                                <!--<button name="accion" class="btn btn-danger" type="submit" value="Borrar">Borrar</button> -->
                                <input name="accion" class="btn btn-primary" type="submit" value="Seleccionar">
                                <input  name="accion" class="btn btn-danger" type="submit" value="Borrar">
                            </form>
                        </td>
                    </tr>
                    <?php }?>
            </tbody>
        </table>
    </div>
    <br><br><hr><hr><br><br>
</section>
    
<section class="comentarios">
    <h2 style="text-align:center" ><strong>Comentarios de Clientes por revisar</strong></h2>
    <p style="text-align: center" ><small>El cliente siempre tiene la razon</small></p>
    <div class="col-md-10">
        <table class="table table-bordered">        <!--Se le coloca un borde a la tabla de los elementos que se le inserten-->
            <thead>
                <tr style="text-align: center;" > 
                    <th>Email</th>             <!--Titulos de las columnas-->
                    <th>Teléfono</th>
                    <th>Contacto</th>
                    <th>Comentarios</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listaComentario as $persona) { ?>
                    <tr>
                        <td><?php echo $persona['email']; ?></td>
                        <td><?php echo $persona['tel']; ?></td>
                        <td><?php echo $persona['contacto']; ?></td>
                        <td><?php echo $persona['texto']; ?></td>                    
                        <td>
                            <form method="post">
                                <input type="hidden" name="email" id="email" value="<?php echo $persona['email']; ?>">
                                <input  name="accion" class="btn btn-danger" type="submit" value="Eliminar Comentario">
                                <input name="accion" class="btn btn-primary" type="submit" value="Enter">
                            </form>
                        </td>
                    </tr>
                    <?php }?>
            </tbody>
        </table>
    </div>
</section>

<?php include('../template/pie.php');?>
