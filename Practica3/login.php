<?php

require_once 'includes/config.php';
ob_start();

?>

<div class="container justify-content-center col-lg-5">
    <?= ($loginForm = new es\ucm\fdi\aw\forms\LoginForm())->handleForm(); ?>
</div>

<?php

$content = ob_get_clean();

require_once INCLUDES_ROOT . '/templates/default_template.php';

?>