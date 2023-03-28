<?php

include 'database.php';
include 'includes/DAO/DAO.php';
include 'includes/DAO/OfferDAO.php';
include 'includes/DAO/OfferUsersDAO.php';
include 'includes/DAO/EventDAO.php';
include 'includes/DAO/EventUsersDAO.php';

require "includes/comun/header.php";

$contenido;

if (!isset($_SESSION['user'])) {
    $contenido = '
    <div class="alert alert-warning">
        Es necesario iniciar sesión para acceder a esta página
    </div>
    ';
} else {
    $user = $_SESSION['user'];

    $log = '';
    $activeOffersHTML = '
        <div class="alert alert-secondary">
            No tienes ninguna oferta activa.
        </div>'
    ;
    $availableOffersHTML = '
        <div class="alert alert-secondary">
            No hay ofertas en este momento.
        </div>'
    ;
    $subscribedEventsHTML = '
        <div class="alert alert-secondary">
            No estás inscrito en ningún evento
        </div>
    ';
    $availableEventsHTML = '
        <div class="alert alert-secondary">
            No hay eventos disponibles por el momento
        </div>
    ';

    $database = new Database();
    $connection = $database->getConnection();
    $offerDAO = new OfferDAO($connection);
    $offerUsersDAO = new OfferUsersDAO($connection);
    $eventDAO = new EventDAO($connection);
    $eventUsersDAO = new EventUsersDAO($connection);

    if (isset($_POST['offer-id-active'])) {
        $offerUsersID = $_POST['offer-id-active'];
        $offer = $offerDAO->get('id', $offerUsersID);

        if ($offer) {
            $data = array(
                'offer_id' => $offer['id'],
                'user' => $user['mail']
            );

            $offerUsersDAO->insert($data);

            $log = '
                <div class="alert alert-success">
                    Has activado esta oferta correctamente.
                </div>
            ';
        }
    } else if (isset($_POST['offer-id-unsubscribe'])) {
        $offerUsersID = $_POST['offer-id-unsubscribe'];

        $offerUsersDAO->delete('offer_id', $offerUsersID);

        $log = '
            <div class="alert alert-success">
                Has desactivado esta oferta con éxito.
            </div>
        ';
    }

    $availableOffers = $offerDAO->getAll();
    $offerUsersEntries = $offerUsersDAO->getAll();

    $userOffers = array();
    $userOffersIDs = array();

    foreach ($offerUsersEntries as $entry) {
        if ($entry['user'] == $user['mail']) {
            array_push($userOffers, $offerDAO->get('id', $entry['offer_id']));
            array_push($userOffersIDs, $entry['offer_id']);
        }
    }

    if (count($userOffers) > 0) {
        $activeOffersHTML = '
            <table class="table table-striped">
                <thead>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Código</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                </thead>
                </tbody>
        ';

        foreach ($userOffers as $row) {
            $id = $row['id'];
            $name = $row['nombre'];
            $description = $row['descripcion'];
            $code = $row['codigo'];
            $date = $row['fecha'];

            $activeOffersHTML .= "
                <tr scope='row'>
                    <td class='text-nowrap'>{$name}</td>
                    <td>{$description}</td>
                    <td class='text-nowrap'>{$code}</td>
                    <td class='text-nowrap'>{$date}</td>
                    <td class='text-nowrap'>
                        <form action='eventos.php' method='post'>
                            <button type='submit' class='btn btn-outline-danger' name='offer-id-unsubscribe' value='{$id}'>Desactivar</button>
                        </form>
                    </td>
                </tr>
            ";
        }

        $activeOffersHTML .= '
                </tbody>
            </table>
        ';
    }

    if (count($availableOffers) > 0) {
        $availableOffersHTML = '
            <table class="table table-striped">
                <thead>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Hasta</th>
                    <th scope="col">Acciones</th>
                </thead>
                </tbody>
        ';

        foreach ($availableOffers as $row) {
            $id = $row['id'];
            $name = $row['nombre'];
            $description = $row['descripcion'];
            $code = $row['codigo'];
            $date = $row['fecha'];
            $actions = in_array($id, $userOffersIDs) ? '' : "<button type='submit' class='btn btn-primary' name='offer-id-active' value='{$id}'>Activar</button>";

            $availableOffersHTML .= "
                <tr scope='row'>
                    <td class='text-nowrap'>{$name}</td>
                    <td>{$description}</td>
                    <td class='text-nowrap'>{$date}</td>
                    <td class='text-nowrap'>
                        <form action='eventos.php' method='post'>
                            {$actions}
                        </form>
                    </td>
                </tr>
            ";
        }

        $availableOffersHTML .= '
                </tbody>
            </table>
        ';
    }

    if (isset($_POST['event-id-subscribe'])) {
        $eventUsersID = $_POST['event-id-subscribe'];
        $event = $eventDAO->get('id', $eventUsersID);

        if ($event) {
            $data = array(
                'event_id' => $event['id'],
                'user' => $user['mail']
            );

            $eventUsersDAO->insert($data);

            $log = '
                <div class="alert alert-success">
                    Te has unido a esta misión exitosamente.
                </div>
            ';
        }
    } else if (isset($_POST['event-id-unsubscribe'])) {
        $eventUsersID = $_POST['event-id-unsubscribe'];

        $eventUsersDAO->delete('event_id', $eventUsersID);

        $log = '
            <div class="alert alert-success">
                Has abandonado esta misión exitosamente.
            </div>
        ';
    }

    $availableEvents = $eventDAO->getAll();
    $eventUsersEntries = $eventUsersDAO->getAll();

    $userEvents = array();
    $userEventsIDs = array();

    foreach ($eventUsersEntries as $entry) {
        if ($entry['user'] == $user['mail']) {
            array_push($userEvents, $eventDAO->get('id', $entry['event_id']));
            array_push($userEventsIDs, $entry['event_id']);
        }
    }

    if (count($userEvents) > 0) {
        $subscribedEventsHTML = '
            <table class="table table-striped">
                <thead>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                </thead>
                </tbody>
        ';

        foreach ($userEvents as $row) {
            $id = $row['id'];
            $name = $row['nombre'];
            $description = $row['descripcion'];
            $date = $row['fecha'];

            $subscribedEventsHTML .= "
                <tr scope='row'>
                    <td class='text-nowrap'>{$name}</td>
                    <td>{$description}</td>
                    <td class='text-nowrap'>{$date}</td>
                    <td class='text-nowrap'>
                        <form action='eventos.php' method='post'>
                            <button type='submit' class='btn btn-outline-danger' name='event-id-unsubscribe' value='{$id}'>Abandonar</button>
                        </form>
                    </td>
                </tr>
            ";
        }

        $subscribedEventsHTML .= '
                </tbody>
            </table>
        ';
    }

    if (count($availableEvents) > 0) {
        $availableEventsHTML = '
            <table class="table table-striped">
                <thead>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                </thead>
                </tbody>
        ';

        foreach ($availableEvents as $row) {
            $id = $row['id'];
            $name = $row['nombre'];
            $description = $row['descripcion'];
            $date = $row['fecha'];
            $actions = in_array($id, $userEventsIDs) ? '' : "<button type='submit' class='btn btn-primary' name='event-id-subscribe' value='{$id}'>Unirse</button>";

            $availableEventsHTML .= "
                <tr scope='row'>
                    <td class='text-nowrap'>{$name}</td>
                    <td>{$description}</td>
                    <td class='text-nowrap'>{$date}</td>
                    <td class='text-nowrap'>
                        <form action='eventos.php' method='post'>
                            {$actions}
                        </form>
                    </td>
                </tr>
            ";
        }

        $availableEventsHTML .= '
                </tbody>
            </table>
        ';
    }

    $contenido = "
        {$log}
        <div>
            <p class='h2'>
                Ofertas
            </p>
        </div>
        <hr>
        <div>
            <p class='h4'>
                Ofertas activas
            </p>
            <div>
                {$activeOffersHTML}
            </div>
        </div>
        <hr>
        <div>
            <p class='h4'>
                Ofertas disponibles
            </p>
            <div>
                {$availableOffersHTML}
            </div>
            <p class='h2'>
                Eventos
            </p>
        </div>
        <hr>
        <div>
            <p class='h4'>
                Mis eventos
            </p>
            <div>
                {$subscribedEventsHTML}
            </div>
        </div>
        <hr>
        <div>
            <p class='h4'>
                Eventos disponibles
            </p>
            <div>
                {$availableEventsHTML}
            </div>
        </div>
    ";
}

?>

<style>
    html,
    body {
        height: 100%;
    }
</style>

<div class="container-xxl h-100 shadow px-5 py-3">
    <?= $contenido ?>
</div>

<?php require "includes/comun/footer.php" ?>