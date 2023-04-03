<link rel="stylesheet" href="icons.css">

<link rel="stylesheet" href="owl.carousel.min.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href=bootstrap.min.css">

<!-- Style -->
<link rel="stylesheet" href=style.css">

<div class="content">

    <div class="container">
        <h2 class="mb-5">Table #4</h2>

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
                        <th scope="col"><?php print_r($column->title); ?></th>
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
                            <th scope="col"><?php echo $registro[$column->data]; ?></th>
                        <?php endforeach; ?>
                    </tr>
                    <tr class="spacer">
                        <td colspan="100"></td>
                    </tr>
                <?php endforeach; ?>



                </tbody>
            </table>
        </div>


    </div>

</div>
