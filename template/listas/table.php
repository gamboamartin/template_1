<?php use config\views; ?>
<?php /** @var base\controller\ $controlador  viene de registros del controler/lista */ ?>
<table class="table table-striped footable-sort" data-sorting="true">
    <?php include $controlador->include_lista_thead;?>
    <?php include (new views())->ruta_templates.'listas/rows.php';?>
</table>
