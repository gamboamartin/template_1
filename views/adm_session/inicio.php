<?php /** @var gamboamartin\controllers\ $controlador */

use config\views;
use gamboamartin\system\links_menu; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="top-title">
                <ul class="breadcrumb">
                    <?php include (new views())->ruta_templates."breadcrumb/adm_session/inicio.php"; ?>

                </ul>
                <h1 class="h-side-title page-title page-title-big text-color-primary">
                    Bienvenido a <?php echo (new views())->titulo_sistema ;?>
                </h1>
            </div> <!-- /. content-header -->
            <!-- /. widget-AVAILABLE PACKAGES -->
        </div><!-- /.center-content -->
    </div>
</div>
