<?php

use es\ucm\fdi\aw\DAO\QuestionDAO;
use es\ucm\fdi\aw\DAO\UserQuestionDAO;

require_once 'includes/config.php';

$title = "Foro";

$questionDAO = new QuestionDAO;
$questions = $questionDAO->read();

$userQuestionDAO = new UserQuestionDAO;
$questionAuthors = $userQuestionDAO->read();

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['questionID']) && !empty($_GET['questionID'])) {
    $questionDAO->delete($_GET['questionID']);
    header("Location: {$_SESSION['url']}");
}

ob_start();
?>
<div class="container">
    <h2 class="m-3 d-flex justify-content-center">Foro</h2>
    <div class="row">
        <div class="col-10 mb-3">
            <div class="row text-left mb-5"></div>
            <?php foreach ($questions as $question) : ?>
                <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-bottom-0 rounded-0">
                    <div class="row d-flex align-items-center">
                        <form action="question.php" method="get">
                            <?php $questionAuthor = $questionDAO->getQuestionAuthor($question->getID())[0]->getName() . " " . $questionDAO->getQuestionAuthor($question->getID())[0]->getSurname(); ?>
                            <input type="hidden" name="questionID" value="<?= $question->getID(); ?>">
                            <input type="hidden" name="author" value="<?= $questionAuthor ?>">
                            <button type="submit" class="btn btn-link text-primary text-decoration-none">
                                <h5><?= $question->getTitle(); ?></h5>
                            </button>
                        </form>
                        <p class="text-sm"><span class="op-6">Publicado el <b><?= $question->getCreationDate() ?></b> por <b><?= $questionAuthor ?></b></span></p>

                        <?php if (isset($_SESSION["user"]) && $_SESSION["user"]->getID() == $questionDAO->getQuestionAuthor($question->getID())[0]->getID()) : ?>
                            <div class="d-flex flex-col col-1 justify-content-start">
                                <button type="button" class="ms-3 btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm-modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"></path>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="modal fade" id="confirm-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal-title">Confirmar acción</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Deseas realmente eliminar esta pregunta?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancelar</button>
                                            <form action="forum.php" method="get">
                                                <input type="hidden" name="questionID" value="<?= $question->getID(); ?>">
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="col-2 mt-5">
            <div class="row d-flex justify-content-center">
                <a class="btn btn-primary w-100 m-3" href="ask-question.php" role="button">
                    <p class="pt-2">Haz una<br>pregunta</p>
                </a>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require_once PROJECT_ROOT . '/includes/templates/default_template.php'; ?>