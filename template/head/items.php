<?php use config\views;
use gamboamartin\system\links_menu; ?>
<ul class="breadcrumb">
    <?php include (new views())->ruta_templates."breadcrumb/adm_session/inicio.php"; ?>
    <?php include (new views())->ruta_templates."breadcrumb/alta.php"; ?>
    <li class="item"><a role="button" class="btn btn-warning item-br" href="<?php  echo $controlador->link_lista; ?>"> Lista </a></li>
    <li class="item"><a role="button" class="btn btn-warning item-br descarga_excel" href="<?php  echo $controlador->link_descarga_excel; ?>"> Descarga Excel </a></li>

</ul>
