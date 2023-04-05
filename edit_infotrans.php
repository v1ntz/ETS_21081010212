<?php
$koneksi = mysqli_connect("localhost:3307", "root", "1q2w3e4r!", "transupn");

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $id_kondektur = $_POST['id_kondektur'];
    $id_bus = $_POST['id_bus'];
    $id_driver = $_POST['id_driver'];
    $jumlah_km = $_POST['jumlah_km'];
    $tanggal = $_POST['tanggal'];

    $query = mysqli_query($koneksi, "UPDATE trans_upn SET id_kondektur='$id_kondektur', id_bus='$id_bus', id_driver='$id_driver', jumlah_km='$jumlah_km', tanggal='$tanggal' WHERE id_trans_upn='$id'");
    if($query) {
        header("Location: index.php?table_name=infotrans");
        exit();
    } else {
        echo "Failed to update data. Please try again.";
    }
} else {
    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "SELECT * FROM trans_upn WHERE id_trans_upn='$id'");
    $data = mysqli_fetch_array($query);
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit InfoTrans</title>
</head>
<body>
    <h1>Edit InfoTrans</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $data['id_trans_upn']; ?>">
        <label>ID Kondektur:</label><br>
        <input type="text" name="id_kondektur" value="<?php echo $data['id_kondektur']; ?>"><br><br>
        <label>ID Bus:</label><br>
        <input type="text" name="id_bus" value="<?php echo $data['id_bus']; ?>"><br><br>
        <label>ID Driver:</label><br>
        <input type="text" name="id_driver" value="<?php echo $data['id_driver']; ?>"><br><br>
        <label>Jumlah KM:</label><br>
        <input type="text" name="jumlah_km" value="<?php echo $data['jumlah_km']; ?>"><br><br>
        <label>Tanggal:</label><br>
        <input type="date" name="tanggal" value="<?php echo $data['tanggal']; ?>"><br><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>

<?php } ?>
