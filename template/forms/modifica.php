<?php use config\views; ?>
<?php /** @var base\controller\controlador_base $controlador */ ?>
<div class="widget  widget-box box-container form-main widget-form-cart" id="form">
    <div class="widget-header">
        <h2>Modifica</h2>
    </div>
    <?php include (new views())->ruta_templates."mensajes.php"; ?>
    <form method="post" action="<?php echo$controlador->link_modifica_bd; ?>" class="form-additional" enctype="multipart/form-data">
        <?php include $controlador->include_inputs_modifica; ?>
    </form>
</div>