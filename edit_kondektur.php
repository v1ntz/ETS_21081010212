<?php
$koneksi = mysqli_connect("localhost:3307", "root", "1q2w3e4r!", "transupn");

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];

    $query = mysqli_query($koneksi, "UPDATE kondektur SET nama='$nama' WHERE id_kondektur='$id'");
    if($query) {
        header("Location: index.php?table_name=kondektur");
        exit();
    } else {
        echo "Failed to update data. Please try again.";
    }
} else {
    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "SELECT * FROM kondektur WHERE id_kondektur='$id'");
    $data = mysqli_fetch_array($query);
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Kondektur</title>
</head>
<body>
    <h1>Edit Kondektur</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $data['id_kondektur']; ?>">
        <label>ID:</label><br>
        <input type="text" name="id" value="<?php echo $data['id_kondektur']; ?>" disabled><br><br>
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?php echo $data['nama']; ?>"><br><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>

<?php } ?>
