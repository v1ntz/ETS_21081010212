<?php
$koneksi = mysqli_connect("localhost:3307", "root", "1q2w3e4r!", "transupn");

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $plat = $_POST['plat'];
    $status = $_POST['status'];

    $query = mysqli_query($koneksi, "UPDATE bus SET plat='$plat', status='$status' WHERE id_bus='$id'");
    if($query) {
        header("Location: index.php?table_name=bus");
        exit();
    } else {
        echo "Failed to update data. Please try again.";
    }
} else {
    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "SELECT * FROM bus WHERE id_bus='$id'");
    $data = mysqli_fetch_array($query);
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Bus</title>
</head>
<body>
    <h1>Edit Bus</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $data['id_bus']; ?>">
        <label>Plat:</label><br>
        <input type="text" name="plat" value="<?php echo $data['plat']; ?>"><br>
        <label>Status:</label><br>
        <input type="text" name="status" value="<?php echo $data['status']; ?>"><br><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>

<?php } ?>
