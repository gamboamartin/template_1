<?php use config\views; ?>
<?php /** @var base\controller\ $controlador  controlador en ejecucion */ ?>
<tr>
    <?php foreach ($controlador->keys_row_lista as $campo){ ?>
    <?php include (new views())->ruta_templates.'listas/td.php';?>
    <?php } ?>
    <!-- End dynamic generated -->

    <?php include (new views())->ruta_templates.'listas/action_row.php';?>
</tr>
