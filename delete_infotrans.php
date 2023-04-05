<?php
$koneksi = mysqli_connect("localhost:3307", "root", "1q2w3e4r!", "transupn");


$id = $_GET['id'];


$query = mysqli_query($koneksi, "DELETE FROM trans_upn WHERE id_trans_upn='$id'");
if($query) {

    header("Location: index.php?table_name=infotrans");
    exit();
} else {

    echo "Failed to delete data. Please try again.";
}
?>
