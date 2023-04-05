<!DOCTYPE html>
<html>
<head>
	<title>Filter Table</title>
</head>
<body>
	<h1>Filter Table</h1>
    <form action="" method="POST">
	<label for="status">Filter by Status:</label>
	<select name="status" id="status">
		<option value="">All</option>
		<option value="1">AKTIF</option>
		<option value="2">CADANGAN/DALAM PERBAIKAN</option>
		<option value="0">TIDAK BEROPERASI</option>
	</select>
	<label for="total_km">Total KM:</label>
	<select name="total_km" id="total_km">
		<option value="">All</option>
		<option value="ASC">Ascending</option>
		<option value="DESC">Descending</option>
	</select>
	<input type="submit" name="filter" value="Filter">
</form>

<br>

<?php
	include "koneksi.php";

	if(isset($_POST['filter'])) {
		$status = $_POST['status'];
		$total_km = $_POST['total_km'];
		if($status != "") {
			$query = mysqli_query($koneksi, "SELECT bus.id_bus, bus.plat, bus.status, SUM(trans_upn.jumlah_km) AS total_km FROM bus LEFT JOIN trans_upn ON bus.id_bus = trans_upn.id_bus WHERE bus.status = $status GROUP BY bus.id_bus ORDER BY total_km $total_km");
		} else {
			$query = mysqli_query($koneksi, "SELECT bus.id_bus, bus.plat, bus.status, SUM(trans_upn.jumlah_km) AS total_km FROM bus LEFT JOIN trans_upn ON bus.id_bus = trans_upn.id_bus GROUP BY bus.id_bus ORDER BY total_km $total_km");
		}
	} else {
		$query = mysqli_query($koneksi, "SELECT bus.id_bus, bus.plat, bus.status, SUM(trans_upn.jumlah_km) AS total_km FROM bus LEFT JOIN trans_upn ON bus.id_bus = trans_upn.id_bus GROUP BY bus.id_bus");
	}

	if(mysqli_num_rows($query) > 0) {
		echo "<table border='1'>";
		echo "<tr><th>ID Bus</th><th>Plat</th><th>Status</th><th>Total KM</th><th>Edit</th><th>Delete</th></tr>";
		while($data = mysqli_fetch_array($query)) {
			echo "<tr";
			if ($data['status'] == 1) {
				echo " style='background-color: #c7f5d9;'";
			}
			if($data['status'] == 2) {
				echo " style='background-color: #F1EB9C;'";
			}
			if($data['status'] == 0) {
				echo " style='background-color: #FF7276;'";
			}
			echo ">";
			echo "<td>" . $data['id_bus'] . "</td>";
			echo "<td>" . $data['plat'] . "</td>";
			if($data['status'] == 1) {
				echo "<td>AKTIF</td>";
			} else if($data['status'] == 2) {
				echo "<td>CADANGAN/DALAM PERBAIKAN</td>";
			} else if($data['status'] == 0) {
				echo "<td>TIDAK BEROPERASI</td>";
			}
			echo "<td>" . $data['total_km'] . "</td>";
echo "<td><a href='edit_bus.php?id=" . $data['id_bus'] . "'>Edit</a></td>";
echo "<td><a href='delete_bus.php?id=" . $data['id_bus'] . "' onclick='return confirm(\"Are you sure you want to delete this data?\")'>Delete</a></td>";
echo "</tr>";
}
echo "</table>";
} else {
echo "Data not found";
}

mysqli_close($koneksi);
?>
</body>
</html>

