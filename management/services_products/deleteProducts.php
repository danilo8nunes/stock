<?php
require "../../class/products.php";

if (!empty($_GET['id'])) {
	$product = new Products();
	$product->delProducts($_GET['id']);
}

    header("location: ../../pages/products.php");
?>