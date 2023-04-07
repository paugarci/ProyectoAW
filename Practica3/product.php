<?php
use es\ucm\fdi\aw\DAO\ProductDAO;
require_once 'includes/config.php';

ob_start();

$productID = $_GET["productID"];

$productDAO = new ProductDAO;
$productDTOResults = $productDAO->read($productID);

if(count($productDTOResults) == 0)
{
    $title = "Producto no encontrado";

    echo <<<HTML_ERROR
        <div class="alert alert-danger m-2 text-center">
            No existe este producto
        </div>
    HTML_ERROR;
}
else if(count($productDTOResults) > 1)
{
    $title = "Producto no encontrado";

    echo <<<HTML_ERROR
    <div class="alert alert-danger m-2 text-center">
        Hay más de un producto con esta ID
    </div>
HTML_ERROR;
}
else
{
    $product = $productDTOResults[0];
    $title = $product->getName();
}
?>



<?php
$content = ob_get_clean();
?>

<?php require_once PROJECT_ROOT . '/includes/templates/default_template.php'; ?>