<div class="table-responsive custom-table-responsive">

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
                <th scope="col" style="vertical-align: middle;"><?php print_r($column->title); ?></th>
            <?php endforeach; ?>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($registros as $registro): ?>
            <tr scope="row">
                <th scope="row">
                    <label class="control control--checkbox">
                        <input type="checkbox"/>
                        <div class="control__indicator"></div>
                    </label>
                </th>
                <?php foreach ($this->datatable['columns'] as $column): ?>
                    <td scope="col"><?php echo $registro[$column->data]; ?></td>
                <?php endforeach; ?>
            </tr>
            <tr class="spacer">
                <td colspan="100"></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>