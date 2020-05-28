<?php

$addAlert = "";

if (!empty($_POST['name']) && !empty($_POST['price'])){
	$product = new Products(); 
	$newProduct = $product->addProducts($_POST['name'], $_POST['price']);
	
	if ($newProduct == false){
		$addAlert = "<div class='alert alert-danger alert-dismissible'>
						<button type='button' class='close' data-dismiss='alert'>&times;</button>
						<strong>Erro!</strong> Produto informado já cadastrado. 
					</div>";
	} else {
		header("location: products.php");
	}
}
?>