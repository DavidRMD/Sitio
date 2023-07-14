<?php
    include("administrador/config/bd.php");

    $sentenciaSQL = $conexion->prepare("SELECT * FROM libros");
    $sentenciaSQL->execute();
    $listaLibros = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

    include("template/cabecera.php");
?>

    <main>
        <?php //foreach($listaLibros as $libro){  ?>
        <h4 class="card-title">     <?php echo $listaLibros['nombre'];?>   </h4>
        <?php //}?>

    </main>

<?php include("template/pie.php");?>