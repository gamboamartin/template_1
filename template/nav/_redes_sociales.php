<?php
/** @var base\controller\controlador_base $controlador viene de links  */

use gamboamartin\system\links_menu;

?>
<div  class="top-bar color-primary">
<div class="container clearfix">
    <div class="pull-right" style="display: flex; width: 100%">
        <ul class="social-nav clearfix">
            <?php echo $controlador->menu_header; ?>
        </ul>
    </div>
    <?php
    if(isset($_SESSION['activa']) && (int)$_SESSION['activa'] === 1){ ?>
        <div class="pull-right col-md-12" style="text-align: right;">
            <a role="button" class="btn btn-danger cerrar-session" href="<?php echo (new links_menu(link: $controlador->link,registro_id: $controlador->registro_id))->links->adm_session->logout ;?>"> Salir </a>
        </div>
    <?php }
    ?>
</div>
</div>