<?php

$addAlert = "";

if (!empty($_POST['id_prod']) && $_POST['quantity'] > 0 && !empty($_POST['purchase_price']) && !empty($_POST['purchase_price'])){

	$date = $_POST['date'];
	$date = implode("-",array_reverse(explode("/",$date)));

	$entries = new Entries(); 
	$newEntries = $entries->addEntries($_POST['id_prod'], $_POST['purchase_price'], $_POST['quantity'], $date);
	
	if ($newEntries == false){
		$addAlert = "<div class='alert alert-danger alert-dismissible'>
						<button type='button' class='close' data-dismiss='alert'>&times;</button>
						<strong>Erro!</strong> Produto informado já cadastrado. 
					</div>";
	} else {
		header("location: stock.php");
	}
}
?>

