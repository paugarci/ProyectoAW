<?php

use es\ucm\fdi\aw\DAO\ProductDAO;

require_once 'includes/config.php';

$title = 'Añadir producto';

ob_start();
?>

<div class="container justify-content-center col-lg-5">
    <?= ($addProductForm = new es\ucm\fdi\aw\forms\AddProductForm())->handleForm(); ?>
</div>

<?php
$content = ob_get_clean();

require_once PROJECT_ROOT . '/includes/templates/default_template.php';
?>