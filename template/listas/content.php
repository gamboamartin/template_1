<?php use config\views; ?>
<div class="widget widget-box box-container widget-mylistings">
    <?php include (new views())->ruta_templates.'etiquetas/_titulo_lista.php';?>
    <div class="">
        <?php include (new views())->ruta_templates.'listas/table.php';?>
        <?php include (new views())->ruta_templates.'etiquetas/_footer_lista.php';?>
    </div>
</div> <!-- /. widget-table-->
