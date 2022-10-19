<?php use config\views; ?>
<div class="widget widget-box box-container widget-mylistings">
    <?php include (new views())->ruta_templates.'etiquetas/_titulo_lista.php';?>
    <div class="table-responsive">
        <?php include (new views())->ruta_templates.'listas/table.php';?>
    </div>
</div> <!-- /. widget-table-->
