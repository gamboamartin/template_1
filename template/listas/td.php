<?php /** @var stdClass $row  viene de registros del controler*/ ?>
<?php /** @var stdClass $campo  es el valor a mostrar en el td de la tabla */ ?>
<?php $name_campo = $campo->campo; ?>
<td><?php echo $row->$name_campo; ?></td>
