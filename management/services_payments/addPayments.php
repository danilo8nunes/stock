<?php
     
if(!empty($_GET['id_prod'])) {
    if(empty($_SESSION['shop'])) {
        $_SESSION['shop'] = array();        
    }
    if (!in_array($_GET['id_prod'], $_SESSION['shop'])) {
        array_push($_SESSION['shop'], $_GET['id_prod']);
    }
}

if(!empty($_SESSION['shop'])) {
    $id = implode(",", $_SESSION['shop']); 

    $shop = new Payments();
    $shop = $shop->addCart($id);
}