<?php

use es\ucm\fdi\aw\DAO\UserDAO;

require_once 'includes/config.php';

?>

<?php ob_start(); ?>

<div class="px-3 py-2">
    <h1>Zeus Airsoft</h1>
    <p>Página principal de Zeus Airsoft. Puedes navegar las distintas vistas usando la navbar arriba, pinchando en cualquiera de los enlaces.</p>
    <?php
    if (isset($_SESSION['user']))
    {
        $userDAO = new UserDAO();
        $roleDTOResults = $userDAO->getUserRoles($_SESSION['user']->getID());

        foreach ($roleDTOResults as $roleDTO) {
            echo "Role ID: {$roleDTO->getID()}, Role name: {$roleDTO->getRoleName()}<br>";
        }
    }

    ?>
</div>

<?php $content = ob_get_clean();


require_once PROJECT_ROOT . '/includes/templates/default_template.php';

?>