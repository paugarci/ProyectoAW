<?php

use es\ucm\fdi\aw\DAO\ProductDAO;

require_once 'includes/config.php';

$productDAO = new ProductDAO;

ob_start();
?>



<?php
$title = 'Añadir producto';
$content = ob_get_clean();

require_once PROJECT_ROOT . '/includes/templates/default_template.php';
?>