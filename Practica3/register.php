<?php

require_once 'includes/config.php';
ob_start();

?>

<div class="container d-flex col-lg-5" id="borders-form">
    <?= ($registerForm = new es\ucm\fdi\aw\forms\RegisterForm())->handleForm(); ?>
</div>

<?php

$content = ob_get_clean();

require_once INCLUDES_ROOT . '/templates/default_template.php';

?>