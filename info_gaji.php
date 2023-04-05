<?php
$servername = "localhost:3307";
$username = "root";
$password = "1q2w3e4r!";
$dbname = "transupn";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT SUM(jumlah_km) AS total_km FROM trans_upn";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_km = $row["total_km"];
$driver_payment = $total_km * 3000;
$konduktor_payment = $total_km * 1500;

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Info Gaji</title>
</head>
<body>
	<h1>Info Gaji</h1>
	<p>Total km: <?php echo $total_km; ?></p>
	<p>Driver payment: Rp <?php echo number_format($driver_payment, 0, ",", "."); ?></p>
	<p>Kondektur payment: Rp <?php echo number_format($konduktor_payment, 0, ",", "."); ?></p>
</body>
</html>
