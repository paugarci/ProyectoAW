<?php

use es\ucm\fdi\aw\DAO\ProductDAO;
use es\ucm\fdi\aw\DAO\reviewsDAO;

require_once 'includes/config.php';

$productDAO = new ProductDAO;
$productDTOresults = $productDAO->read();
$productsPath = 'images/products/';

?>

<?php ob_start(); ?>

<div class="container">
  <div class="row justify-content-center m-3">
    <?php foreach ($productDTOresults as $productDTO) : ?>
      <div class="card m-2 shadow d-flex flex-col h-auto" style="width: 300px;">
        <div class="d-flex flex-fill" id="product-img">
          <img class="img-fluid object-fit-contain" src="<?= $productsPath . $productDTO->getImgName(); ?>">
        </div>
        <hr class="my-3">
        <div class="text-start">
          <form action="product.php" method="get">
            <input type="hidden" name="productID" value="<?= $productDTO->getID() ?>">
            <button type="submit" class="btn btn-link text-dark text-decoration-none"><?= $productDTO->getName(); ?></button>
          </form>
        </div>
        <div class="text-start ms-3">
          <div class="text-black text-decoration-none">
            <?php
            $price = strval($productDTO->getPrice());
            $numCharacters = strlen($price);
            $intPart = intval($price);
            $decimalPart = "";

            $decimalPart = (str_contains($price, ".")) ? substr($price, -2) : "00";
            ?>
            <b class="fs-2"><?= $intPart ?></b><sup class="fs-5"><?= $decimalPart ?>
          </sup><b class="fs-2"> €</b>
          </div>
        </div>
        <br>
      </div>
    <?php endforeach ?>
  </div>
</div>

<style>
    #product-img {
        transition: all 0.3s;
    }

    #product-img:hover {
        transform: scale(1.1);
    }
</style>

<?php
$title = 'Productos';
$content = ob_get_clean();

require_once PROJECT_ROOT . '/includes/templates/default_template.php';
?>
