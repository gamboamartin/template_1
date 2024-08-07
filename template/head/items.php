<?php use config\views;
/**
 * @var base\controller\controlador_base $controlador
 */
?>
<ul class="breadcrumb">
    <?php
    foreach ($controlador->acciones_visibles_permitidas as $accion_visible) {
        echo '<li class="item">'.$accion_visible->boton."</li>";
    }
    ?>
</ul>
