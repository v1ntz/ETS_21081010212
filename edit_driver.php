<?php
$koneksi = mysqli_connect("localhost:3307", "root", "1q2w3e4r!", "transupn");

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $no_sim = $_POST['no_sim'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($koneksi, "UPDATE driver SET nama='$nama', no_sim='$no_sim', alamat='$alamat' WHERE id_driver='$id'");
    if($query) {
        header("Location: index.php?table_name=driver");
        exit();
    } else {
        echo "Failed to update data. Please try again.";
    }
} else {
    $id = $_GET['id_driver'];

    $query = mysqli_query($koneksi, "SELECT * FROM driver WHERE id_driver='$id'");
    $data = mysqli_fetch_array($query);
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Driver</title>
</head>
<body>
    <h1>Edit Driver</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $data['id_driver']; ?>">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?php echo $data['nama']; ?>"><br>
        <label>No. SIM:</label><br>
        <input type="text" name="no_sim" value="<?php echo $data['no_sim']; ?>"><br>
        <label>Alamat:</label><br>
        <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"><br><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>

<?php } ?>
