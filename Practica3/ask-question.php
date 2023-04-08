<?php

use es\ucm\fdi\aw\DAO\QuestionDAO;
use es\ucm\fdi\aw\DAO\UserQuestionDAO;

require_once 'includes/config.php';

$questionDAO = new QuestionDAO;
$userQuestionDAO = new UserQuestionDAO;

$title = "Añadir pregunta";

ob_start();
?>

<?php if (isset($_SESSION['user'])) : ?>
    <div class="col-8 container justify-content-center shadow">
        <?= ($questionForm = new es\ucm\fdi\aw\forms\QuestionForm())->handleForm(); ?>
    </div>
<?php else : ?>
    <div class="alert alert-danger m-2 justify-content-center align-center" role="alert">
        <b>Error:</b> Debes identificarte para poder escribir en el foro.
    </div>
<?php endif ?>

<?php $content = ob_get_clean(); ?>

<?php require_once PROJECT_ROOT . '/includes/templates/default_template.php'; ?>