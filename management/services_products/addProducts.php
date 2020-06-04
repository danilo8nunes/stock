<?php
$addAlert = "";

if (!empty($_POST['name']) && !empty($_POST['price'])) {
	$price = convert_currency_usd($_POST['price']);
	
	$product = new Products(); 
	$newProduct = $product->addProducts($_POST['name'], $price);
	
	if ($newProduct == false) {
		$_SESSION['alert'] = "<div class='alert alert-danger alert-dismissible'>
						<button type='button' class='close' data-dismiss='alert'>&times;</button>
						<img src='../assets/image/x.png' width='18'> Produto informado já cadastrado. 
					</div>";
 	} else {
		
		header("location: products.php");
	}
} 
if (!empty($_POST['name']) && empty($_POST['price']) || empty($_POST['name']) && !empty($_POST['price'])) {
	$_SESSION['alert'] = "<div class='alert alert-danger alert-dismissible'>
							<button type='button' class='close' data-dismiss='alert'>&times;</button>
							<img src='../assets/image/x.png' width='18'> Identificação do produto ou preço de venda não informado. 
						</div>";
}
