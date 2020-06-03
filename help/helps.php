<?php

/**
 * Formata moeda padrão USD para o padrão BRL
 *
 * @param  float $number
 * @return string
 */
function format_currency_brl($number) {
	return number_format($number, 2, ',', '.');
}

/**
 *  Formata moeda padrão BRL para o padrão USD
 *
 * @param  float $price
 * @return string
 */
function convert_currency_usd($price) {
	return str_replace(['.', ','], ['', '.'], $price);
}

/**
 * Formada data padrão internacional para BR
 *
 * @param  string $date
 * @return string
 */
function format_currency_date_br($date) {
	return implode("/", array_reverse(explode("-", $date)));
}

/**
 * Formada data padrão BR para internacional
 *
 * @param  string $date
 * @return string
 */
function format_currency_date_int($date) {
	return implode("-",array_reverse(explode("/",$date)));
}
