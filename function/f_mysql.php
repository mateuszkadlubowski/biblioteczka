<?php

function connect() {
	include ('secure/secure.php');
	$connect = new mysqli($host, $user, $pass, $base);
	if (!(mysqli_connect_errno())) {
		$connect -> query("SET NAMES 'utf8'");
	}
	return $connect;
}

function query($connect, $query) {
	$result = $connect -> query($query);
	if (!$result) { 
		echo "<span class='eror'>Nie można wykonać zapytania.</span>";
		exit;
	}
	return $result;
}
