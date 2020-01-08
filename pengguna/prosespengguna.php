<?php

include '../database.php';
$db= new database();

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])){

    // ambil data dari formulir
    $username = $_POST['username'];
    $password = md5($_POST['password']) ;
    $nama_lengkap = $_POST['nama_lengkap'];
    $role = $_POST['role'];
    
    // buat query
    $sql = "INSERT INTO pengguna (username, password, nama_lengkap, role) VALUE ('$username', '$password', '$nama_lengkap', '$role')";
    $query = mysqli_query($db->con  , $sql);

    // apakah query simpan berhasil?
    if( $query ) {
       header('Location: pengguna.php?status=sukses');
    } else {
       header('Location: formpengguna.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}
echo $sql;
?>