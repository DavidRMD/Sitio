<?php include("template/cabecera.php"); ?>
<?php include("administrador/config/bd.php");?>

<?php 
    if(isset($_POST['enviar'])){
        $email      = $_POST["txtemail"];
        $tel        = $_POST["txttel"];
        $contacto   = $_POST["txtcontacto"];
        $texto      = $_POST["txttexto"];

        $sql = "INSERT INTO comentarios VALUES('$email',
                                        '$tel',
                                        '$contacto',
                                        '$texto')";
        $ejecutar =mysqli_query($conect, $sql);
        if(!$ejecutar){
            echo  "Hubo un error";
        }
        else{
            echo '<br><h3 style="text-align:center; border: 5px solid red;">Se han guardado los datos correctamente</h3>';
        }
    }
?>

<main>
    <div class="container">
        <br>
        <div class="row">
            <div class="jumbotron text-center">
                <br><hr><hr><h1>¿Tienes Dudas o comentarios?</h1><br>
                <img width="400" src="img/dudas.jpg" class="img-tumbnail rounded mx-auto d-block" alt="Dudas o Comentarios" >
                <h3>Ponte en Contacto con nosotros y te contestaremos</h3><br><br>
                <section class="formulario">
                    <form style="text-align: left;" class="formulario" id="formulario" name="formulario" method="post">
                        <ul>
                            <li>
                                <label for="correoelectronico"> Correo Electronico</label>
                                <input type="email" name="txtemail" id="correoelectronico" class="input-padron" required placeholder="email@dominio.com">
                            </li><br>
                            <li>
                                <label for="telefono">Teléfono</label>
                                <input type="tel" name="txttel" id="telefono" class="input-padron" required placeholder="(XX) XXXX XXXX">
                            </li><br>
                            <li>
                                <fieldset >
                                    <legend>¿Cómo le gustaria que lo contactemos?</legend>
                                    <label for="radio-email"><input type="radio" name="txtcontacto" value="email" id="radio-email"> Email   </label>
                                    <label for="radio-telefono"><input type="radio" name="txtcontacto" value="telefono" id="radio-telefono"> Teléfono   </label>
                                    <label for="radio-whatsapp"><input type="radio" name="txtcontacto" value="WhatsApp" id="radio-whatsapp" checked> WhatsApp   </label>
                                </fieldset>
                            </li><br>
                            <li>
                                <label for="cajatexto">Notas o Comentarios</label><br>
                                <textarea cols="70" rows="10" name="txttexto" id="cajatexto" class="input-padron"></textarea>
                            </li>
                        </ul>
                        <input type="submit" name="enviar" value="Enviar Formulario" class="btn btn-success" onclick="return ConfirmDelete()">
                    </form>
                </section>
            </div>
        </div>
    </div>

<?php include("template/pie.php"); ?>