<?php
require "../header.php";
    // require "header_mahasiswa.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>DigiOneLib | Form Pengguna Baru</title>
</head>

<body>
    <header>
        <h3>Form Penambahan Pengguna</h3>
    </header>

    <form action="prosespengguna.php" method="POST">

        <fieldset>
<form>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap">
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select name="role" class="form-control" id="role" placeholder="Role">
            <option value="Admin">Admin</option>
            <option value="Petugas">Petugas</option>
        </select>
    </div>

  <button type="submit" name="tambah" class="btn btn-default">Submit</button>
</form>
  
        </fieldset>

    </body>
</html>
<?php

    require "../footer.php";
    // require "footer_mahasiswa.php";
?>