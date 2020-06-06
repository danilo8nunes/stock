<?php

if (!empty($_SESSION['shop'])){
    $keys = array_keys($_SESSION['shop']); //captura as chaves corretas, sá que se houver exclusão(s) algumas chaves ficam fazias
    $lengthKart = count($keys);            //conta quantos produtos estão no carrinho

    for ($i=0; $i < $lengthKart; $i++) { //captura id de cada produto
        $idProd = $_SESSION['shop'][$keys[$i]];

        if(!empty($_POST[$idProd])){
            $date = date("Y-m-d");
            $saleProduct = new Payments();

            $saleProduct = $saleProduct->addExits($idProd, $_POST[$idProd] , $date);
            
            if ($saleProduct) {
                unset($_SESSION['shop'][$keys[$i]]);
                header("location: payments.php");
            }

            else {
            //    echo "Aviso de Erro";
            }
               
        }
    }
}