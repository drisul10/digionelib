<?php 
include '../database.php';
$db= new database();
	require "../header.php";
	// require "header_mahasiswa.php";
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Daftar Pengguna</h3>

    <div class="box-body table-responsive no-padding">
        <br>
        <a href="formpengguna.php" class="btn btn-block bg-olive" style="width: 100px">Tambah Baru</a>
        <br>
    <table class="table table-hover">

    <thead>
        <tr>
            <th>Role</th>
            <th>Username</th>
            <th>Nama Lengkap</th>
         
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM pengguna";
        $query = mysqli_query($db->con, $sql);

        while($pengguna = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$pengguna['role']."</td>";
            echo "<td>".$pengguna['username']."</td>";
            echo "<td>".$pengguna['nama_lengkap']."</td>";
           
            echo "<td>";
            echo "<a href='edit.php?username=".$pengguna['username']."' class='btn btn-primary'>Edit</a>";
            echo "<a href='delete.php?username=".$pengguna['username']."' class='btn btn-danger'>Delete</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
</table>
</div>
</div>
</div>
<!-- <p>Total: <?php echo mysqli_num_rows($query) ?></p>
 -->
<?php

    require "../footer.php";
    // require "footer_mahasiswa.php";
?>