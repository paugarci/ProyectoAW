<?php

use es\ucm\fdi\aw\DAO\ProductDAO;
use es\ucm\fdi\aw\DAO\UsersProductsDAO;
use es\ucm\fdi\aw\DAO\UserDAO;

require_once 'includes/config.php';
$title = 'Carrito';

ob_start();
?>
<?php
$prodDAO = new ProductDAO;
$usersDAO = new UsersProductsDAO;
$productsPath = 'images/products/';
    $subtotal = 0;
    $my_array = array();
    if(isset($_SESSION["user"])){
      $uID = $_SESSION["user"]->getID();
      $my_array = $usersDAO->getUserCart($uID);
    } else if (!empty($_SESSION["carritoTemporal"])){//Hay que crear el carrito a corde al usuario sin registrar
      $uID = -1;
      
      $my_array = $_SESSION["carritoTemporal"];
    }
    if(count( $my_array) == 0){ ?>
    <div class="container text-center shadow p-4">
      <div class="alert alert-danger justify-content-center align-center border" role="alert">
        <b></b> Tu cesta de la compra esta vacía!!
      </div>
    </div>
      <?php
    }else{
      ?> <div class="container text-center shadow p-4">
      <h1 class = "mb-4">Que hay en mi cesta?</h1>
      <div class="row align-items-left border-bottom border-primary todos-Elementos ">
          <?php 
          foreach($my_array as $prod):
              if ($prod->getID1() == $uID):
                $producto = $prodDAO->read($prod->getID2())[0]; 
                $subtotal = $subtotal + ($producto->getPrice() * $prod->getAmount());
                ?>
                  <div class="flex-row p-3 d-flex border-top border-primary ">
                      <p></p>
                      <div class="img-fluid me-4" id="product-img" style="width: 80px; height: 60px; overflow: hidden;"><img class="img-fluid" src="<?= $productsPath . $producto->getImgName(); ?>"></div>
                      <div class= "col justify-content-start d-flex "><p>Nombre del producto: <?= $producto->getName() ?></p></div>
                      
                      
                      <div class="col cart-amount-input" id="<?= $producto->getID() ?>">
                        <select id="<?= $producto->getID() ?>" class="form-select" onchange="updateCart(<?= $producto->getID() ?>, this.value)" >
                        
                          <?php for ($i = 1; $i <= 10; $i++): ?>
                            <option value="<?= $i ?>"<?= ($prod->getAmount() == $i ? ' selected' : '') ?>><?= $i ?></option>
                          <?php endfor; ?>
                        </select>
                      </div>
                      
                      <script type="text/javascript" src="js/updateCart.js">  </script>

                      <div class= "col d-flex justify-content-end"> <p>Precio: <?= $producto->getPrice() * $prod->getAmount() ?></p></div>
                      <div class="col text-end ">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#product-modal-<?= $producto->getID(); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"></path>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"></path>
                            </svg>
                        </button>
                      </div>
                  </div>
                  <?php endif;
          endforeach; ?>
          </div>
          <div class= "col d-flex justify-content-end"> <h1 > Subtotal: <?= $subtotal?></h1> </div>
          <?php
          
          ?>
      </div>
      
      <?php
                
      }
  
  ?>
  <?php


$content = ob_get_clean();


 require_once PROJECT_ROOT . '/includes/templates/default_template.php'; 
  ?>
