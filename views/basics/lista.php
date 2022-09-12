<?php /** @var gamboamartin\system\ $controlador  viene de registros del controler/lista */ ?>
<?php use config\views; ?>
<main class="main section-color-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if($controlador->include_breadcrumb!==''){
                    include $controlador->include_breadcrumb;
                } ?>
                <?php include (new views())->ruta_templates."mensajes.php"; ?>
                <?php include (new views())->ruta_templates.'listas/content.php';?>
            </div><!-- /.center-content -->
        </div>
    </div>
</main>
