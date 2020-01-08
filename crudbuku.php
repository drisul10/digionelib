<?php 
include 'database.php';
$db= new database();
	require "header.php";
	// require "header_mahasiswa.php";
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Detail Daftar Buku</h3>

    <div class="box-body table-responsive no-padding">
        <br>
        <a href="formpustaka.php" class="btn btn-block bg-olive" style="width: 100px">Tambah Baru</a>
        <br>
    <table class="table table-hover">

    <thead>
        <tr>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Tahun</th>
            <th>Kategori</th>
            <th>Penerbit</th>
            <th>Lokasi Rak</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM buku";
        $query = mysqli_query($db->con, $sql);

        while($buku = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$buku['kode_buku']."</td>";
            echo "<td>".$buku['judul_buku']."</td>";
            echo "<td>".$buku['pengarang']."</td>";
            echo "<td>".$buku['tahun']."</td>";
            echo "<td>".$buku['kategori']."</td>";
            echo "<td>".$buku['penerbit']."</td>";
            echo "<td>".$buku['lokasi_rak']."</td>";

            echo "<td>";
            echo "<a href='edit.php?kode_buku=".$buku['kode_buku']."' class='btn btn-primary'>Edit</a>";
            echo "<a href='delete.php?kode_buku=".$buku['kode_buku']."' class='btn btn-danger'>Delete</a>";
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

    require "footer.php";
    // require "footer_mahasiswa.php";
?>