<?php

include 'database.php';
include 'includes/DAO/DAO.php';
include 'includes/DAO/EventDAO.php';

require "includes/comun/header.php";

$contenido;

if (!isset($_SESSION['user'])) {
    $contenido = '
    <div class="alert alert-warning">
        Es necesario iniciar sesión para acceder a esta página
    </div>
    ';
}
else {
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
    $eventDAO = new EventDAO($connection);

    $availableEvents = $eventDAO->getAll();

    if (count($availableEvents) > 0) {
        $availableEventsHTML = '
            <table class="table table-striped">
                <thead>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha</th>
                </thead>
                </tbody>
        ';

        foreach ($availableEvents as $row) {
            $name = $row['nombre'];
            $description = $row['descripcion'];
            $date = $row['fecha'];

            $availableEventsHTML .= "
                <tr scope='row'>
                    <td class='text-nowrap'>{$name}</td>
                    <td>{$description}</td>
                    <td class='text-nowrap'>{$date}</td>
                </tr>
            ";
        }

        $availableEventsHTML .= '
                </tbody>
            </table>
        ';
    }

    $contenido = "
        <div>
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
    html, body {
        height: 100%;
    }
</style>

<div class="container-xxl h-100 shadow px-5 py-3">
    <?=$contenido?>
</div>

<?php require "includes/comun/footer.php" ?>