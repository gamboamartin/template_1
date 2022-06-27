<?php /** @var base\controller\ $controlador  viene de registros del controler/lista */ ?>
<tbody>
<?php foreach ($controlador->registros as $row){?>
    <?php include $controlador->include_lista_row;?>
<?php } ?>
</tbody>