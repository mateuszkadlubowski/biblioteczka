<?php
include 'function/f_mysql.php';
include 'function/f_manage.php';
$connect = connect();
if (isset($_POST['del'])) {
	del($connect, $_POST['del']);
} elseif (isset($_POST['delYes'])) {
	delYes($connect, $_POST['delYes']);
} elseif (isset($_POST['edit'])) {
	edit($connect, $_POST['edit']);
} elseif (isset($_POST['edition'])) {
	edition($connect, $_POST);
}
$query = "SELECT id, tytul, autor, gatunek, ISBN FROM zbior ORDER BY tytul ASC";
$result = query($connect, $query);
?>

<h2>Zarządzanie elementami:</h2>
<p>
	<table>
		<form method="POST">
			<thead>
				<td>Tytuł</td>
				<td>Autor</td>
				<td>Gatunek</td>
				<td>ISBN</td>
			</thead>
			<?php
			while ($wiersz = $result -> fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $wiersz['tytul'] . "</td>";
				echo "<td>" . $wiersz['autor'] . "</td>";
				echo "<td>" . $wiersz['gatunek'] . "</td>";
				echo "<td>" . $wiersz['ISBN'] . "</td>";
				echo '<td>
<button value="' . $wiersz['id'] . '" name="edit">Edytuj</button>
<button value="' . $wiersz['id'] . '" name="del">Usuń</button>
</td></tr>';
			}
			?>
		</form>
	</table>
</p>
