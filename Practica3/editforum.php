<?php
use es\ucm\fdi\aw\DAO\QuestionDAO;
use es\ucm\fdi\aw\DAO\AnswerDAO;
use es\ucm\fdi\aw\DTO\QuestionDTO;
use es\ucm\fdi\aw\DTO\AnswerDTO;

require_once 'includes/config.php';

ob_start();


$questionDAO = new QuestionDAO();
$questionDTOResults = $questionDAO->read();

$answerDAO = new AnswerDAO();
$answerDTOResults = $answerDAO->read();

// Obtener el ID de la pregunta de la URL
$preguntaId = $_GET['question_id'];




if (isset($_POST['edit_question']) ) {
    // Obtener los datos del formulario
   
    $questionText = $_POST['question_text'];
    $answerText = $_POST['answer_text'];

    
    $questionDAO->updateColumn($preguntaId, 'pregunta', $questionText);


    // Redirigir al usuario de vuelta al foro
    header("Location: forum.php");
    exit;
}
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar pregunta y respuesta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar pregunta </div>
                    <div class="card-body">
                        <form id="editForm" method="POST">
                            <div class="form-group">
                                <label for="editQuestion">Pregunta:</label>
                                <textarea class="form-control" id="editQuestion" name="question_text" rows="3"><?php echo htmlspecialchars($_GET['pregunta']); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="editAnswer">Respuesta:</label>
                                <?php foreach ($answerDTOResults as $answerDTO): ?>
                                    <?php if ($answerDTO->getIDPregunta() == $preguntaId): ?>
                                        <p><textarea class="form-control" id="editAnswer" name="answer_text" rows="3" readonly><?php echo $answerDTO->getRespuesta(); ?></textarea></p>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <button type="submit" name="edit_question" class="btn btn-primary">Guardar cambios</button>
                            <a href="forum.php" class="btn btn-secondary">Cerrar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>

<?php
$content = ob_get_clean();

require_once PROJECT_ROOT . '/includes/templates/default_template.php';?>


