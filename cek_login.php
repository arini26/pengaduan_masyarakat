<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from petugas where username='$username' and password='$password'");
if (mysqli_num_rows($login) == 0) {
$login = mysqli_query($koneksi, "select * from masyarakat where username='$username' and password='$password'");
}
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level']=="admin"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:home_admin.php");

	// cek jika user login sebagai siswa
	}elseif($data['level']=="petugas"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "petugas";
		// alihkan ke halaman dashboard siswa
		header("location:home_petugas.php");

	}elseif($data['level']=="masyarakat"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "masyarakat";
		// alihkan ke halaman dashboard siswa
		header("location:home_masyarakat.php");	

}else{
	echo "<script>alert('Username atau password yang anda masukkan salah'); document.location='index.php' </script>";;
}
}
?>