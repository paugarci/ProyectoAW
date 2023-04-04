<?php
use es\ucm\fdi\aw\DAO\ProductDAO;
require_once 'includes/config.php';

$title = $product->getName();
?>

<?php ob_start(); ?>

$productID = $_GET["productID"];

$productDAO = new ProductDAO;
$productDTOResults = $productDAO->read($productID)[0];

<?php $content = ob_get_clean(); ?>

<?php require_once PROJECT_ROOT . '/includes/templates/default_template.php'; ?>