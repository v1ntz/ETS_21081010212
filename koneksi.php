<?php
$host = "localhost:3307";
$username = "root";
$password = "1q2w3e4r!";
$database = "transupn";

$koneksi=mysqli_connect($host,$username,$password);
if ($koneksi){
    $buka=mysqli_select_db($koneksi,$database);
    echo "Database Connected!";
    if (!$buka){
      echo "Database tidak dapat terhubung";
    }
}else {
  echo "MySQL tidak terhubung";
}
?>