<?php

use es\ucm\fdi\aw\DAO\ProductDAO;
use es\ucm\fdi\aw\DAO\UsersProductsDAO;
use es\ucm\fdi\aw\DAO\UserDAO;

require_once 'includes/config.php';

ob_start();
?>
<div>
<?php
$uID = $_SESSION["user"]->getID();
echo "ID Usuario" . $uID;
$prodDAO = new ProductDAO;


$usersDAO = new UsersProductsDAO;

$usersDTO = $usersDAO->read();
echo "<p></p> ";
foreach($usersDTO as $prod){
  if ($prod->getUserID() == $uID){
    echo "Producto: " . $prod->getProductID();
    $prodNombre = $prodDAO->read($prod->getProductID())[0]->getName();
    echo "<p></p> ";
    echo " Nombre del producto: " . $prodNombre;
    echo "<p></p> ";
  }
}

  // if(isset($_SESSION['cart'])){
  //   $total = 0;
  //   echo '<ul>';
  //   foreach($_SESSION['cart'] as $productID => $product){
      
      
  //     $subtotal = $product['quantity'] * $productDTO->getPrice();
  //     $total += $subtotal;
  //     echo '<li>' . $productDTO->getName() . ' x ' . $product['quantity'] . ' = ' . $subtotal . ' € <a href="remove_item.php?id=' . $productID . '">Eliminar</a></li>';
  //   }
  //   echo '</ul>';
  //   echo '<p>Total: ' . $total . ' €</p>';
  // } else {
  //   echo '<p>No hay productos en el carrito.</p>';
  // }
  ?>
  </div>
<?php

$content = ob_get_clean();


 require_once PROJECT_ROOT . '/includes/templates/default_template.php'; 
  ?>