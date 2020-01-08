<?php
require "../header.php";
    // require "header_mahasiswa.php";
?>
<?php
include '../database.php';
$db= new database();

// kalau tidak ada id di query string
if( !isset($_GET['username']) ){
    header('Location: pengguna.php');
}

//ambil id dari query string
$username = $_GET['username'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM pengguna WHERE username='$username'";
$query = mysqli_query($db->con, $sql);
$pengguna = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>DigiOneLib Edit Pengguna</title>
</head>

<body>
    <header>
        <h3>Form Edit Pengguna</h3>
    </header>

    <form action="prosesedit.php" method="POST">

        <fieldset>
<form>
    <input type="hidden" name="username" value="<?php echo $pengguna['username'] ?>" />

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $pengguna['username'] ?>" placeholder="Username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" class="form-control" id="password" name="password" placeholder="Password Baru">
    </div>
    <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $pengguna['nama_lengkap'] ?>" placeholder="Nama Lengkap">
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select name="role" class="form-control" id="role" value="<?php echo $pengguna['role'] ?>" placeholder="Role">
            <option value="Admin">Admin</option>
            <option value="Petugas">Petugas</option>
        </select>
    </div>

  <button type="submit" name="simpan" class="btn btn-default">Update</button>
</form>
        </fieldset>


    </form>

    </body>
</html>
<?php

    require "../footer.php";
    // require "footer_mahasiswa.php";
?>