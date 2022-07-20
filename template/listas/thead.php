<?php use config\views; ?>
<?php /** @var base\controller\ $controlador  controlador en ejecucion */ ?>
<thead>
<tr>
    <?php foreach ($controlador->keys_row_lista as $campo){ ?>
        <?php include (new views())->ruta_templates.'listas/th.php';?>
    <?php } ?>
    <th data-breakpoints="xs md" class="control"  data-type="html">Modifica</th>
    <th data-breakpoints="xs md" class="control"  data-type="html">Elimina</th>
</tr>
</thead>

