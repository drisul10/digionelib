<?php
require "header.php";
    // require "header_mahasiswa.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>DigiOneLib | Form Penambahan Buku Baru</title>
</head>

<body>
    <header>
        <h3>Form Penambahan Buku Baru</h3>
    </header>

    <form action="prosespustaka.php" method="POST">

        <fieldset>
<form>
    <div class="form-group">
        <label for="kode_buku">Kode Buku</label>
        <input type="text" class="form-control" id="kode_buku" name="kode_buku" placeholder="Kode Buku">
    </div>
    <div class="form-group">
        <label for="judul_buku">Judul</label>
        <input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Judul Buku">
    </div>
    <div class="form-group">
        <label for="pengarang">Pengarang</label>
        <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Pengarang">
    </div>
    <div class="form-group">
        <label for="tahun">Tahun</label>
        <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun">
    </div>
        <div class="form-group">
        <label for="kategori">Kategori</label>
        <select class="form-control" name="kategori">
            <option value="1">Manajemen</option>
            <option value="2">Klasik</option>
            <option value="3">Kesehatan</option>
        </select>
    </div>
        <div class="form-group">
        <label for="penerbit">Penerbit</label>
        <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit">
    </div>
    <div class="form-group">
        <label for="lokasi_rak">Lokasi Rak</label>
        <input type="text" class="form-control" id="lokasi_rak" name="lokasi_rak" placeholder="Lokasi Rak">
    </div>

  <button type="submit" name="tambah" class="btn btn-default">Submit</button>
</form>
  
        </fieldset>

    </body>
</html>
<?php

    require "footer.php";
    // require "footer_mahasiswa.php";
?>