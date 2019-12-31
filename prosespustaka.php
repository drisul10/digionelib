<?php

include 'database.php';
$db= new database();

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])){

    // ambil data dari formulir
    $kode = $_POST['kode_buku'];
    $judul = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $tahun = $_POST['tahun'];
    $kategori = $_POST['kategori'];
    $penerbit = $_POST['penerbit'];
    $lokasiRak = $_POST['lokasi_rak'];

    // buat query
    $sql = "INSERT INTO buku (kode_buku, nama_cover, judul_buku, pengarang, tahun, kategori, penerbit, lokasi_rak) VALUE ('$kode','', '$judul', '$pengarang', '$tahun', '$kategori', '$penerbit', '$lokasiRak')";
    $query = mysqli_query($db->con, $sql);
    // apakah query simpan berhasil?
    if( $query ) {
       header('Location: crudbuku.php?status=sukses');
    } else {
       header('Location: crudbuku.php?status=gagal');
    // echo $sql;
    }


} else {
    die("Akses dilarang...");
}

?>