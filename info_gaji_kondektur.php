<?php
$servername = "localhost:3307";
$username = "root";
$password = "1q2w3e4r!";
$dbname = "transupn";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT SUM(jumlah_km) AS total_km FROM trans_upn WHERE MONTH(tanggal) = ? AND id_kondektur = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $bulan, $id_kondektur);
$bulan = $_GET["bulan"];
$id_kondektur = $_GET["id_kondektur"];
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_km = $row["total_km"];
    $konduktor_payment = $total_km * 1500;
} else {
    $total_km = 0;
    $konduktor_payment = "Tidak ada gaji bulan ini";
}

$sql = "SELECT id_trans_upn, id_bus, tanggal, jumlah_km FROM trans_upn WHERE MONTH(tanggal) = ? AND id_kondektur = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $bulan, $id_kondektur);
$bulan = $_GET["bulan"];
$id_kondektur = $_GET["id_kondektur"];
$stmt->execute();
$result = $stmt->get_result();

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Info Gaji Kondektur</title>
</head>
<body>
	<h1>Info Gaji Kondektur</h1>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
		Bulan: <input type="number" name="bulan" min="1" max="12" required>
		ID Kondektur: <input type="number" name="id_kondektur" required>
		<input type="submit" value="Tampilkan">
	</form>
    <a href="index.php"><button>Kembali</button></a>
	<p>Total km: <?php echo $total_km; ?></p>
	<p>Kondektur payment: Rp <?php echo number_format($konduktor_payment, 0, ",", "."); ?></p>
	<?php if ($total_km > 0) { ?>
	<table>
		<thead>
			<tr>
				<th>ID Trans UPN</th>
				<th>ID Bus</th>
				<th>Tanggal</th>
				<th>Jumlah KM</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = $result->fetch_assoc()) { ?>
			<tr>
				<td><?php echo $row["id_trans_upn"]; ?></td>
				<td><?php echo $row["id_bus"]; ?></td>
				<td><?php echo $row["tanggal"]; ?></td>
				<td><?php echo $row["jumlah_km"]; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php } ?>
