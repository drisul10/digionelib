<?php 
include '../koneksi.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../login.php");
}

// cek
echo "Hai, selamat datang ". $_SESSION['username'];

?>
<br/>
<br/>
<a href="logout.php">LOGOUT</a>