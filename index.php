<?php

$page = htmlspecialchars($_GET['page']);
$pageTab = array('', '/', 'home', 'show', 'add', 'manage');
if (in_array($page, $pageTab)) {
	if ($page == '' || $page == '/') {
		$content = 'home.php';
	} else {
		$content = $page . '.php';
	}
} else {
	$content = 'error.php';
}
include 'template.php';
