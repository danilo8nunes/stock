<?php 
require "../class/products.php";

$products = new Products();
$products = $products->getProducts();

$appetizer = new Entries();

$exits = new Exits();

if (!empty($_GET['search'])){
    $search = "%".$_GET['search']."%";
    $appetizer = $appetizer->getEntries($search);


    $exits = $exits->getExits($search); 

} else {
    $appetizer = $appetizer->getEntries();
    $exits = $exits->getExits();	
}
