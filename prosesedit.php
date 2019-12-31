<?php

include 'database.php';
$db= new database();

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $kode = $_POST['kode_buku'];
    $judul = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $tahun = $_POST['tahun'];
    $kategori = $_POST['kategori'];
    $penerbit = $_POST['penerbit'];
    $lokasiRak = $_POST['lokasi_rak'];

    // buat query update
    $sql = "UPDATE buku SET judul_buku='$judul', pengarang='$pengarang', tahun='$tahun', kategori='$kategori', penerbit='$penerbit', lokasi_rak='$lokasiRak' WHERE kode_buku=$kode";
    $query = mysqli_query($db->con, $sql);

    // apakah query update berhasil?
    if( $query ) {
        header('Location: crudbuku.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>