<?php

function translate($form) {
	$formTranslate['tytul'] = htmlspecialchars(trim($form['tytul']));
	$formTranslate['autor'] = htmlspecialchars(trim($form['autor']));
	$formTranslate['gatunek'] = htmlspecialchars(trim($form['gatunek']));
	$formTranslate['ISBN'] = htmlspecialchars(trim($form['ISBN']));
	return $formTranslate;
}

function sprawdz($form) {
	$error = array();
	if (empty($form['tytul'])) {
		$error['tytul'] = 'Pole jest puste.';
	} elseif (strlen($form['tytul']) > 50) {
		$error['tytul'] = 'Za długi (max 50 znaków).';
	}
	if (empty($form['autor'])) {
		$error['autor'] = 'Pole jest puste.';
	} elseif (strlen($form['autor']) > 50) {
		$error['autor'] = 'Za długi (max 50 znaków).';
	}
	if (empty($form['gatunek'])) {
		$error['gatunek'] = 'Pole jest puste.';
	} elseif (strlen($form['gatunek']) > 50) {
		$error['gatunek'] = 'Za długi (max 50 znaków).';
	}
	if (empty($form['ISBN'])) {
		$error['ISBN'] = 'Pole jest puste.';
	} elseif (strlen($form['ISBN']) > 50) {
		$error['ISBN'] = 'Za długi (max 50 znaków).';
	}

	return $error;
}
