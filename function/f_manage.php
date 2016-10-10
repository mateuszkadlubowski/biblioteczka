<?php

function del($connect, $id) {
	$query = "SELECT tytul, autor, gatunek, ISBN FROM zbior WHERE id='" . $id . "' LIMIT 1";
	$result = query($connect, $query);
	$wiersz = $result -> fetch_assoc(); 
	echo "
		<h2>Czy usunąć element?</h2>
		<form method='POST'>
			Tytuł: " . $wiersz['tytul'] . "<br>Autor: " . $wiersz['autor'] . '<br>Gatunek: ' . $wiersz['gatunek'] . '<br>ISBN: ' . $wiersz['ISBN'] ."<br><br>
			<button name='delYes' value='" . $id . "'>Tak</button>
			<button name='delNo'>Nie</button>
		</form>
		";
}

function delYes($connect, $id){
	$query = "DELETE FROM zbior WHERE id='" . $id . "' LIMIT 1";
	$result = query($connect, $query);
}

function edit($connect, $id){
	$query = "SELECT id, tytul, autor, gatunek, ISBN FROM zbior WHERE id='". $id ."' LIMIT 1";
	$result = query($connect, $query);
	$val = $result -> fetch_assoc();
	formularzEdycji($val); // wyświetla formularz edycji
}

function formularzEdycji($val, $error = false){
	?>
	<h2>Edycja:</h2>
	<form method="POST">
	<label> Tytuł:
		<input type="text" name="tytul" autofocus="on" value="<?php echo $val['tytul']; ?>">
		<span><?echo $error['tytul']; ?></span>
	</label>
	<label> Autor:
		<input type="text" name="autor" value="<?php echo $val['autor']; ?>">
		<span><?echo $error['autor']; ?></span>
	</label>
	<label> Gatunek:
		<input type="text" name="gatunek" value="<?php echo $val['gatunek']; ?>">
		<span><?echo $error['gatunek']; ?></span>
	</label>
	<label> ISBN:
		<input type="text" name="ISBN" value="<?php echo $val['ISBN']; ?>">
		<span><?echo $error['ISBN']; ?></span>
	</label>
	<input type="hidden" name="id" value="<?php echo $val['id']; ?>">
<input type="submit" class="button" name="edition" value="Edytuj">
</form>
<?php
}

function edition($connect, $form){
	include 'f_add.php';
	$id = $form['id'];
	$form = translate($form);
	$error = sprawdz($form);
	if(empty($error)){
		$query = "UPDATE zbior SET tytul='".$form['tytul']."', autor='".$form['autor']."',
				gatunek='".$form['gatunek']."', ISBN='".$form['ISBN']."' WHERE id='".$id."'";
		query($connect, $query);
	}else{
		$form['id'] = $id;
	formularzEdycji($form, $error);
	}
}
