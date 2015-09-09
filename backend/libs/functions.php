<?php

// Déclaration des fonctions utiles pour ce fichier .php
function addition($op1, $op2) {
	return $op1 + $op2;
}

function soustraction($op1, $op2) {
	return $op1 - $op2;
}

function multiplication($op1, $op2) {
	return $op1 * $op2;
}

function division($op1, $op2) {
	return $op1 / $op2;
}

function moyenne($values) {
	return division(somme($values), count($values));
}

//$mesValeurs = array(6, 4, 3, 5);
//echo moyenne($mesValeurs); //résultat = 4.5

function somme($values) {
	// Initialisation du résultat à zéro
	$r = 0;
	
	// Additionner un nombre n de fois le précédent résultat avec la valeur courante du tableau
	for ($i=0; $i<count($values); $i++) {
		$r = $r + $values[$i];
	}
	
	return $r;
}

//$mesValeurs = array(2, 5, 17, 24, 1, 1, 2);
//echo somme($mesValeurs); //résultat = 52








