<?php use config\views;
use gamboamartin\system\links_menu; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="top-title">
                <ul class="breadcrumb">
                    <?php include (new views())->ruta_templates."breadcrumb/adm_session/inicio.php"; ?>
                    <li class="item"><a role="button" class="btn btn-danger item-br" href="<?php echo (new links_menu(link: $controlador->link,registro_id: $controlador->registro_id))->links->adm_session->logout ;?>"> Salir </a></li>
                </ul>
                <h1 class="h-side-title page-title page-title-big text-color-primary">Denegado</h1>
            </div> <!-- /. content-header -->
            <!-- /. widget-AVAILABLE PACKAGES -->
            <div class="row-cols-12">
                <div class="alert alert-danger" role="alert">
                    <strong>Oh error!</strong> Acceso denegado.
                </div>
            </div>
        </div><!-- /.center-content -->
    </div>
</div>