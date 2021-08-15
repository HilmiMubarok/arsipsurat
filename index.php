<?php

// Memasukkan file koneksi
require_once 'inc/config.php';

/*
	Mengecek Jika User Belum Login Maka Diarahkan ke
	Halaman Login,
	Jika User Sudah Login, Maka Diarahkan ke Halaman Dashboard
*/
if (isAuthenticated() == FALSE) {
	echo "<script>window.location.href = 'pages/auth/login.php'</script>";
} else {
	echo "<script>window.location.href = 'pages.php?p=dashboard'</script>";
}


?>
