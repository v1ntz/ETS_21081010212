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

    $id_kondektur = $_POST["id_kondektur"];
    $nama = $_POST["nama"];

    $sql = "INSERT INTO kondektur (id_kondektur, nama)
            VALUES ('$id_kondektur', '$nama')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: index.php");
exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Kondektur</title>
</head>
<body>
	<h1>Add Kondektur</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label for="id_kondektur">ID Kondektur:</label><br>
		<input type="number" name="id_kondektur" required><br><br>
		<label for="nama">Nama:</label><br>
		<input type="text" name="nama" required maxlength="25"><br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
