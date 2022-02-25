<?php
include 'koneksi.php';
// menyimpan data kedalam variabel
$nik       = $_POST['nik'];
$nama      = $_POST['nama'];
$username  = $_POST['username'];
$password  = $_POST['password'];
$telp      = $_POST['telp'];
// query SQL untuk insert data
$query="INSERT INTO masyarakat SET nik='$nik',nama='$nama',username='$username',password='$password',telp='$telp'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:index.php");
?>