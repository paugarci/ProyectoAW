<?php

use es\ucm\fdi\aw\DAO\ProductDAO;
use es\ucm\fdi\aw\DAO\UserDAO;
use es\ucm\fdi\aw\DAO\UsersProductsDAO;

require_once 'includes/config.php';

ob_start();

$productID = $_GET["productID"];
$productDAO = new ProductDAO;
$user = new UserDAO;
$role = $user->getUserRoles($_SESSION["user"]->getID())[0]->getRoleName();

$productDTOResults = $productDAO->read($productID);
$productsPath = 'images/products/';
$error = "";

if (isset($_GET["offer"])) {
    if($_GET["offer"] < 0 || $_GET["offer"] > 100){
        $title = "Descuento imposible de aplicar";

        $error = <<<HTML_ERROR
            <div class="alert alert-danger m-2 text-center">
                El descuento debe estar en un rango de 0-100
            </div>'; 
            HTML_ERROR;
    }else{
        $offer = $_GET["offer"];
        $productDTOResults[0]->setOffer($offer);
        $price = $productDTOResults[0]->getPrice();
        $price = $price - ($price * $productDTOResults[0]->getOffer())/100;
        $productDTOResults[0]->setOfferPrice($price);
        $productDAO->updateColumn($productID, "offer", $offer);
    }
}
if(isset($_GET['quantity']) && $_GET['quantity'] != 0) {
    echo "SE INSERTO!!";
    $usersPDAO = new UsersProductsDAO;
    //HAY QUE HACER UN INSERT!!! :)
    //$usersPDAO->updateColumn($_SESSION["user"],$productID,$_POST['quantity']);
    
  }
  
if (count($productDTOResults) == 0) {
    $title = "Producto no encontrado";

    $error = '
        <div class="alert alert-danger m-2 text-center">
            No existe este producto
        </div>';
} else if (count($productDTOResults) > 1) {
    $title = "Producto no encontrado";

    $error = <<<HTML_ERROR
        <div class="alert alert-danger m-2 text-center">
            Hay más de un producto con esta ID
        </div>
    HTML_ERROR;
} else {
    $product = $productDTOResults[0];
    $title = $product->getName();

    $price = strval($product->getPrice());
    $numCharacters = strlen($price);
    $intPart = intval($price);
    $decimalPart = "";
    $decimalPart = (str_contains($price, ".")) ? substr($price, -2) : "00";
}
$error
?>
<div class="container shadow">
    <div class="row m-3 p-4 d-flex flex-row shadow">
        <div class="col col-md-6 d-flex flex-col">
            <img class="shadow" src="<?= $productsPath . $product->getImgName(); ?>">
        </div>
        <div class="col col-md-6">
            <div class="d-flex justify-content-start">
                <h3> <?= $product->getName() ?> </h3>
            </div>
            <hr class="mt-2">
            <?php
                if ($product->getOffer() != 0) {
            ?>
                <h3><?= number_format($product->getOfferPrice(),2)?>€</h3>   
                <h5 class="text-decoration-line-through text-danger"><?= number_format($product->getPrice(),2) ?>€</h5>
            <?php
            } else {
            ?>
                <h3><?=  number_format($product->getPrice(),2) ?>€</h3>
            <?php
            }
            ?>
            <?php if ($role == "admin") {  ?>
                <form action="product.php" method="get">
                    <div class="form-floating">
                    
                        <textarea class="form-control" id="floatingTextarea" name="offer"></textarea>
                        <label for="floatingTextarea">Introduce el descuento</label>
                        <input type="hidden" name="productID" value="<?= $productID ?>"><!-- Esto es para que envie al .php el id del arma-->
                        <button class="btn btn-primary" id="apply-offer">Aplicar Descuento</button>
                    </div>
                    <div>
                </form>


                </div>
            <?php } ?>
            <div class="buttons py-3">
                <!-- AQUI HAY QUE HACER OTRO FORM PARA EL BOTON DE COMPRAR -->
                <button class="btn btn-primary " id="buy-now">Buy Now</button>
                <form class = "py-3" action="product.php" method="get">
                    <label for="quantity"> Cantidad:</label>
                    <div class="form-floating">
                        <input type="hidden" name="productID" value="<?= $productID ?>"><!-- Esto es para que envie al .php el id del arma-->
                        <input  type="number" id="quantity" name="quantity" min="1" max="100">
                        
                        <button class="btn btn-outline-primary" id="add-to-cart">Añadir al carro</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-5"><?= $product->getDescription() ?></div>
    </div>
</div>
<?php
$content = ob_get_clean();
?>

<?php require_once PROJECT_ROOT . '/includes/templates/default_template.php'; ?>