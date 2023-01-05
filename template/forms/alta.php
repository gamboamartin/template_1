<?php use config\views; ?>
<?php /** @var base\controller\controlador_base $controlador */ ?>
<div class="widget  widget-box box-container form-main widget-form-cart" id="form">

    <?php include (new views())->ruta_templates."head/subtitulo.php"; ?>
    <?php include (new views())->ruta_templates."mensajes.php"; ?>

    <form method="post" action="<?php echo $controlador->link_alta_bd; ?>" class="form-additional" enctype="multipart/form-data">
        <?php include $controlador->include_inputs_alta; ?>
    </form>
</div>
