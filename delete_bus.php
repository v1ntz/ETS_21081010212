<?php
$koneksi = mysqli_connect("localhost:3307", "root", "1q2w3e4r!", "transupn");

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM trans_upn WHERE id_bus='$id'");
if(mysqli_num_rows($query) > 0) {
    $delete_query = mysqli_query($koneksi, "DELETE FROM trans_upn WHERE id_bus='$id'");
    if($delete_query) {
        $query = mysqli_query($koneksi, "DELETE FROM bus WHERE id_bus='$id'");
        if($query) {
            header("Location: index.php?table_name=bus");
            exit();
        } else {
            echo "Failed to delete data. Please try again.";
        }
    } else {
        echo "Failed to delete data. Please try again.";
    }
} else {
    $query = mysqli_query($koneksi, "DELETE FROM bus WHERE id_bus='$id'");
    if($query) {
        header("Location: index.php?table_name=bus");
        exit();
    } else {
        echo "Failed to delete data. Please try again.";
    }
}
?>
