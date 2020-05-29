<?php
require "../../class/products.php";

$deleteAlert = "";

if (!empty($_GET['id'])) {
	$product = new Products();
	$product = $product->delProducts($_GET['id']);

	if ($product == false ){
		$deleteAlert = "<div class='alert alert-danger alert-dismissible'>
							<button type='button' class='close' data-dismiss='alert'>&times;</button>
							<strong>Erro!</strong> Produto informado possui entrada(s) em estoque. 
						</div>";
	}
}
    header("location: ../../pages/products.php");
?>