<?php /** @var controllers\controlador_adm_session $controlador */

use gamboamartin\system\links_menu; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="top-title">
                <ul class="breadcrumb">
                    <li class="item"> Inicio </a></li>
                    <li class="item"><a href="<?php echo (new links_menu($controlador->registro_id))->links->adm_session->logout ;?>"> Salir </a></li>
                    <li class="item"> Bienvenido</li>
                </ul>
                <h1 class="h-side-title page-title page-title-big text-color-primary">Bienvenido a Catalogos SAT</h1>
            </div> <!-- /. content-header -->
            <!-- /. widget-AVAILABLE PACKAGES -->
        </div><!-- /.center-content -->
    </div>
</div>
