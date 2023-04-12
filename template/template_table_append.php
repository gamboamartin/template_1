<?php foreach ($registros['data'] as $registro): ?>
    <tr scope="row">
        <?php if ($this->datatable['multi_selects']): ?>
            <th scope="row">
                <label class="control control--checkbox">
                    <input type="checkbox"/>
                    <div class="control__indicator"></div>
                </label>
            </th>
        <?php endif; ?>
        <?php foreach ($this->datatable['columns'] as $key => $column): ?>
            <td scope="col"><?php echo $registro[$key]; ?></td>
        <?php endforeach; ?>
        <td align="center">
            <div class="dropdown">
                <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                </a>
                <div class="dropdown-menu pull-right" aria-labelledby="dropdownMenuButton">
                    <?php foreach ($registros['acciones'] as $accion): ?>
                        <a class="dropdown-item"
                           href="./index.php?seccion=<?php echo $accion['adm_seccion_descripcion']; ?>&accion=<?php echo $accion['adm_accion_descripcion']; ?>&registro_id=<?php echo $registro[$this->tabla."_id"]; ?>&session_id=<?php echo $this->session_id; ?>"><?php echo $accion['adm_accion_titulo']; ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </td>
    </tr>
    <tr class="spacer">
        <td colspan="100"></td>
    </tr>
<?php endforeach; ?>