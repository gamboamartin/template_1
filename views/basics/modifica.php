<?php use config\views; ?>
<?php include "init.php"; ?>
<main class="main section-color-primary">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <?php include (new views())->ruta_templates."head/title.php"; ?>
                <?php include (new views())->ruta_templates."forms/modifica.php"; ?>

            </div><!-- /.center-content -->
        </div>
    </div>
</main>
