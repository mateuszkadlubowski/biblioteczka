<?php
include 'function/f_mysql.php';
$connect = connect();
$query = "SELECT tytul, autor, gatunek, ISBN FROM zbior ORDER BY tytul ASC";
$result = query($connect, $query);
$connect -> close();
?>

<h2>Wszystkie zmagazynowane zasoby: [A-Z]</h2>
<p>
	<table>
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
			echo "</tr>";
		}
		?>
	</table>
</p>
