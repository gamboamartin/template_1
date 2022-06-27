<?php use config\views; ?>
<ul class="breadcrumb">
    <?php include (new views())->ruta_templates."breadcrumb/adm_session/inicio.php"; ?>
    <?php include (new views())->ruta_templates."breadcrumb/lista.php"; ?>
    <li class="item"> Alta </li>
</ul>