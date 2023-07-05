<?php /** @var stdClass $links_menu viene de links_menu  */

use gamboamartin\system\links_menu; ?>
<li class="item"><a  role="button" class="btn btn-info item-br" href="<?php echo $links_menu->adm_session->inicio ?>"> Inicio </a></li>
<li class="item"><a role="button" class="btn btn-danger item-br" href="<?php echo (new links_menu(link: $controlador->link,registro_id: $controlador->registro_id))->links->adm_session->logout ;?>"> Salir </a></li>