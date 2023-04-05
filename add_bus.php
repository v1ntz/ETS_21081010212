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

    $id_bus = $_POST["id_bus"];
    $plat = $_POST["plat"];
    $status = $_POST["status"];

    $sql = "INSERT INTO bus (id_bus, plat, status)
            VALUES ('$id_bus', '$plat', '$status')";

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
	<title>Add Bus</title>
</head>
<body>
	<h1>Add Bus</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label for="id_bus">ID Bus:</label><br>
		<input type="number" name="id_bus" required><br><br>
		<label for="plat">Plat:</label><br>
		<input type="text" name="plat" required maxlength="10"><br><br>
		<label for="status">Status:</label><br>
		<input type="text" name="status" required maxlength="1"><br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
