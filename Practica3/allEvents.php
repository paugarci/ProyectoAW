<?php

use es\ucm\fdi\aw\DAO\EventDAO;
use es\ucm\fdi\aw\DAO\UserDAO;

require_once 'includes/config.php';

if (!isset($_SESSION['user']))
    goto end;

$eventDAO = new EventDAO();
$eventsDTOResults = $eventDAO->read();

ob_start();

?>

<?php
$userID = $_SESSION['user']->getID();
$userDAO = new UserDAO();
$userRoles = $userDAO->getUserRoles($userID);
$isAdmin = false;

foreach ($userRoles as $userRole) {
    if ($userRole->getRoleName() == 'admin') {
        $isAdmin = true;
        break;
    }
}

$isViewingAsAdmin = ((array)json_decode($_COOKIE['events_cookie']))['view_mode'] == 'admin';

if ($isAdmin && $isViewingAsAdmin) :
?>
    <h4>Crear eventos</h4>
    <form action="createEvent.php">
        <button class="btn btn-primary">Crear</button>
    </form>
    <br>
<?php endif; ?>

<h4>Todos los eventos</h4>

<?php if (count($eventsDTOResults) == 0) : ?>

    <div class="alert alert-info">
        Aún no hay eventos publicados
    </div>

<?php else : ?>

    <form action="readEvent.php" method="GET">
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