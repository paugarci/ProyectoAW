<?php
include 'database.php';
include 'includes/DAO/DAO.php';
include 'includes/DAO/ProductDAO.php';
include 'includes/comun/header.php';

$database = new Database;
$productModel = new ProductDAO($database->getConnection());
$products = $productModel->getAll();
?>

<div class="album py-5">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-3 g-3 justify-content-center align-items-center">
        
      <?php foreach ($products as $product): ?>
        <div class="card m-2">
          <img src="img/productos/<?= $product["img_name"] ?>" class="card-img-top object-fit-contain" style="height: 300px;">
          <div class="card-body text-center">
            <hr class="my-1">
            <a href="#"><h5 class="card-title"><?= $product["title"] ?> </h5></a>
          </div>
        </div>
      <?php endforeach ?>

      </div>
    </div>
  </div>

<?php include "includes/comun/footer.php"; ?>