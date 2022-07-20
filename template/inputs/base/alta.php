<?php /** @var base\controller\controlador_base $controlador  viene de registros del controler/lista */ ?>
<?php use config\views; ?>
<?php echo $controlador->forms_inputs_alta; ?>
<?php include (new views())->ruta_templates.'botons/submit/alta_bd_otro.php';?>
