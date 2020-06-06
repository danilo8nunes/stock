<?php

session_start();

if (!empty($_GET['id'])){
    $key = array_search($_GET['id'], $_SESSION['shop']);
    
    if($key!==false){
        unset($_SESSION['shop'][$key]);
    }
}
header("location: ../../pages/payments.php");
