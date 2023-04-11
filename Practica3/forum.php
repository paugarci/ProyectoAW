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

        
// Procesar la creación de una nueva pregunta si se ha enviado el formulario 
if (isset($_POST['ask_question'])) { 
    $question = $_POST['question']; 
    if (!isset($_SESSION['user'])) { 
        echo '<script>alert("Debes estar registrado para hacer una pregunta.");</script>'; 
    } else { 
        $user = $_SESSION['user']; 
        $questionDTO = new QuestionDTO(null, $question, date('Y-m-d')); 
        $questionDAO->create($questionDTO); 
        header("Location: forum.php");
        exit;

    } 
} 

// Procesar la creación de una nueva respuesta si se ha enviado el formulario 
if (isset($_POST['answer_question'])) { 
    $answer = $_POST['answer']; 
    if (!isset($_SESSION['user'])) { 
        echo '<script>alert("Debes estar registrado para responder a una pregunta.");</script>'; 
    } else { 
        $question_id = $_POST['question_id']; 
        $user = $_SESSION['user']; 
        $answerDTO = new AnswerDTO(null, $question_id, $answer, date('Y-m-d')); 
        $answerDAO->create($answerDTO); 
        header("Location: forum.php");
        exit;
    } 
} 

// Procesar la eliminación de una pregunta si se ha enviado el formulario 
if (isset($_POST['delete_question'])) { 
    $question_id = $_POST['question_id']; 
    if (!isset($_SESSION['user'])) { 
        echo '<script>alert("Debes estar registrado para eliminar una pregunta.");</script>'; 
    } else { 
        $answerDAO->deleteById('id_pregunta', $question_id); 
        $questionDAO->delete($question_id); 
        header("Location: forum.php");
        exit;
    } 
} 
$title = 'Foro de preguntas y respuestas';

$content = <<<EOS
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
<div class="container">
<h3 class="mb-3 d-flex justify-content-center">Preguntas y respuestas</h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Pregunta</th>
            <th scope="col">Respuestas</th>
            <th scope="col">Responder</th>
            <th scope="col"> </th>
            <th scope="col"> </th>
        </tr>
    </thead>
    <tbody>
EOS;

foreach ($questionDTOResults as $key => $questionDTO) {
    $content .= "<tr>";
    $content .= "<th scope='row'>" . ($key + 1) . "</th>";
    $content .= "<td>" . $questionDTO->getPregunta() . "</td>";
    $content .= "<td>";
    foreach ($answerDTOResults as $answerDTO) {
        if ($answerDTO->getIDPregunta() == $questionDTO->getID()) {
            $content .= "<p>" . $answerDTO->getRespuesta() . "</p>";
        }
    }
    $content .= "</td>";
    $content .= "<td>
        <form method='POST' action=''>
            <input type='hidden' name='question_id' value='{$questionDTO->getID()}'>
            <textarea name='answer' class='form-control' rows='3'></textarea><br>
            <input type='submit' name='answer_question' value='Responder' class='btn btn-primary'>
        </form>
    </td>";

    
    $content .= "<td>
        <form method='POST' action=''>
            <input type='hidden' name='question_id' value='{$questionDTO->getID()}'>
            <input type='submit' name='delete_question' value='Eliminar' class='btn btn-danger'>
        </form>
    </td>";

    $content .= "<td>
        <form method='GET' action='editforum.php'>
            <input type='hidden' name='question_id' value='{$questionDTO->getID()}'>
            <input type='hidden' name='question_text' value='{$questionDTO->getPregunta()}'>
            <input type='hidden' name='pregunta' value='{$questionDTO->getPregunta()}'>
            <button type='submit' name='edit_question' class='btn btn-primary'>Editar</button>
            </form>
        </td>
        </tr>
    </div>";
}
echo $content;
?>
<?php
$content = ob_get_clean();

require_once PROJECT_ROOT . '/includes/templates/default_template.php';?>












