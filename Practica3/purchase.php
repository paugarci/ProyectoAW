<?php

use es\ucm\fdi\aw\DAO\OrderDAO;
use es\ucm\fdi\aw\DAO\UserOrderDAO;
use es\ucm\fdi\aw\DAO\UserDAO;
use es\ucm\fdi\aw\forms\UpdateOrderForm;
use es\ucm\fdi\aw\DAO\ProductDAO;

require_once 'includes/config.php';





$orderDAO = new OrderDAO;

$userOrderDAO = new UserOrderDAO;



$productID = $_GET["productID"];
$productDAO = new ProductDAO;
$productDTOResults = $productDAO->read($productID);

$product = $productDTOResults[0];

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
      <?php foreach ($users as $user): ?>
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
        <p><strong>Total:</strong> <?= number_format($product->getPrice(), 2) ?> €</p>
         <button type="submit" name="buy" class="btn btn-success">Comprar</button>
        
      </div>
    </div>
  </div>
</form>
</div>


<?php
if(isset($_POST['buy'])) {
    $dir = $_POST['direccion'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $new_email = $_POST['email'];
    $metodo = $_POST['metodo_pago'];
    $price = number_format($product->getPrice(), 2);
    $date = date('Y-m-d');

    
    $orderDAO->InsertOrder($price, $metodo, $dir, $date);

    
    // Obtener el ID del order recién insertado
    $order_id = $orderDAO->getLastInsertID();

    // Insertar en otra tabla utilizando el ID del order
    $userOrderDAO->insert($userID, $order_id);

    $userDAO->UpdateContact($userID, $nombre, $apellido, $new_email);


   
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
