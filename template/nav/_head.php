<?php
/** @var stdClass $data Obtenido de index de la funcion data para la definicion del men  */
use config\views;

$path_base_template = (new views())->ruta_templates;
?>
<div class="top-box" data-toggle="sticky-onscroll">
    <div class="container">

        <?php include $path_base_template.'nav/_redes_sociales.php' ?>

        <section class="header-inner">
            <div class="container">
                <?php if($data->menu){ ?>
                <?php include $path_base_template.'nav/menu.php' ?>
                <?php } ?>
            </div>
        </section><!-- /.menu-->
    </div>
</div>
<div class="top-box-mask"></div>
