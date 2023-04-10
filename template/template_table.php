<div class="table-responsive custom-table-responsive" style="margin-bottom: 100px;">

    <table class="table custom-table">
        <thead>
        <tr>
            <th scope="col">
                <label class="control control--checkbox">
                    <input type="checkbox" class="js-check-all"/>
                    <div class="control__indicator"></div>
                </label>
            </th>

            <?php foreach ($this->datatable['columns'] as $column): ?>
                <th scope="col" style="vertical-align: middle;"><?php print_r($column['titulo']); ?></th>
            <?php endforeach; ?>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($registros['data'] as $registro): ?>
            <tr scope="row">
                <th scope="row">
                    <label class="control control--checkbox">
                        <input type="checkbox"/>
                        <div class="control__indicator"></div>
                    </label>
                </th>
                <?php foreach ($this->datatable['columns'] as $key => $column): ?>
                    <td scope="col"><?php echo $registro[$key]; ?></td>
                <?php endforeach; ?>
                <td align="center">
                    <div class="dropdown">
                        <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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
        </tbody>
    </table>
</div>