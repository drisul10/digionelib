<?php

include '../database.php';
$db= new database();

if( isset($_GET['username']) ){

    // ambil id dari query string
    $user = $_GET['username'];

    // buat query hapus
    $sql = "DELETE FROM pengguna WHERE username='$user'";
    $query = mysqli_query($db->con  , $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: pengguna.php');
    } else {
        echo $sql;
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>