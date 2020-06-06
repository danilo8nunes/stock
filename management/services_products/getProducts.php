<?php 

$products = new Products();






if (!empty($_GET['search'])){
    $search = "%".$_GET['search']."%";
    $products = $products->getProducts($search);

} else {
    $products = $products->getProducts();
}
