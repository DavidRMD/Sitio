<?php include("template/cabecera.php"); ?>
    

<main>
    <section class="datos">
        <div class="container">
            <br>
            <div class="row">
                <div class="jumbotron text-center">
                    <form>
                        <label for="nombreapellido">Nombre y Apellido</label>
                        <input type="text" id="nombreapellido" class="input-padron" required>       <!--EL ATRIBUTO REQUIRED, OBLIGA A QUE EL USUARIO TENGA QUE LLENAE ESE CUADRO-->
                        <label for="correoelectronico"> Correo Electronico</label>
                        <input type="email" id="correoelectronico" class="input-padron" required placeholder="email@dominio.com">   <!--EL ATRIBUTO PLACEHOLDER, MUESTRA EN EL CUADRO LA INFORMACIÓN DESPLEGADA DENTRO DE LAS COMILLAS-->

                        <label for="telefono">Teléfono</label>
                        <input type="tel" id="telefono" class="input-padron" required placeholder="(XX) XXXX XXXX">

                        <label for="cajatexto">Comentarios</label>
                        <textarea cols="70" rows="10" id="cajatexto" class="input-padron"></textarea>

                        <fieldset >
                            <legend>¿Cómo le gustaria que lo contactemos?</legend>
                            <label for="radio-email"><input type="radio" name="contacto" value="email" id="radio-email">Email</label>
                            
                            <label for="radio-telefono"><input type="radio" name="contacto" value="telefono" id="radio-telefono">Teléfono</label>
                            
                            <label for="radio-whatsapp"><input type="radio" name="contacto" value="WhatsApp" id="radio-whatsapp" checked>WhatsApp</label>   <!--CON EL ATRIBUTO CHECKED PODEMOS HACER QUE LA OPCION YA ESTE SELECIONADA POR DEFECTO-->
                            
                        </fieldset>
                        
                        <fieldset>
                            <legend>¿En cual horario prefiere ser atendido?</legend>
                            <select>
                                <option>Mañana</option>
                                <option>Tarde</option>
                                <option>Noche</option>
                            </select>
                        </fieldset>

                        <label class="checkbox"><input type="checkbox" checked>¿Le gustaria recibir novedades de la Barbería Alura?</label>
                        <input type="submit" value="Enviar Formulario" class="enviar">

                    </form>

                    <table>
                        <thead>
                            <tr>
                                <th>Día</th>
                                <th>Horario</th>
                            </tr>
                        </thead>

                    <tbody>
                        <tr>
                            <td>Lunes</td>
                            <td>08h ~ 20h</td>
                        </tr>
                        <tr>
                            <td>Miercoles</td>
                            <td>08h ~ 20h</td>
                        </tr>
                        <tr>
                            <td>Viernes</td>
                            <td>08h ~ 20h</td>
                        </tr>
                    </tbody>        
                </table>

            </div>
        </div>
    </div>
</section>

</main>


<?php include("template/pie.php"); ?>