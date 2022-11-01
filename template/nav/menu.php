<?php
/** @var stdClass $links_menu viene de links  */
/** @var base\controller\controler $controlador viene de links  */
use config\views;
use gamboamartin\template_1\nav;

?>
<div class="pull-left menu">
    <?php include (new views())->ruta_templates.'nav/_menu_responsive.php'?>

    <nav class="navbar text-color-primary">
        <?php include (new views())->ruta_templates.'nav/_sombra_menu.php'?>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="main-menu">
            <ul class="nav navbar-nav clearfix">
                <?php echo (new nav())->lis_menu_principal(links: $links_menu, secciones: $controlador->secciones_permitidas); ?>
            </ul>
        </div>
    </nav>

</div>
