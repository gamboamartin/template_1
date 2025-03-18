<?php /** @var gamboamartin\system\ $controlador viene de registros del controler/lista */ ?>
<?php use config\views; ?>
<div class="col-md-12">
    <?php if ($controlador->include_breadcrumb !== '') {
        include $controlador->include_breadcrumb;
    } ?>
    <?php include (new views())->ruta_templates . "mensajes.php"; ?>
    <?php include (new views())->ruta_templates . 'listas/content.php'; ?>
</div><!-- /.center-content -->
