<?php
$koneksi = mysqli_connect("localhost:3307", "root", "1q2w3e4r!", "transupn");

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM kondektur WHERE id_kondektur='$id'");
if($query) {
    header("Location: index.php?table_name=kondektur");
    exit();
} else {
    echo "Failed to delete data. Please try again.";
}
?>
