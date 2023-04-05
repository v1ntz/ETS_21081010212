<?php
$servername = "localhost:3307";
$username = "root";
$password = "1q2w3e4r!";
$dbname = "transupn";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $bulan = $_POST['bulan'];
    $id_driver = $_POST['id_driver'];

    $sql = "SELECT nama FROM driver WHERE id_driver = $id_driver";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $driver_name = $row["nama"];

    $sql = "SELECT tanggal, jumlah_km FROM trans_upn WHERE MONTH(tanggal) = $bulan AND id_driver = $id_driver";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Detail Perjalanan:</h2>";
        echo "<p>ID Driver: $id_driver</p>";
        echo "<p>Nama Driver: $driver_name</p>";
        echo "<table>";
        echo "<tr><th>Tanggal</th><th>Jumlah KM</th></tr>";

        $total_km = 0;

        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["tanggal"]. "</td><td>" . $row["jumlah_km"]. "</td></tr>";
            $total_km += $row["jumlah_km"];
        }

        $driver_payment = $total_km * 3000;

        echo "</table>";
        echo "<p>Total km: $total_km</p>";
        echo "<p>Gaji Driver: Rp " . number_format($driver_payment, 0, ",", ".") . "</p>";
    } else {
        echo "Tidak ada data perjalanan untuk ID driver $id_driver pada bulan ini.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Info Gaji Driver</title>
</head>
<body>
    <h1>Info Gaji Driver</h1>
    <form method="post">
        <label for="bulan">Bulan:</label>
        <select name="bulan" id="bulan">
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select><br><br>
        <label for="id_driver">ID Driver:</label>
        <input type="text" name="id_driver"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <a href="index.php"><button>Kembali</button></a>
</body>
</html>
