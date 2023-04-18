<?php

use es\ucm\fdi\aw\DAO\OrderDAO;
use es\ucm\fdi\aw\DAO\UserOrderDAO;
use es\ucm\fdi\aw\DAO\UserDAO;
use es\ucm\fdi\aw\forms\UpdateOrderForm;

require_once 'includes/config.php';

if (!isset($_SESSION['user'])) goto end;

$userID = $_SESSION['user']->getID();

$orderDAO = new OrderDAO;
$orders = $orderDAO->read();

$results = $orderDAO->getOrderForUser($userID);

if (isset($_POST['orderID'])) {
    $orderID = intval($_POST['orderID']);
    $orderDAO->cancelOrder($orderID);
    header("Location: {$_SERVER['REQUEST_URI']}");
    exit();
}


ob_start();
?>


<div class="container">
    <h2 class="m-3 d-flex justify-content-center">Pedidos Realizados</h2>
    <div class="row">
        <?php if (!isset($orders) || empty($orders)) : ?>
            <div class="col-12">
                <div class="row d-flex justify-content-center">
                    <h5>No hay ningún pedido realizado</h5>
                </div>
            </div>
        <?php else : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Número de Pedido</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Importe (€)</th>
                        <th scope="col">Acciones</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result) : ?>
                        <tr>
                            <?php
                                $orderID = $result['orderID'];
                                $state = $result['stateO'];
                                $date = $result['dateO'];
                                $amount = $result['amountO'];
                            ?>
                            <td><a href="viewOrder.php?orderID=<?= $orderID ?>"><?= $orderID ?></a></td>
                            <td><?= $state ?></td>
                            <td><?= $date ?></td>
                            <td><?= $amount ?></td>
                            <?php if ($result["stateO"] == "pendiente" || $result["stateO"] == "en proceso") : ?>
                                <td>
                                <?= ($form = new UpdateOrderForm($orderID, true))->handleForm(); ?>
                                </td>
                            <?php else : ?>
                                <td></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif ?>
    </div>
</div>


<?php
end:

$content = ob_get_clean();

require_once INCLUDES_ROOT . '/templates/default_template.php';

?>

