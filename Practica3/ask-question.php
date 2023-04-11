<?php

use es\ucm\fdi\aw\DAO\QuestionDAO;
use es\ucm\fdi\aw\DAO\UserQuestionDAO;

require_once 'includes/config.php';

$questionDAO = new QuestionDAO;
$userQuestionDAO = new UserQuestionDAO;

$title = "Añadir pregunta";

ob_start();
?>

<div class="col-8 container justify-content-center shadow">
    <?= ($questionForm = new es\ucm\fdi\aw\forms\QuestionForm())->handleForm(); ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require_once PROJECT_ROOT . '/includes/templates/default_template.php'; ?>