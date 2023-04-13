<?php

use es\ucm\fdi\aw\DAO\OrderDAO;
use es\ucm\fdi\aw\DAO\UserOrderDAO;
use es\ucm\fdi\aw\DAO\UserDAO;
use es\ucm\fdi\aw\forms\UpdateOrderForm;

require_once 'includes/config.php';


//if (!isset($_SESSION['user'])) goto end;

$userID = $_SESSION['user']->getID();
$orderID = $_GET['orderID'];

$orderDAO = new OrderDAO;
$results = $orderDAO->getOrderForUser($userID);

$userDAO = new UserDAO;
$users = $userDAO->getContact($userID);



ob_start();
?>

<div class="container">
    <br>
    <?php foreach ($results as $result) :
        if ($result['orderID'] == $orderID) : ?>
            <h2 class="m-3 d-flex justify-content-center">Pedido número: <?php echo $orderID ?></h2>

            <!-- Sección de Entrega -->
            <div class="border border-secondary rounded p-3 mb-3">
                <h3>Entrega</h3>
                <p><strong>Estado: </strong><?php echo $result['stateO']; ?></p>
                <p><strong>Fecha: </strong><?php echo $result["dateO"]; ?></p>

                <?php if (isset($_POST['edit_address'])) : ?>
                    <!-- Formulario para editar la dirección de envío -->
                    <form method="post">
                        <p><strong>Dirección de envío: </strong><input type="text" name="address" value="<?php echo $result['addressO']; ?>"></p>
                        <button type="submit" name="save_address" class="btn btn-primary">Guardar</button>
                        <button type="submit" name="cancel_edit" class="btn btn-secondary">Cancelar</button>
                    </form>
                <?php else : ?>
                    <!-- Mostrar la dirección de envío actual y el botón para editar -->
                    <p><strong>Dirección de envío: </strong><?php echo $result["addressO"]; ?></p>
                    <form method="post">
                        <?php if ($result["stateO"] == "pendiente" || $result["stateO"] == "en proceso") : ?>
                            <td>
                                <button type="submit" name="edit_address" class="btn btn-secondary">Editar</button>
                            </td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                    </form>
                <?php endif; ?>
            </div>


            <!-- Sección de Contacto -->
            <div class="border border-secondary rounded p-3 mb-3">
                <h3>Contacto</h3>
                <?php foreach ($users as $user) : ?>
                    <p><strong>Nombre: </strong><?php echo $user['userName'] ?></p>
                    <p><strong>Apellido: </strong><?php echo $user['sur'] ?></p>


                    <?php if (isset($_POST['edit_email'])) : ?>
                        <!-- Formulario para editar Email -->
                        <form method="post">
                            <p><strong>Email</strong><input type="text" name="email" value="<?php echo $user['em'];  ?>"></p>
                            <button type="submit" name="save_email" class="btn btn-primary">Guardar</button>
                            <button type="submit" name="cancel_edit" class="btn btn-secondary">Cancelar</button>
                        </form>
                    <?php else : ?>
                        <!-- Mostrar la dirección de envío actual y el botón para editar -->
                        <p><strong>Email: </strong><?php echo $user['em']; ?></p>
                        <form method="post">
                            <?php if ($result["stateO"] == "pendiente" || $result["stateO"] == "en proceso") : ?>
                                <td>
                                    <button type="submit" name="edit_email" class="btn btn-secondary">Editar</button>
                                </td>
                            <?php else : ?>
                                <td></td>
                            <?php endif; ?>

                        </form>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>

            <!-- Sección de Pago -->
            <div class="border border-secondary rounded p-3 mb-3">
                <h3>Pago</h3>
                <p><strong>Método de pago: </strong><?php echo $result["paymentMethodO"]; ?></p>
                <p><strong>Importe (€): </strong><?php echo $result["amountO"]; ?></p>
            </div>
        <?php break;
        endif; ?>
    <?php endforeach; ?>
</div>

<?php
// Si se ha enviado el formulario para guardar la nueva dirección de envío
if (isset($_POST['save_address'])) {
    // Obtener la nueva dirección de envío
    $new_address = $_POST['address'];

    // Actualizar la dirección de envío en la base de datos
    $orderDAO->UpdateAddress($orderID, $new_address);

    // Redirigir a la misma página para mostrar la nueva dirección de envío
    header('Location: orders.php');
    exit();
}

// Si se ha enviado el formulario para guardar la nueva dirección de envío
if (isset($_POST['save_email'])) {
    // Obtener la nueva dirección de envío
    $new_email = $_POST['email'];

    // Actualizar la dirección de envío en la base de datos
    $userDAO->UpdateEmail($userID, $new_email);

    // Redirigir a la misma página para mostrar la nueva dirección de envío
    header('Location: orders.php');
    exit();
}

// Si se ha enviado el formulario para cancelar la edición
if (isset($_POST['cancel_edit'])) {
    // Redirigir a la misma página para mostrar la dirección de envío actual
    header('Location: orders.php');
    exit();
}
?>



<?php
//end:
$content = ob_get_clean();
require_once INCLUDES_ROOT . '/templates/default_template.php';
?>