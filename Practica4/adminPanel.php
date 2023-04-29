<?php

require_once 'includes/config.php';

ob_start();

if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] == false) : ?>
    <?php $title = 'Página no disponible'; ?>
    <div class="flex-fill flex-col">
        <div class="alert alert-danger m-2" role="alert">
            No tienes permisos suficientes para acceder a esta página.
        </div>
    </div>
<?php else : ?>
    <?php $title = 'Panel de administración'; ?>
    <div class="container p-3">
        <h2 class="d-flex justify-content-center my-3">Panel de administración</h2>
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-6 col-lg-6 col-xl-4 m-2 p-2 card">
                <div class="p-4">
                    <h4 class="d-flex justify-content-center">Modificar rol de usuarios</h4>

                    <hr class="mt-4">
                    <?= ($changeUserRoleForm = new \es\ucm\fdi\aw\forms\ChangeUserRoleForm())->handleForm() ?>
                </div>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-6 col-xl-4 m-2 p-2 card">
                <div class="p-4">
                    <h4 class="d-flex justify-content-center">Eliminar usuario</h4>

                    <hr class="mt-4">
                    <?= ($deleteUserForm = new \es\ucm\fdi\aw\forms\DeleteUserForm())->handleForm() ?>
                </div>
            </div>
        </div>
    </div>
<?php endif;
$content = ob_get_clean();

require_once INCLUDES_ROOT . '/templates/default_template.php';

?>