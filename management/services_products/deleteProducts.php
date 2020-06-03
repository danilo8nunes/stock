<?php
require "../../class/products.php";

session_start();

if (!empty($_GET['id'])) {
	$product = new Products();
	$product = $product->delProducts($_GET['id']);

	if ($product == true){
		$_SESSION['alert'] = "<div class='alert alert-success alert-dismissible'>
		 						<button type='button' class='close' data-dismiss='alert'>&times;</button>
		 						<img src='../assets/image/ok.png' width='18'> Produto excluido com sucesso
		 					</div>";
	} else {
		$_SESSION['alert'] = "<div class='alert alert-danger alert-dismissible'>
		 						<button type='button' class='close' data-dismiss='alert'>&times;</button>
		 						<img src='../assets/image/x.png' width='18'> Produto informado possui entradas em estoque. 
		 	 				</div>";
	}
	header("location: ../../pages/products.php");
}
    