<?php

use es\ucm\fdi\aw\DAO\UserDAO;

require_once 'includes/config.php';

?>

<?php ob_start(); ?>

<div class="px-3 py-2">
    <h1>Zeus Airsoft</h1>
    <p>Pagina de MI CUENTA</p>
   
</div>

<?php 

$title = 'Inicio';
$content = ob_get_clean();


require_once PROJECT_ROOT . '/includes/templates/default_template.php';

?>