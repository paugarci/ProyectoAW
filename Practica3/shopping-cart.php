<?php

use es\ucm\fdi\aw\DAO\ProductDAO;

require_once 'includes/config.php';

ob_start();

$productID = $_GET["productID"];
$uID = $_SESSION["user"]->getID();
echo "ID Producto: " . $productID;
echo "ID Usuario" . $uID;
  if(isset($_SESSION['cart'])){
    $total = 0;
    echo '<ul>';
    foreach($_SESSION['cart'] as $productID => $product){
      $productDAO = new ProductDAO;
      $productDTO = $productDAO->getByID($productID);
      $subtotal = $product['quantity'] * $productDTO->getPrice();
      $total += $subtotal;
      echo '<li>' . $productDTO->getName() . ' x ' . $product['quantity'] . ' = ' . $subtotal . ' € <a href="remove_item.php?id=' . $productID . '">Eliminar</a></li>';
    }
    echo '</ul>';
    echo '<p>Total: ' . $total . ' €</p>';
  } else {
    echo '<p>No hay productos en el carrito.</p>';
  }
    
  require_once PROJECT_ROOT . '/includes/templates/default_template.php';
  ?>