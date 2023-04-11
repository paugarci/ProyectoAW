<?php

require_once 'includes/config.php';

ob_start();

if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] == false) : ?>
    <?php $title = 'Página no disponible'; ?>
    <div class="alert alert-danger m-2 flex-fill h-100" role="alert">
        No tienes permisos suficientes para acceder a esta página.
    </div>
<?php else : ?>
    <?php $title = 'Panel de administración'; ?>
    <div class="d-flex">
        <h2>Panel de administración</h2>
    </div>
<?php endif;

$content = ob_get_clean();

require_once INCLUDES_ROOT . '/templates/default_template.php';

?>