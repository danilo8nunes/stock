<?php

function format($number) {
	return number_format($number, 2, ',', '.');
}

function dateBR($date) {
	return implode("/", array_reverse(explode("-", $date)));
}
