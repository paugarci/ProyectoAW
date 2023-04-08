<?php

use es\ucm\fdi\aw\DAO\ProductDAO;
use es\ucm\fdi\aw\DAO\UserDAO;

require_once 'includes/config.php';

$productDAO = new ProductDAO;
$productDTOresults = $productDAO->read();
$productsPath = 'images/products/';

if (isset($_SESSION["user"])) {
    $userDAO = new UserDAO;
    $userRoles = $userDAO->getUserRoles($_SESSION["user"]->getID());

    foreach ($userRoles as $role)
        if ($role->getRoleName() == "admin")
            $isAdmin = true;
}

ob_start();
?>

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
    <?php if (isset($isAdmin)): ?>
    <div class="d-flex justify-content-end mb-4">
        <a class="btn btn-primary text-center" href="add-product.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
            </svg>
            Añadir producto
        </a>
    </div>
    <?php endif ?>
</div>

<style>
    #product-img {
        transition: all 0.3s;
    }

    #product-img:hover {
        transform: scale(1.05);
    }
</style>

<?php
$title = 'Productos';
$content = ob_get_clean();

require_once PROJECT_ROOT . '/includes/templates/default_template.php';
?>