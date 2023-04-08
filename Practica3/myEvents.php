<?php

use es\ucm\fdi\aw\DAO\EventDAO;
use es\ucm\fdi\aw\DAO\EventRolesDAO;
use es\ucm\fdi\aw\forms\AbandonEventForm;

require_once 'includes/config.php';

if (!isset($_SESSION['user']))
    goto end;

$playerID = $_SESSION['user']->getID();
$eventDAO = new EventDAO();

$eventRolesDAO = new EventRolesDAO();

$results = $eventDAO->getEventForPlayer($playerID);

ob_start();

?>

<h4>Mis eventos</h4>

<?php if (count($results) == 0) : ?>

    <div class="alert alert-info">
        Aún no te has unido a ningún evento
    </div>

<?php else : ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Rol</th>
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
                        <?= $eventRolesDAO->getRoleForPlayer($playerID, $eventID); ?>
                    </td>
                    <td>
                        <form class="d-inline" action="viewEvent.php" method="GET">
                            <button type="submit" class="btn btn-primary" name="eventID" value="<?= $eventID ?>">Inspeccionar</button>
                        </form>
                        <?= ($form = new AbandonEventForm($eventID, true))->handleForm(); ?>
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