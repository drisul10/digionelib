<?php 
include '../database.php';
$db= new database();

$username = $_POST['username'];
$password = md5($_POST['password']);
$login = mysqli_query($db->con,"select * from pengguna where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
if($cek > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
}else{
	$login = mysqli_query($db->con,"select * from mahasiswa where npm='$username'and password='$password' and status='1' ");
	$cek = mysqli_num_rows($login);
	if($cek > 0){
		session_start();
		$_SESSION['npm'] = $username;
		$_SESSION['status'] = "login";
		$_SESSION['role'] = "Mahasiswa";
		header("location: ../?page=beranda&t=f.php");
	}else{
		header("location:login.php");	
	}}

$login = mysqli_query($db->con,"select * from pengguna where username='$username' and password='$password'");
$query = mysqli_fetch_array($login);
// print_r($query);
$role = $query['role'];
if ($role) {
	switch ($role) {
		case 'Admin':
			$_SESSION['role'] = "Admin";
			header("location:../crudbuku.php");
			break;
		case 'Petugas':
			$_SESSION['role'] = "Petugas";
			header("location:../petugas.php");
			break;
		}
}else{
		header("location: login.php");
}

?>