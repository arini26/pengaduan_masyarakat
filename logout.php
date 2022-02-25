<?php
session_start();

unset($_SESSION['username']);
unset($_SESSION['password']);

session_destroy();

	echo "<script>alert('Anda telah keluar dari laman pengaduan masyarakat'); document.location='index.php' </script>";