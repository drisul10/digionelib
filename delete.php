<?php

include 'database.php';
$db= new database();

if( isset($_GET['kode_buku']) ){

    // ambil id dari query string
    $kode = $_GET['kode_buku'];

    // buat query hapus
    $sql = "DELETE FROM buku WHERE kode_buku=$kode";
    $query = mysqli_query($db->con, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: crudbuku.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>