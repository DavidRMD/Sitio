<?php include("template/cabecera.php"); ?>
<?php include("administrador/config/bd.php");?>
<?php 
/*
$txtnombre     = (isset($_POST['txtnombre']))?$_POST['txtnombre']:"";
$txtemail      = (isset($_POST['txtemail']))?$_POST['txtemail']:"";
$txttel        = (isset($_POST['txttel']))?$_POST['txttel']:"";
$txtdia        = (isset($_POST['txtdia']))?$_POST['txtdia']:"";
$txthora       = (isset($_POST['txthora']))?$_POST['txthora']:"";
$txtcontacto   = (isset($_POST['txtcontacto']))?$_POST['txtcontacto']:"";
$txtopcion     = (isset($_POST['txtopcion']))?$_POST['txtopcion']:"";
$txttexto      = (isset($_POST['txttexto']))?$_POST['txttexto']:"";
//$txtnovedades  = (isset($_POST['txtnovedades']))?$_POST['txtnovedades']:"";
$accion        = (isset($_POST['accion']))?$_POST['accion']:"";

    switch($accion){
        case "enviar":
            //INSERT INTO `libros` (`id`, `nombre`, `imagen`) VALUES (NULL, 'Libro de php', 'imagen.jpg');
            $sentenciaSQL = $conexion->prepare("INSERT INTO apartado (nombre, email, tel, dia, hora, contacto, opcion, texto) VALUES (:nombre, :email, :tel, :dia, :hora, :contacto, :opcion, :texto);"); //->Parametros a insertar en la bd 
            $sentenciaSQL->bindParam(':nombre',$txtnombre);
            $sentenciaSQL->bindParam(':email',$txtemail);     //Se escribe en la base de datos con la inf. proporcionada por el usuario
            $sentenciaSQL->bindParam(':tel',$txttel);
            $sentenciaSQL->bindParam(':dia',$txtdia);
            $sentenciaSQL->bindParam(':hora',$txthora);
            $sentenciaSQL->bindParam(':contacto',$txtcontacto);
            $sentenciaSQL->bindParam(':opcion',$txtopcion);
            $sentenciaSQL->bindParam(':texto',$txttexto);

            $sentenciaSQL->execute();
            header("Location:apartado.php");
            echo "Presionado botón enviar";
        break;
    }*/
    if(isset($_POST['enviar'])){
        $nombre     = $_POST["txtnombre"];
        $email      = $_POST["txtemail"];
        $tel        = $_POST["txttel"];
        $dia        = $_POST["txtdia"];
        $hora       = $_POST["txthora"];
        $contacto   = $_POST["txtcontacto"];
        $opcion     = $_POST["txtopcion"];
        $texto      = $_POST["txttexto"];

        $sql = "INSERT INTO apartado VALUES('$nombre',
                                        '$email',
                                        '$tel',
                                        '$dia',
                                        '$hora',
                                        '$contacto',
                                        '$opcion',
                                        '$texto')";
        $ejecutar =mysqli_query($conect, $sql);
        if(!$ejecutar){
            //echo  "Hubo un error";
        }
        else{
            echo '<br><h3 style="text-align:center; border: 5px solid red;">Se han guardado los datos correctamente</h3>';
        }
    }

?>

<main>
    <section class="datos">
        <div class="container">
            <br>
            <div class="row">
                <div class="jumbotron text-center">

                    <br><hr><hr><h1>Sistema de apartado para Espacios de Trabajo</h1><hr><hr><br>
                    <h3>Llena el siguiente formulario con tus datos correctamente.</h3><br><br>
                </div>
            </div>
        </div>

        <div class="container">
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <h3 style="text-align: center">Formulario</h3><br>
                        <div class="card-body">
                            <form class="formulario" id="formulario" name="formulario" method="post" >
                                <ul style="text-align:left">
                                    <li>
                                        <label for="nombreapellido">Nombre y Apellido</label>
                                        <input type="text" name="txtnombre" id="nombreapellido" class="input-padron" required>    
                                    </li><br>
                                    <li>
                                        <label for="correoelectronico"> Correo Electronico</label>
                                        <input type="email" name="txtemail" id="correoelectronico" class="input-padron" required placeholder="email@dominio.com">
                                    </li><br>
                                    <li>
                                        <label for="telefono">Teléfono</label>
                                        <input type="tel" name="txttel" id="telefono" class="input-padron" required placeholder="(XX) XXXX XXXX">
                                    </li><br>
                                    <li>
                                        <label for="diaapartar">¿Que dia quiere apartar?</label>
                                        <input type="date" name="txtdia" id="diaapartar" class="input-padron" required>    
                                    </li><br>
                                    <li>
                                        <label for="diaapartar">¿En que horario?</label>
                                        <input type="time" name="txthora" id="diaapartar" class="input-padron" required>    
                                    </li>
                                    </li><br>
                                    <li>
                                        <fieldset >
                                            <legend>¿Cómo le gustaria que lo contactemos para confirmar?</legend>
                                            <label for="radio-email"><input type="radio"    name="txtcontacto" value="email" id="radio-email"> Email   </label>
                                            <label for="radio-telefono"><input type="radio" name="txtcontacto" value="telefono" id="radio-telefono"> Teléfono   </label>
                                            <label for="radio-whatsapp"><input type="radio" name="txtcontacto" value="WhatsApp" id="radio-whatsapp" checked> WhatsApp   </label>
                                        </fieldset>
                                    </li><br>
                                    <li>
                                    <fieldset>
                                        <legend>¿Que espacio quiere apartar?</legend>
                                        <select name="txtopcion" >
                                            <option>Espacio 1 - GrupoE</option>
                                            <option>Espacio 2 - GrupoG</option>
                                            <option>Espacio 3 - GrupoM</option>
                                        </select>
                                    </fieldset>
                                    </li><br>
                                    <li>
                                        <label for="cajatexto">Notas o Comentarios</label><br>
                                        <textarea cols="40" rows="5" name="txttexto" id="cajatexto" class="input-padron"></textarea>
                                    </li>
                                </ul>
                                <label class="checkbox"><input type="checkbox" name="novedades" checked>¿Le gustaria recibir novedades de TESIP?</label><br><br>
                                <input type="submit" name="enviar" value="Enviar Formulario" class="btn btn-success" onclick="return ConfirmDelete()">
                            </form>
                        </div>                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 style="text-align: center">Espacio1 - GrupoE</h3>
                            <img width="300" class="img-tumbnail rounded mx-auto d-block" src="./img/espacio1.jpg" alt="Espacio1">
                            <h3 style="text-align: center">Espacio2 - GrupoG</h3><br>
                            <img width="300"class="img-tumbnail rounded mx-auto d-block" src="./img/espacio2.jpg" alt="Espacio2"><br>
                            <h3 style="text-align: center">Espacio3 - GrupoM</h3>
                            <img width="300"class="img-tumbnail rounded mx-auto d-block" src="./img/espacio3.jpg" alt="Espacio3">
                        </div>
                    </div> 
                </div>
            </div>
        </div>          
    </section>
</main>



<?php include("template/pie.php"); ?>
