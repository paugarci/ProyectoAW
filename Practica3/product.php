<?php

use es\ucm\fdi\aw\DAO\ProductDAO;
use es\ucm\fdi\aw\DAO\UserDAO;

require_once 'includes/config.php';

ob_start();

$productID = $_GET["productID"];
$productDAO = new ProductDAO;
$user = new UserDAO;
$role = "guest";
if(isset($_SESSION["user"])){
    $role = $user->getUserRoles($_SESSION["user"]->getID())[0]->getRoleName();
}
$productDTOResults = $productDAO->read($productID)[0];
$productsPath = 'images/products/';
$error = "";

// if(isset($_POST['quantity'])) {
//     $quantity = $_POST['quantity'];
//     echo "Cantidad: " . $quantity;
    
//     if(isset($_SESSION['cart'][$productID])){
//       $_SESSION['cart'][$productID]['quantity'] += $quantity;
//     } else {
//       $_SESSION['cart'][$productID] = array('quantity' => $quantity);
//     }
//     header('Location: product.php?productID='.$productDTO->getID());
//     exit;
//   }
  
if (isset($productDTOResults)) {
    $product = $productDTOResults;
    $title = $product->getName();

    $price = strval($product->getPrice());
    $numCharacters = strlen($price);
    $intPart = intval($price);
    $decimalPart = "";
    $decimalPart = (str_contains($price, ".")) ? substr($price, -2) : "00";
}
$error
?>
<div class="container">
    <div class="row m-3 p-4 d-flex flex-row shadow">
        <div class="col col-md-6 d-flex flex-col">
            <img class="img-fluid object-fit-contain" src="<?= $productsPath . $product->getImgName(); ?>">
        </div>
        <div class="col col-md-6 ">
            <div class="d-flex justify-content-start">
                <h3> <?= $product->getName() ?> </h3>
            </div>
            <hr class="mt-2">
            <?php
                if ($product->getOffer() != 0) {
            ?>
                <?php
                    if ($product->getOffer() ==100) {
                ?>
                <div class="row ">
                    <h3 class ="col md-5 ms-3"><?= number_format($product->getOfferPrice(),2)?>€</h3>   
                    <h3 class="text-decoration text-success col md-5"> GRATIS! </h3>
                    <h5 class="text-decoration-line-through text-danger row m-3"><?= number_format($product->getPrice(),2) ?>€</h5>
                    </div>
                <?php } else { ?>
                    <h3><?= number_format($product->getOfferPrice(),2)?>€</h3>   
                    <h5 class="text-decoration-line-through text-danger"><?= number_format($product->getPrice(),2) ?>€</h5>
                <?php } ?>
            <?php } else { ?>
                <h3><?=  number_format($product->getPrice(),2) ?>€</h3>
            <?php } ?>
            <div class="d-flex flex-row">
                <?php if ($role == "admin"): ?>
                    <?= ($offerForm = new es\ucm\fdi\aw\forms\OfferForm($productID))->handleForm(); ?>
                <?php endif ?>
            </div>
            <div class="buttons py-3">
                <button class="btn btn-primary " id="buy-now">Buy Now</button>
                <?php if(!isset($_SESSION["user"])){ ?>
                    <?= ($cartForm = new es\ucm\fdi\aw\forms\CartForm(null,$productID))->handleForm(); ?>
                <?php } else { ?>
                    <?= ($cartForm = new es\ucm\fdi\aw\forms\CartForm($_SESSION["user"]->getID(),$productID))->handleForm(); ?>
                <?php } ?>
            </div>
        </div>
        <div class="mt-5"><?= $product->getDescription() ?></div>
    </div>
</div>
<?php
$content = ob_get_clean();
?>

<?php require_once PROJECT_ROOT . '/includes/templates/default_template.php'; ?>