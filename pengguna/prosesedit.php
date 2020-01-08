<?php

include '../database.php';
$db= new database();

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama_lengkap = $_POST['nama_lengkap'];
    $role = $_POST['role'];
    
    // buat query update
    $sql = "UPDATE pengguna SET password='$password', nama_lengkap='$nama_lengkap', role='$role'WHERE username='$username'";
    $query = mysqli_query($db->con, $sql);

    // apakah query update berhasil?
    if( $query ) {
        header('Location: pengguna.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>