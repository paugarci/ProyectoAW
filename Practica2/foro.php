<?php
include 'database.php';
include 'includes/DAO/DAO.php';
include 'includes/DAO/QuestionDAO.php';
include 'includes/DAO/AnswerDAO.php';

require "includes/comun/header.php";



if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$database = new Database;
$connection = $database->getConnection();

$questionDAO = new QuestionDAO($connection);
$answerDAO = new AnswerDAO($connection);

if (isset($_POST['ask_question'])) {
    $question = $_POST['question'];
    $user = $_SESSION['user'];
    $questionDAO->create(array('pregunta' => $question, 'fecha' => date('Y-m-d')));
}

if (isset($_POST['answer_question'])) {
    $answer = $_POST['answer'];
    $question_id = $_POST['question_id'];
    $user = $_SESSION['user'];
    $answerDAO->create(array('id_pregunta' => $question_id, 'respuesta' => $answer,  'fecha' => date('Y-m-d')));
}

$questions = $questionDAO->getAll();
$answers = $answerDAO->getAll();


?>



<html>
<head>
    <title>Foro de preguntas y respuestas</title>
</head>
<body>
    <br><h2 class="mb-3 d-flex justify-content-center">Bienvenido al foro de preguntas y respuestas</h2>


    <h3 class="mb-3 d-flex justify-content-center">Realiza una pregunta</h3>
    <div class="container">
        <div class="mb-3">
            <form method="POST" action="">
            <label for="exampleFormControlTextarea1" class="form-label">Escribe aquí tu pregunta</label>
            <textarea name="question" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea><br>
            <input type="submit" name="ask_question" value="Enviar pregunta" class="btn btn-primary">
            </form>
        </div>
    </div>

    <hr>
    <h3 class="mb-3 d-flex justify-content-center">Preguntas y respuestas</h3>
    <div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pregunta</th>
                <th scope="col">Respuestas</th>
                <th scope="col">Responder</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $key => $question): ?>
                <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $question['pregunta'] ?></td>
                    <td>
                        <?php foreach ($answers as $answer): ?>
                            <?php if ($answer['id_pregunta'] == $question['id']): ?>
                                <p><?= $answer['respuesta'] ?></p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <form method="POST" action="">
                            <input type="hidden" name="question_id" value="<?= $question['id'] ?>">
                            <textarea name="answer" class="form-control" rows="3"></textarea><br>
                            <input type="submit" name="answer_question" value="Responder" class="btn btn-primary">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


    
    
    <hr>

    <?php 
    require "includes/comun/footer.php"?>
</body>
</html>
