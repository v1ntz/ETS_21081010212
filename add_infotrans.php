<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost:3307";
    $username = "root";
    $password = "1q2w3e4r!";
    $dbname = "transupn";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id_kondektur = $_POST["id_trans_upn"];
    $id_kondektur = $_POST["id_kondektur"];
    $id_bus = $_POST["id_bus"];
    $id_driver = $_POST["id_driver"];
    $jumlah_km = $_POST["jumlah_km"];
    $tanggal = $_POST["tanggal"];

    $sql = "INSERT INTO trans_upn (id_trans_upn, id_kondektur, id_bus, id_driver, jumlah_km, tanggal)
            VALUES ('$id_trans_upn', '$id_kondektur', '$id_bus', '$id_driver', '$jumlah_km', '$tanggal')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Infotrans</title>
</head>
<body>
	<h1>Add Infotrans</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label for="id_kondektur">ID Trans UPN:</label><br>
		<input type="number" name="id_kondektur" required><br><br>
		<label for="id_kondektur">ID Kondektur:</label><br>
		<input type="number" name="id_kondektur" required><br><br>
		<label for="id_bus">ID Bus:</label><br>
		<input type="number" name="id_bus" required><br><br>
		<label for="id_driver">ID Driver:</label><br>
		<input type="number" name="id_driver" required><br><br>
		<label for="jumlah_km">Jumlah KM:</label><br>
		<input type="number" name="jumlah_km" required><br><br>
		<label for="tanggal">Tanggal:</label><br>
		<input type="date" name="tanggal" required><br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
