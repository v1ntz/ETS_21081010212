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

    $id_driver = $_POST["id_driver"];
    $nama = $_POST["nama"];
    $no_sim = $_POST["no_sim"];
    $alamat = $_POST["alamat"];

    $sql = "INSERT INTO driver (id_driver, nama, no_sim, alamat)
            VALUES ('$id_driver', '$nama', '$no_sim', '$alamat')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Driver</title>
</head>
<body>
	<h1>Add Driver</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label for="id_driver">ID Driver:</label><br>
		<input type="number" name="id_driver" required><br><br>
		<label for="nama">Nama:</label><br>
		<input type="text" name="nama" required maxlength="25"><br><br>
		<label for="no_sim">No. SIM:</label><br>
		<input type="text" name="no_sim" required maxlength="15"><br><br>
		<label for="alamat">Alamat:</label><br>
		<textarea name="alamat" required maxlength="100"></textarea><br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
