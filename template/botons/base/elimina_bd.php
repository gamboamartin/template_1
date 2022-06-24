<?php /** @var stdClass $row  Registro */ ?>
<a href="<?php echo $row->link_elimina_bd; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">
    <i class="icon-remove"></i> Elimina
</a>