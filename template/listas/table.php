<?php use config\views; ?>
<?php /** @var base\controller\ $controlador  viene de registros del controler/lista */ ?>
<table class="datatable table table-striped" >
    <thead>
    <tr>
        <?php foreach ($controlador->datatable["titulos"] as $item) : ?>
            <th> <?php echo $item; ?> </th>
        <?php endforeach;?>
    </tr>
    </thead>
    <tbody></tbody>
</table>