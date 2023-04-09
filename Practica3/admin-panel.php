<?php

use es\ucm\fdi\aw\DAO\UserDAO;

require_once 'includes/config.php';

ob_start();

if (!isset($_SESSION['isAdmin'])) : ?>
    <?php $title = 'Página no disponible'; ?>
    <div class="alert alert-danger m-2 justify-content-center align-center" role="alert">
        <b>Error:</b> No tienes permisos suficientes para acceder a esta página.
    </div>
<?php else : ?>
    <?php $title = 'Panel de administración'; ?>
    <div class="mx-4 p-4 shadow">
        <h2 class="mb-5 d-flex justify-content-center">Panel de administración</h2>
        <div class="col-4 m-3 p-2 card">
            <div class="p-4">
                <h4 class="d-flex justify-content-center">Modificar rol de usuarios</h4>

                <hr class="mt-4">
                <?= ($changeRoleForm = new \es\ucm\fdi\aw\forms\AddRoleForm())->handleForm() ?>
            </div>
        </div>
    </div>
<?php endif ?>



<?php
$content = ob_get_clean();

require_once INCLUDES_ROOT . '/templates/default_template.php';

?>