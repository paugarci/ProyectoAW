<?php

use es\ucm\fdi\aw\DAO\ProductDAO;
use es\ucm\fdi\aw\DAO\ReviewsDAO;
use es\ucm\fdi\aw\DAO\UserReviewDAO;
use es\ucm\fdi\aw\DAO\UserDAO;

require_once 'includes/config.php';

ob_start();

$productID = $_GET["productID"];

//Products
$productDAO = new ProductDAO;
$user = new UserDAO;

$productDTOResults = $productDAO->read($productID);
$productsPath = 'images/products/';
$error = "";

//User Intermediate
$userReviewDAO = new UserReviewDAO;

//User
$user = new UserDAO;
//$role = $user->getUserRoles($_SESSION["user"]->getID())[0]->getRoleName();

//Reviews
$reviewsDAO = new ReviewsDAO;
$reviewsDTOResults = $reviewsDAO->read();

if (isset($_GET["offer"])) {
    if ($_GET["offer"] < 0 || $_GET["offer"] > 100) {
        $title = "Descuento imposible de aplicar";

        $error = <<<HTML_ERROR
            <div class="alert alert-danger m-2 text-center">
                El descuento debe estar en un rango de 0-100
            </div>'; 
            HTML_ERROR;
    } else {
        $offer = $_GET["offer"];
        $productDTOResults[0]->setOffer($offer);
        $price = $productDTOResults[0]->getPrice();
        $price = $price - ($price * $productDTOResults[0]->getOffer()) / 100;
        $productDTOResults[0]->setOfferPrice($price);
        $productDAO->update($offer);
    }
}

if (isset($_POST['quantity'])) {
    $quantity = $_POST['quantity'];
    echo "Cantidad: " . $quantity;

    if (isset($_SESSION['cart'][$productID])) {
        $_SESSION['cart'][$productID]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$productID] = array('quantity' => $quantity);
    }
    header('Location: product.php?productID=' . $productDTO->getID());
    exit;
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
}
$error
?>
<div class="container">
    <div class="row m-3 p-4 d-flex flex-row shadow">
        <div class="col col-md-6 d-flex flex-col">
            <img class="img-fluid object-fit-contain" src="<?= $productsPath . $product->getImgName(); ?>">
        </div>
        <div class="col col-md-6">
            <div class="d-flex justify-content-start">
                <h3> <?= $product->getName() ?> </h3>
            </div>
            <hr class="mt-2">
            <?php if ($product->getOffer() != 0) : ?>
                <h3><?= number_format($product->getOfferPrice(), 2) ?>€</h3>
                <h5 class="text-decoration-line-through text-danger"><?= number_format($product->getPrice(), 2) ?>€</h5>
            <?php else : ?>
                <h3><?= $product->getPrice() ?>€</h3>
            <?php endif ?>
            <?php if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == true) :  ?>
                <form action="product.php" method="get">
                    <div class="form-floating">
                        <textarea class="form-control" id="floatingTextarea" name="offer"></textarea>
                        <label for="floatingTextarea">Introduce el descuento</label>
                        <input type="hidden" name="productID" value="<?= $productID ?>"><!-- Esto es para que envie al .php el id del arma-->
                        <button class="btn btn-primary" id="apply-offer">Aplicar Descuento</button>
                    </div>
                </form>
            <?php endif ?>
            <div class="buttons py-3">
            <a class="btn btn-primary" href="purchase.php?productID=<?php echo $productID; ?>">Buy Now</a>
                <form class="py-3" action="" method="post">
                    <label class="label-form" for="quantity"> Cantidad:</label>
                    <div class="form-group">
                        <input type="number" id="quantity" name="quantity" min="1" max="100">
                        <input type="hidden" name="productID" value="<?= $productID ?>"><!-- Esto es para que envie al .php el id del arma-->
                        <button class="btn btn-outline-primary" id="add-to-cart">Añadir al carro</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-5 py-2">
            <?= $product->getDescription() ?>
        </div>
        
        <h2 id="reviews">Reseñas (<?= count($reviewsDTOResults) ?>)</h2>
            <?php foreach ($reviewsDTOResults as $review): ?>
                <div class="card m-1 ps-4 pt-2 pb-2">
                    <?php $user = $userReviewDAO->getUserReviews($review->getID())[0] ?>
                    <div class="row">
                        Usuario: <?= $user->getName() ?> <?= $user->getSurname() ?>
                    </div>
                    <div class="row">
                        Comentario: <?= $review->getComment() ?>
                    </div>
                    <div class="row">
                        Valoración: <?= $review->getReview() ?>
                    </div>
                    <div class="row">
                        Fecha: <?= $review->getDate() ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <?= ($reviewForm = new es\ucm\fdi\aw\forms\ReviewForm($productID))->handleForm(); ?>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once PROJECT_ROOT . '/includes/templates/default_template.php';
?>
