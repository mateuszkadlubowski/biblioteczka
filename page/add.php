<?php
if (isset($_POST['add'])) {
	include 'function/f_add.php';
	$form = translate($_POST);
	$error = sprawdz($form);
	if (empty($error)) {
		include 'function/f_mysql.php';
		$connect = connect();
		$query = "INSERT INTO zbior (tytul, autor, gatunek, ISBN)
		VALUES ('" . $form['tytul'] . "', '" . $form['autor'] . "', '" . $form['gatunek'] . "', '" . $form['ISBN'] . "')";
		$result = query($connect, $query);
		echo "
			<h2>Dodano element</h2>
			<p>
				Tytuł: " . $form['tytul'] . "<br>Autor: " . $form['autor'] . '<br>Gatunek: ' . $form['gatunek'] . '<br>ISBN: ' . $form['ISBN'] . "<br><br> 
			</p>
			";
		$connect -> close();
	}
}
?>

<h2>Dodawanie treści:</h2>
<form method="POST">
	<label> Tytuł:
		<input type="text" name="tytul" autofocus="on" >
		<span><?echo $error['tytul']; ?></span> </label>
	<label> Autor:
		<input type="text" name="autor">
		<span><?echo $error['autor']; ?></span></label>
	<label> Gatunek:
		<input type="text" name="gatunek">
		<span><?echo $error['gatunek']; ?></span></label>
	<label> ISBN:
		<input type="text" name="ISBN">
		<span><?echo $error['ISBN']; ?></span></label>
	<input type="submit" class="button" name="add" value="Dodaj">
</form>
