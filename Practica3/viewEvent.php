<?php

use es\ucm\fdi\aw\DAO\EventDAO;

require_once 'includes/config.php';

if (!isset($_SESSION['user']))
    goto end;

$maximumPlayersPerRole = array(
    'fusilero' => 45,
    'tirador selecto' => 4,
    'apoyo' => 4,
    'francotirador' => 4
);
$playersPerRole = array();

if (!isset($_GET['eventID'])) {
    $error = 'Ha ocurrido un error inesperado (no existe identificador de evento).';
} else {
    $eventID = $_GET['eventID'];
    $eventDAO = new EventDAO();
    $eventDTOResults = $eventDAO->read($eventID);

    if (count($eventDTOResults) == 0) {
        $error = 'No existe este evento.';
    } else {
        $eventDTO = $eventDTOResults[0];
        $eventID = $eventDTO->getID();

        foreach (array_keys($maximumPlayersPerRole) as $role)
            $playersPerRole[$role] = $eventDAO->getCountByRole($eventID, $role);

        $playersResults = $eventDAO->getPlayersForEvent($eventID);
    }
}

?>

<?php if (isset($error)) : ?>

    <div class="alert alert-danger">
        <?= $error ?>
    </div>

<?php else : ?>

    <h4><?= $eventDTO->getName(); ?></h4>
    <p><?= $eventDTO->getDescription(); ?></p>
    <hr>
    <br>

    <h4>Roles ocupados</h4>
    <ul class="list-group list-group-flush">
        <?php foreach ($playersPerRole as $role => $count) : ?>

            <li class="list-group-item"><b><?= ucfirst($role) ?>:</b> <?= $count ?>/<?= $maximumPlayersPerRole[$role] ?></li>

        <?php endforeach; ?>
    </ul>
    <hr>
    <br>

    <h4>Jugadores</h4>
    <?php if (count($playersResults) == 0) : ?>
        <br>
        <div class="alert alert-info">
            Aún no hay jugadores apuntados a este evento
        </div>
    <?php else : ?>
        <table class="table table-hover">
            <thead>
                <th scope="col">Nombre</th>
                <th scope="col">Rol</th>
                <th scope="col">Equipo</th>
            </thead>
            <tbody>
                <?php foreach ($playersResults as $playerInfo) : ?>
                    <?php
                    $playerName = $playerInfo['name'];
                    $playerRole = ucfirst($playerInfo['eventRole']);
                    $playerTeam = isset($playerInfo['team']) ? $playerInfo['team'] : 'Ninguno';
                    ?>
                    <tr>
                        <td><?= $playerName ?></td>
                        <td><?= $playerRole ?></td>
                        <td><?= $playerTeam ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php endif; ?>
    <hr>
    <br>

    <h4>Acciones</h4>
    <?php

    $userID = $_SESSION['user']->getID();

    if ($eventDAO->playerHasJoinedEvent($userID, $eventID)) :
    ?>

        <form action="myEvents.php" method="GET">
            <input type="hidden" name="action" value="abandon">
            <button type="submit" class="btn btn-outline-danger" name="eventID" value="<?= $eventID ?>">Abandonar</button>
        </form>

    <?php else : ?>

        <br>
        <form action="myEvents.php" method="GET">
            <input type="hidden" name="action" value="join">
            <div class="form-group">
                <label for="eventRole">Rol</label>
                <select name="eventRole" id="eventRole" class="form-select">
                    <option value="fusilero" selected>Fusilero</option>
                    <option value="tiradorSelecto">Tirador selecto</option>
                    <option value="apoyo">Apoyo</option>
                    <option value="francotirador">Francotirador</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-outline-primary" name="eventID" value="<?= $eventID ?>">Unirse</button>
        </form>

    <?php endif; ?>

<?php endif; ?>

<?php
end:

$content = ob_get_clean();
require_once 'includes/templates/events_template.php';

?>