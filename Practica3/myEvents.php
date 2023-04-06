<?php

use es\ucm\fdi\aw\DAO\EventDAO;

require_once 'includes/config.php';

if (!isset($_SESSION['user']))
    goto end;

$playerID = $_SESSION['user']->getID();
$eventDAO = new EventDAO();

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action == 'abandon') {
        $eventID = $_GET['eventID'];
        $result = $eventDAO->abandonEvent($playerID, $eventID);

        $info = <<<ABANDON_RESULT
        <div class="alert alert-success">Has abandonado correctamente el evento</div>    
        ABANDON_RESULT;
    } else if ($action == 'join') {
        $eventID = $_GET['eventID'];
        $eventRole = $_GET['eventRole'];

        $result = $eventDAO->joinEvent($playerID, $eventID, $eventRole);

        $info = <<<JOIN_RESULT
        <div class="alert alert-success">Te has unido correctamente al evento</div>    
        JOIN_RESULT;
    }
}

$results = $eventDAO->getEventForPlayer($playerID);

ob_start();

?>

<h4>Eventos</h4>

<?php if (count($results) == 0) : ?>

    <div class="alert alert-info">
        Aún no te has unido a ningún evento
    </div>

<?php else : ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $result) : ?>
                <tr>
                    <?php
                    $eventName = $result['eventName'];
                    $eventID = $result['eventID'];
                    ?>
                    <td>
                        <?= $eventName ?>
                    </td>
                    <td>
                        <form class="d-inline" action="viewEvent.php" method="GET">
                            <button type="submit" class="btn btn-primary" name="eventID" value="<?= $eventID ?>">Inspeccionar</button>
                        </form>
                        <form class="d-inline" action="myEvents.php" method="GET">
                            <input type="hidden" name="action" value="abandon">
                            <button type="submit" class="btn btn-outline-danger" name="eventID" value="<?= $eventID ?>">Abandonar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>

<?php
end:

$content = ob_get_clean();
require_once 'includes/templates/events_template.php';

?>