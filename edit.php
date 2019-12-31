<?php
require "header.php";
    // require "header_mahasiswa.php";
?>
<?php
include 'database.php';
$db= new database();

// kalau tidak ada id di query string
if( !isset($_GET['kode_buku']) ){
    header('Location: crudbuku.php');
}

//ambil id dari query string
$kode = $_GET['kode_buku'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM buku WHERE kode_buku='$kode'";
$query = mysqli_query($db->con, $sql);
$buku = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>DigiOneLib Edit Buku</title>
</head>

<body>
    <header>
        <h3>Form Edit Buku</h3>
    </header>

    <form action="prosesedit.php" method="POST">

        <fieldset>
<form>
    <input type="hidden" name="kode_buku" value="<?php echo $buku['kode_buku'] ?>" />

    <div class="form-group">
        <label for="kode_buku">Kode Buku</label>
        <input type="text" class="form-control" id="kode_buku" name="kode_buku" value="<?php echo $buku['kode_buku'] ?>" placeholder="Kode Buku">
    </div>
    <div class="form-group">
        <label for="judul_buku">Judul</label>
        <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="<?php echo $buku['judul_buku'] ?>" placeholder="Judul Buku">
    </div>
    <div class="form-group">
        <label for="pengarang">Pengarang</label>
        <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?php echo $buku['pengarang'] ?>" placeholder="Pengarang">
    </div>
    <div class="form-group">
        <label for="tahun">Tahun</label>
        <input type="text" class="form-control" id="tahun" name="tahun" value="<?php echo $buku['tahun'] ?>" placeholder="Tahun">
    </div>
        <div class="form-group">
        <label for="kategori">Kategori</label>
        <input type="text" class="form-control" id="kategori" name="kategori" value="<?php echo $buku['kategori'] ?>" placeholder="Kategori">
    </div>
        <div class="form-group">
        <label for="penerbit">Penerbit</label>
        <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?php echo $buku['penerbit'] ?>" placeholder="Penerbit">
    </div>
    <div class="form-group">
        <label for="lokasi_rak">Lokasi Rak</label>
        <input type="text" class="form-control" id="lokasi_rak" name="lokasi_rak" value="<?php echo $buku['lokasi_rak'] ?>" placeholder="Lokasi Rak">
    </div>

  <button type="submit" name="simpan" class="btn btn-default">Update</button>
</form>
        </fieldset>


    </form>

    </body>
</html>
<?php

    require "footer.php";
    // require "footer_mahasiswa.php";
?>