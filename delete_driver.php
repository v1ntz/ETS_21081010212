<?php
$koneksi = mysqli_connect("localhost:3307", "root", "1q2w3e4r!", "transupn");

$id = $_GET['id_driver'];

$query = mysqli_query($koneksi, "DELETE FROM driver WHERE id_driver='$id'");

if($query) {
    header("Location: index.php?table_name=driver");
    exit();
} else {
    echo "Failed to delete data. Please try again.";
}
?>
