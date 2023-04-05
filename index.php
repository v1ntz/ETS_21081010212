<!DOCTYPE html>
<html>
<head>
    <title>View Tables</title>
</head>
<body>
    <h1>Data Trans UPN</h1>
    <form method="post">
        <label for="table">Select a table:</label>
        <select name="table" id="table">
            <option value="bus">Bus</option>
            <option value="driver">Driver</option>
            <option value="kondektur">Kondektur</option>
            <option value="infotrans">Info Perjalanan</option>
        </select>
        <input type="submit" name="submit" value="View">
    </form>
    <br>
    <a href="add_data.php"><button>Add New Data</button></a>
    <a href="info_gaji_driver.php"><button>Info Gaji Driver</button></a>
    <a href="info_gaji_kondektur.php"><button>Info Gaji Kondektur</button></a>
    <a href="filter.php"><button>Filter</button></a>
    <?php
        if(isset($_POST['submit'])) {
            $table_name = $_POST['table'];
            include "koneksi.php";
            if($table_name == "bus"){
                $query = mysqli_query($koneksi, "SELECT * FROM bus");
                if(mysqli_num_rows($query) > 0) {
                    echo "<table border='1'>";
                    echo "<tr><th>Id Bus</th><th>Plat</th><th>Status</th><th>Edit</th><th>Delete</th></tr>";
                    while($data = mysqli_fetch_array($query)) {
                        echo "<tr";
        if ($data['status'] == 1) {
            echo " style='background-color: #c7f5d9;'";
        }
        if($data['status'] == 2) {
            echo " style='background-color: #F1EB9C;'";}
        if($data['status'] == 1) {
                echo " style='background-color: #FF7276;'";}
                        echo "<tr>";
                        echo "<td>" . $data['id_bus'] . "</td>";
                        echo "<td>" . $data['plat'] . "</td>";
                        echo "<td>" . $data['status'] . "</td>";
                        echo "<td><a href='edit_bus.php?id=" . $data['id_bus'] . "'>Edit</a></td>";
                        echo "<td><a href='delete_bus.php?id=" . $data['id_bus'] . "'>Delete</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Table is empty";
                }
            } elseif($table_name == "driver") {
                $query = mysqli_query($koneksi, "SELECT * FROM driver");
                if(mysqli_num_rows($query) > 0) {
                    echo "<table border='1'>";
                    echo "<tr><th>Id Driver</th><th>Nama</th><th>No. SIM</th><th>Alamat</th><th>Edit</th><th>Delete</th></tr>";
                    while($data = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>" . $data['id_driver'] . "</td>";
                        echo "<td>" . $data['nama'] . "</td>";
                        echo "<td>" . $data['no_sim'] . "</td>";
                        echo "<td>" . $data['alamat'] . "</td>";
                        echo "<td><a href='edit_driver.php?id_driver=" . $data['id_driver'] . "'>Edit</a></td>";
                        echo "<td><a href='delete_driver.php?id_driver=" . $data['id_driver'] . "' onClick=\"return confirm('Are you sure you want to delete this driver?')\">Delete</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Table is empty";
                }
            } elseif($table_name == "kondektur") {
                $query = mysqli_query($koneksi, "SELECT * FROM kondektur");
                if(mysqli_num_rows($query) > 0) {
                    echo "<table border='1'>";
                    echo "<tr><th>Id Kondektur</th><th>Nama</th><th>Edit</th><th>Delete</th></tr>";
                    while($data = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>" . $data['id_kondektur'] . "</td>";
                        echo "<td>" . $data['nama'] . "</td>";
                        echo "<td><a href='edit_kondektur.php?id=" . $data['id_kondektur'] . "'>Edit</a></td>";
                        echo "<td><a href='delete_kondektur.php?id=" . $data['id_kondektur'] . "' onclick='return confirm(\"Are you sure you want to delete this kondektur?\")'>Delete</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Table is empty";
                }
            }elseif($table_name == "infotrans") {
                $query = mysqli_query($koneksi, "SELECT * FROM trans_upn");
                if(mysqli_num_rows($query) > 0) {
                    echo "<table border='1'>";
                    echo "<tr><th>ID TransUPN</th><th>ID Kondektur</th><th>ID Bus</th><th>ID Driver</th><th>Jumlah KM</th><th>Tanggal</th><th>Edit</th><th>Delete</th></tr>";
                    while($data = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>" . $data['id_trans_upn'] . "</td>";
                        echo "<td>" . $data['id_kondektur'] . "</td>";
                        echo "<td>" . $data['id_bus'] . "</td>";
                        echo "<td>" . $data['id_driver'] . "</td>";
                        echo "<td>" . $data['jumlah_km'] . "</td>";
                        echo "<td>" . $data['tanggal'] . "</td>";
                        echo "<td><a href='edit_infotrans.php?id=" . $data['id_trans_upn'] . "'>Edit</a></td>";
                        echo "<td><a href='delete_infotrans.php?id=" . $data['id_trans_upn'] . "'>Delete</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Table is empty";
                }
            }
        }
    ?>
</body>
</html>
