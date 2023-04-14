<?php if ($this->datatable['type'] === "scroll") : ?>
    <div id="load-table" class="load-table col-md-12" style="display: flex; justify-content: center;">
        <div class="content " style="display: flex;flex-direction: column;width: 100%; background: #FFFFFF;
        box-shadow: 0 3px 6px rgba(23, 43, 77, 0.08), 0 1px 1px rgba(23, 43, 77, 0.11);border-radius: 3px;
        margin-top: 35px;margin-bottom: 100px;">
            <h3 style="font-size: 20px;font-style: normal; font-weight: bold; line-height: 24px; padding: 10px; color: #304463;">
                Hola: <?php echo $this->datos_session_usuario['adm_usuario_user']; ?>
            </h3>
            <div id="load" class="container" style="width: 100%; border-top: 2px solid #eaeaea; padding: 10px;">
                <div id="table-load" class="table-responsive custom-table-responsive" style="display: flex;flex-direction: column;">
                    <div class="table-details"
                         style="display: flex; justify-content: space-between;align-items: center;">
                        <div>
                            Mostrando <span id="inicio-registros">0</span> - <span id="fin-registros">0</span> de <span id="total-registros">0</span> registros
                        </div>
                        <div class="fg-line" style="position: relative;">
                            <i class="bi bi-search" style="position: absolute;
top: 10px;
left: 12px;"></i>
                            <input type="text" placeholder="Buscar registro..." id="search" name="search"
                                   style="background: #FFFFFF;border: 1px solid #DBDFEA;box-sizing: border-box;
                                   box-shadow: 0 0.5px 2px rgba(15, 30, 81, 0.11);border-radius: 4px;margin: 0;
                                   padding: 8px 0 8px 30px;min-width: 300px;">
                        </div>
                    </div>
                    <table  class="table custom-table caption-top">
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
                                <th scope="col"
                                    style="vertical-align: middle;"><?php print_r($column['titulo']); ?></th>
                            <?php endforeach; ?>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>



