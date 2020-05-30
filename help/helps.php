<?php

function format($number){
	$money = "R$ ".number_format($number, 2, ',', '.');

	return $money;
}

function dateBR($date){
	$dateBR = implode("/",array_reverse(explode("-",$date)));

	return $dateBR;

	}
?>