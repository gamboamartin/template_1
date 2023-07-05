<?php use config\views;
use gamboamartin\system\links_menu; ?>
<ul class="breadcrumb">
    <?php include (new views())->ruta_templates."breadcrumb/adm_session/inicio.php"; ?>
    <?php include (new views())->ruta_templates."breadcrumb/alta.php"; ?>
    <li class="item"><a role="button" class="btn btn-warning item-br" href="<?php  echo $controlador->link_lista; ?>"> Lista </a></li>

</ul>
