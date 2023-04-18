<?php

use es\ucm\fdi\aw\forms\AccountForm;

require_once 'includes/config.php';

ob_start();
$title = 'Mi cuenta';
?>
<?php
if (isset($_SESSION["user"])) {
    $userID = $_SESSION["user"]->getID();
?>
    <div class="container shadow p-4">
        <h1 class="mb-4 text-center">Datos del usuario</h1>

        <?= ($modUser = new AccountForm($userID))->handleForm(); ?>
    </div>
<?php
}

?>

<?php
$content = ob_get_clean();


require_once PROJECT_ROOT . '/includes/templates/default_template.php';

?>