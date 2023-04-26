<?php

use es\ucm\fdi\aw\DAO\OrderDAO;
use es\ucm\fdi\aw\DAO\UserOrderDAO;
use es\ucm\fdi\aw\DAO\UserProductDAO;
use es\ucm\fdi\aw\DAO\UserDAO;
use es\ucm\fdi\aw\DAO\ProductDAO;

require_once 'includes/config.php';

$orderDAO = new OrderDAO;
$userDAO = new UserDAO;
$userOrderDAO = new UserOrderDAO;
$prodDAO = new ProductDAO;
$userProductDAO = new UserProductDAO;
$productsPath = 'images/products/';
$cartCount = 0;


if (isset($_GET["subtotal"])){
    $subtotal = $_GET["subtotal"];
    $my_array = array();

    $uID = $_SESSION["user"]->getID();
    $my_array = $userProductDAO->getUserCart($uID);

    $cartCount = count($my_array);

    
    


} else {
    $productID = $_GET["productID"];
    $productDAO = new ProductDAO;
    $productDTOResults = $productDAO->read($productID);
    
    $product = $productDTOResults[0];
    
    $url = "product.php?productID=" . $product->getID();
}
ob_start();
?>

<div class="flex-fill p-3">
    <?php if (!isset($_SESSION['user'])) : ?>
        <div class="alert alert-warning">
            Debes identificarte para acceder a esta página.
        </div>

    <?php else : ?>
        <?php $userID = $_SESSION['user']->getID();
        $userDAO = new UserDAO;
        $users = $userDAO->getContact($userID); ?>
        <div class="container">
            <form method="post">
                <h2 class="m-3 d-flex justify-content-center">Tramitar pedido</h2>
                <div style="display: flex;">
                    <!-- Sección de Entrega -->
                    <div style="width: 65%;">
                        <div class="border rounded p-3 mb-3">
                            <h3><strong>Entrega</strong></h3>
                            <label for="direccion"><strong>Dirección de envío: </strong> </label>
                            <input type="text" id="direccion" name="direccion" value="<?php //echo $result['stateO']; ?>">
                            <br>
                            <br>
                            <label for="fecha"><strong>Fecha de pedido:</strong>&nbsp;</label><?php echo date('Y-m-d'); ?>
                        </div>
                        <!-- Sección de Contacto -->
                        <div class="border rounded p-3 mb-3">
                            <?php foreach ($users as $user) : ?>
                                <h3><strong>Contacto</strong></h3>
                                <label for="nombre"><strong>Nombre: </strong> </label>
                                <input type="text" id="nombre" name="nombre" value="<?php echo $user['userName']; ?>">
                                <br>
                                <br>
                                <label for="apellido"><strong>Apellido: </strong> </label>
                                <input type="text" id="apellido" name="apellido" value="<?php echo $user['sur']; ?>">
                                <br>
                                <br>
                                <label for="email"><strong>Email: </strong> </label>
                                <input type="text" id="email" name="email" value="<?php echo $user['em']; ?>">
                            <?php endforeach; ?>
                        </div>
                        <!-- Sección de Pago -->
                        <div class="border rounded p-3 mb-3">
                            <h3><strong>Pago</strong></h3>
                            <label for="metodo_pago"><strong>Método de pago: </strong> </label>
                            <select name="metodo_pago" id="metodo_pago">
                                <option value="Tarjeta Credito">Tarjeta de crédito</option>
                                <option value="Transferencia Bancaria">Transferencia bancaria</option>
                                <option value="Bizum">Bizum</option>
                            </select>
                            <br>
                        </div>
                    </div>
                    <br>
                    <!-- Sección de resumen de pedido -->
                    <div style="width: 30%;">
                        <div class="border rounded p-3 mb-3">
                            <h3><strong>Resumen de pedido</strong></h3>
                            <?php if (!isset($subtotal)) : ?>                                                              
                                <table>
                                    <tr>
                                        <td><strong>x1</strong></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td><a href="<?php echo $url; ?>"><img class="img-fluid" style="width: 120px;" src="<?= $productsPath . $product->getImgName(); ?>"></a></td>
                                    </tr>
                                </table>
                            <?php else : ?>
                                <table>
                                    <?php foreach ($my_array as $userProduct) { ?>
                                        <tr>
                                            <td><strong>x<?php echo $userProduct->getAmount(); ?></strong></td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <?php if ($userProduct->getID1() == $uID) {
                                                $producto = $prodDAO->read($userProduct->getID2())[0];
                                            }?>
                                            
                                            <td><a href="<?php echo $url; ?>"><img class="img-fluid" style="width: 120px;" src="<?= $productsPath . $producto->getImgName(); ?>"></a></td>
                                            <?php } ?>
                                            
                                            
                                        </tr>
                                    
                                </table>                                    
                            <?php endif; ?>

                            <p><strong>Total:</strong> 
                            
                                <?php if (!isset($subtotal)) : 
                                echo number_format($product->getPrice(), 2) ?> 
                                <?php else : echo $subtotal ?><?php endif; ?>
                                €</p>
                            
                            <button type="submit" name="buy" class="btn btn-success">Comprar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <?php
        if (isset($_POST['buy'])) {
            $dir = $_POST['direccion'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $new_email = $_POST['email'];
            $metodo = $_POST['metodo_pago'];
            $date = date('Y-m-d');
            if (!isset($subtotal)){
                $price = number_format($product->getPrice(), 2);
                $orderDAO->InsertOrder($price, $metodo, $dir, $date);
                // Obtener el ID del order recién insertado
                $order_id = $orderDAO->getLastInsertID();
                // Insertar en otra tabla utilizando el ID del order
                $userOrderDAO->insert($userID, $order_id);
                $userDAO->UpdateContact($userID, $nombre, $apellido, $new_email); 
            }
            else{
                $price = $subtotal;
                $orderDAO->InsertOrderCart($price, $metodo, $dir, $date, $cartCount);
                $order_id = $orderDAO->getLastInsertID();
                $userOrderDAO->insert($userID, $order_id);
                $userDAO->UpdateContact($userID, $nombre, $apellido, $new_email);
                $userProductDAO->deleteCart();
            }
            header('Location: orders.php');
            exit();
        }
        ?>

    <?php endif; ?>
</div>

<?php
//end:
$content = ob_get_clean();
require_once INCLUDES_ROOT . '/templates/default_template.php';
?>