<?php

function format_currency_brl($number) {
	return number_format($number, 2, ',', '.');
}

function dateBR($date) {
	return implode("/", array_reverse(explode("-", $date)));
}

function convert_currency_eua($price) {
	return str_replace(['.', ','], ['', '.'], $price);
}