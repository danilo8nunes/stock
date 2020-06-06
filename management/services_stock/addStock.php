<?php

$addAlert = "";

if (!empty($_POST['id_prod']) && $_POST['quantity'] > 0 && !empty($_POST['purchase_price']) && !empty($_POST['purchase_price'])){

	$date = format_currency_date_int($_POST['date']);
	$price = convert_currency_usd($_POST['purchase_price']);
	echo $date;
	$entries = new Entries(); 
	$newEntries = $entries->addEntries($_POST['id_prod'], $price, $_POST['quantity'], $date);
	
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

