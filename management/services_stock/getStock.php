<?php 
$products = new Products();
$products = $products->getProducts();


$appetizer = new Entries();

if (!empty($_GET['search'])){
    $search = "%".$_GET['search']."%";
    $appetizer = $appetizer->getEntries($search);

} else {
	$appetizer = $appetizer->getEntries();	
}
?>