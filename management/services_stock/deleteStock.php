<?php
require "../../class/entries.php";

$deleteAlert = "";

if (!empty($_GET['id'])) {
	$entries = new Entries();
	$entries = $entries->delEntries($_GET['id'],$_GET['id_prod'],$_GET['quantity']);

	if ($entries == false ){
		$deleteAlert = "<div class='alert alert-danger alert-dismissible'>
							<button type='button' class='close' data-dismiss='alert'>&times;</button>
							<strong>Erro!</strong> Produto informado possui entrada(s) em estoque. 
						</div>";
	}
}
    header("location: ../../pages/stock.php");
?>