<?php

use es\ucm\fdi\aw\DAO\EventDAO;

require_once 'includes/config.php';

if (!isset($_SESSION['user']))
    goto end;

$eventDAO = new EventDAO();
$eventsDTOResults = $eventDAO->read();

ob_start();

?>

<h4>Todos los eventos</h4>

<?php if (count($eventsDTOResults) == 0) : ?>

    <div class="alert alert-info">
        Aún no hay eventos publicados
    </div>

<?php else : ?>

    <form action="viewEvent.php" method="GET">
        <div class="list-group">
            <?php foreach ($eventsDTOResults as $eventDTO) : ?>

                <button type="submit" class="list-group-item list-group-item-action" name="eventID" value="<?= $eventDTO->getID() ?>">
                    <?= $eventDTO->getName() ?>
                </button>

            <?php endforeach; ?>
        </div>
    </form>

<?php endif; ?>

<?php
end:

$content = ob_get_clean();
require_once 'includes/templates/events_template.php';

?>