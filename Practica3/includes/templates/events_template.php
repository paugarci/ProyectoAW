<?php

use es\ucm\fdi\aw\DAO\UserDAO;

require_once 'includes/config.php';

define('EVENTS_COOKIE_NAME', 'events_cookie');

if (!isset($_COOKIE[EVENTS_COOKIE_NAME])) {
    setcookie(EVENTS_COOKIE_NAME, json_encode(array()));
    header("Location: {$_SERVER['PHP_SELF']}");
}

$eventsCookie = (array)json_decode($_COOKIE[EVENTS_COOKIE_NAME]);

if (!isset($eventsCookie['view_mode']))
    $eventsCookie['view_mode'] = 'user';
else if (isset($_POST['switch_view_mode'])) {
    switch ($eventsCookie['view_mode']) {
        case 'user':
            $eventsCookie['view_mode'] = 'admin';
            break;
        case 'admin':
            $eventsCookie['view_mode'] = 'user';
            break;
        default:
            break;
    }

    header("Location: {$_SERVER['PHP_SELF']}");
}

setcookie(EVENTS_COOKIE_NAME, json_encode($eventsCookie));

ob_start();
?>
<div class="d-flex flex-column flex-shrink-0 p-3 bg-dark" style="width: 300px">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a href="allEvents.php" class="nav-link">Todos los eventos</a>
        </li>
        <li class="nav-item">
            <a href="myEvents.php" class="nav-link">Mis eventos</a>
        </li>
    </ul>
    <?php
    $canSeeButton = false;

    if (isset($_SESSION['user'])) {
        $userID = $_SESSION['user']->getID();

        $userDAO = new UserDAO();
        $userRolesResults = $userDAO->getUserRoles($userID);

        foreach ($userRolesResults as $userRoleDTO) {
            if ($userRoleDTO->getRoleName() == 'admin')
                $canSeeButton = true;
        }
    }

    if ($canSeeButton) :
    ?>
        <div class="flex-fill d-flex flex-column justify-content-end">
            <form method="POST" action="events.php">
                <button class="w-100 btn btn-outline-primary" name="switch_view_mode" value="1">Modo <?= ucfirst($eventsCookie['view_mode']) ?></button>
            </form>
        </div>
    <?php endif; ?>
</div>
<div class="flex-fill p-3">
    <?php if (!isset($_SESSION['user'])) : ?>
        <div class="alert alert-warning">
            Debes identificarte para acceder a esta página.
        </div>

    <?php else : ?>
        <?php echo isset($content) ? $content : 'No hay contenido para esta página' ?>
    
    <?php endif; ?>
</div>

<?php

$content = ob_get_clean();

require_once 'includes/templates/default_template.php';

?>