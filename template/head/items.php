<?php use config\views;
/**
 * @var base\controller\controlador_base $controlador
 */
use gamboamartin\system\links_menu; ?>
<ul class="breadcrumb">
    <?php include (new views())->ruta_templates."breadcrumb/adm_session/inicio.php"; ?>
    <?php
    foreach ($controlador->acciones_visibles_permitidas as $accion_visible) {
        echo '<li class="item">'.$accion_visible->boton."</li>";
    }
    ?>
</ul>
