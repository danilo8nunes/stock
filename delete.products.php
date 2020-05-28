<?php
require "class.php";

if (!empty($_GET['id'])) {
	$product = new Products();
	$product->delProducts($_GET['id']);
}
    header("location: products.php");
?>