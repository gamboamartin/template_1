<div class="table-responsive custom-table-responsive" style="margin-bottom: 100px;">

    <div class="table-details" style="display: flex; justify-content: space-between;align-items: center;">
        <div>Mostrando 1 - <?php echo $registros['ultimo_registro']; ?> de <?php echo $registros['total_registros']; ?> registros</div>
        <div class="fg-line" style="position: relative;">
            <i class="bi bi-search" style="position: absolute;
top: 10px;
left: 12px;"></i>
            <input type="search" placeholder="Buscar registro..." id="search" name="search" value="" style="background: #FFFFFF;border: 1px solid #DBDFEA;
    box-sizing: border-box;
    box-shadow: 0 0.5px 2px rgba(15, 30, 81, 0.11);
    border-radius: 4px;
    margin: 0;
    padding: 8px 0 8px 30px;
    min-width: 300px;">
        </div>
    </div>

    <table class="table custom-table caption-top">
        <thead>
        <tr>
            <?php if ($this->datatable['multi_selects']): ?>
                <th scope="col">
                    <label class="control control--checkbox">
                        <input type="checkbox" class="js-check-all"/>
                        <div class="control__indicator"></div>
                    </label>
                </th>
            <?php endif; ?>

            <?php foreach ($this->datatable['columns'] as $column): ?>
                <th scope="col" style="vertical-align: middle;"><?php print_r($column['titulo']); ?></th>
            <?php endforeach; ?>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

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
                        <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink4"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu pull-right" aria-labelledby="dropdownMenuButton">
                            <?php foreach ($registros['acciones'] as $accion): ?>
                                <a class="dropdown-item"
                                   href="./index.php?seccion=<?php echo $accion['adm_seccion_descripcion']; ?>&accion=<?php echo $accion['adm_accion_descripcion']; ?>&registro_id=<?php echo $registro[$this->tabla . "_id"]; ?>&session_id=<?php echo $this->session_id; ?>"><?php echo $accion['adm_accion_titulo']; ?></a>
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