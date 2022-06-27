<?php use config\views; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="top-title">
                <ul class="breadcrumb">
                    <?php include (new views())->ruta_templates."breadcrumb/adm_session/inicio.php"; ?>
                    <li class="item"> Login</li>
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