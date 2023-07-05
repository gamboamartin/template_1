<?php use config\views;
use gamboamartin\system\links_menu; ?>
<section class="top-title">

    <ul class="breadcrumb">
        <?php include (new views())->ruta_templates."breadcrumb/adm_session/inicio.php"; ?>
        <?php include (new views())->ruta_templates."breadcrumb/alta.php"; ?>
        <?php include (new views())->ruta_templates."breadcrumb/lista.php"; ?>
        <li class="item"><a role="button" class="btn btn-danger item-br" href="<?php echo (new links_menu(link: $controlador->link,registro_id: $controlador->registro_id))->links->adm_session->logout ;?>"> Salir </a></li>
    </ul>
    <h1 class="h-side-title page-title page-title-big text-color-primary">TIPO PERSONA</h1>
</section> <!-- /. content-header -->
