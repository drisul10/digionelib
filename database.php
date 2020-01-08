<?php
    class database
    {
        var $host="localhost";
        var $username="drisoel";
        var $password="leosird";
        var $database="db_digionelib";
        var $con;
        function __construct(){
            $_SESSION['npm']='19.21.1370';
            $this->con=mysqli_connect($this->host, $this->username, $this->password, $this->database);
        }
        function getMahasiswa(){
            $hasil = array();
            $query=mysqli_query($this->con,'SELECT * FROM mahasiswa WHERE status=1 ORDER BY npm ASC');
            while ($data=mysqli_fetch_object($query)) {
                $hasil[]=$data;
            }
            return $hasil;
        }
        function getDataPustakaBuku(){
            $hasil = array();
            $query=mysqli_query($this->con,'SELECT * FROM buku JOIN kategori ON kategori.id_kategori=buku.kategori ORDER BY judul_buku ASC');
            while ($data=mysqli_fetch_object($query)) {
                $hasil[]=$data;
            }
            return $hasil;
        }
        function getDataDigitalLibrary(){
            $hasil = array();
            $query=mysqli_query($this->con,'SELECT * FROM ebook JOIN kategori ON kategori.id_kategori=ebook.kategori ORDER BY judul_buku ASC');
            while ($data=mysqli_fetch_object($query)) {
                $hasil[]=$data;
            }
            return $hasil;
        }
        
        function getDataPeminjamanUser(){
            $hasil = array();
            // $query=mysqli_query($this->con,'SELECT * FROM peminjaman JOIN kategori ON kategori.id_kategori=buku.kategori JOIN mahasiswa ON mahasiswa.npm=peminjaman.npm WHERE peminjaman.npm="'.$_SESSION['npm'].'"');
            $query=mysqli_query($this->con,'SELECT * FROM detail_peminjaman JOIN peminjaman ON detail_peminjaman.id_peminjaman=peminjaman.id_peminjaman JOIN buku ON detail_peminjaman.kode_buku=buku.kode_buku JOIN kategori ON kategori.id_kategori=buku.kategori JOIN mahasiswa ON mahasiswa.npm=peminjaman.npm WHERE peminjaman.npm="19.21.1370" ORDER by id_detail_peminjaman ASC');
            while ($data=mysqli_fetch_object($query)) {
                $hasil[]=$data;
            }
            return $hasil;
        }
        function getDataPengembalianUser(){
            $hasil = array();
            // $query=mysqli_query($this->con,'SELECT * FROM peminjaman JOIN kategori ON kategori.id_kategori=buku.kategori WHERE DATE(tanggal_pengembalian) = DATE(NOW())');
            // $query=mysqli_query($this->con,'SELECT * FROM peminjaman JOIN kategori ON kategori.id_kategori=buku.kategori JOIN mahasiswa ON mahasiswa.npm=peminjaman.npm WHERE status_pengembalian=0 AND peminjaman.npm="'.$_SESSION['npm'].'"');
            $query=mysqli_query($this->con,'SELECT * FROM detail_peminjaman JOIN peminjaman ON detail_peminjaman.id_peminjaman=peminjaman.id_peminjaman JOIN buku ON detail_peminjaman.kode_buku=buku.kode_buku JOIN kategori ON kategori.id_kategori=buku.kategori JOIN mahasiswa ON mahasiswa.npm=peminjaman.npm WHERE peminjaman.npm="19.21.1370" ORDER by id_detail_peminjaman ASC');
            while ($data=mysqli_fetch_object($query)) {
                $hasil[]=$data;
            }
            return $hasil;
        }
        function getDataPeminjaman(){
            $hasil = array();
            $query=mysqli_query($this->con,'SELECT * FROM peminjaman JOIN mahasiswa ON mahasiswa.npm=peminjaman.npm');
            while ($data=mysqli_fetch_object($query)) {
                $hasil[]=$data;
            }
            return $hasil;
        }
        function getDataPengembalian(){
            $hasil = array();
            // $query=mysqli_query($this->con,'SELECT * FROM peminjaman WHERE DATE(tanggal_pengembalian) = DATE(NOW())');
            $query=mysqli_query($this->con,'SELECT * FROM peminjaman  JOIN mahasiswa ON mahasiswa.npm=peminjaman.npm');
            while ($data=mysqli_fetch_object($query)) {
                $hasil[]=$data;
            }
            return $hasil;
        }
        function getDetailPeminjaman($id){
            $hasil = array();
            $query=mysqli_query($this->con,'SELECT * FROM detail_peminjaman JOIN buku ON buku.kode_buku=detail_peminjaman.kode_buku JOIN kategori ON kategori.id_kategori=buku.kategori WHERE id_peminjaman="'.$id.'"');
            while ($data=mysqli_fetch_object($query)) {
                $hasil[]=$data;
            }
            $dataku['data']=$hasil;
            return $dataku;
        }
        function getDetailPeminjamanUser($id){
            $hasil = array();
            $query=mysqli_query($this->con,'SELECT * FROM detail_peminjaman JOIN buku ON buku.kode_buku=detail_peminjaman.kode_buku JOIN kategori ON kategori.id_kategori=buku.kategori WHERE id_peminjaman="'.$id.'"');
            $hasil=mysqli_fetch_assoc($query);
            return $hasil;
        }
        function getDetailPengembalianUser($id){
            $hasil = array();
            $query=mysqli_query($this->con,'SELECT * FROM detail_peminjaman JOIN buku ON buku.kode_buku=detail_peminjaman.kode_buku JOIN kategori ON kategori.id_kategori=buku.kategori WHERE id_peminjaman="'.$id.'"');
            $hasil=mysqli_fetch_assoc($query);
            return $hasil;
        }
        function simpanPengembalian($data){
            $tanggal=date('Y-m-d H:i:s');
            if ($data['status_pengembalian']==0) {
                $tanggal="0000-00-00 00:00:00";
            }
            $query=mysqli_query($this->con,'UPDATE peminjaman SET pengembalian="'.$tanggal.'", status_pengembalian='.$data['status_pengembalian'].', denda="'.$data['denda'].'" WHERE id_peminjaman="'.$data['id_peminjaman'].'"');
            if ($query) {
                return true;
            }else{
                return false;
            }
        }
        function simpanDenda($data){
            $denda=$data['denda'];
            $query=mysqli_query($this->con,'UPDATE pengaturan SET data="'.$denda.'" WHERE nama="denda"');
            if ($query) {
                return true;
            }else{
                return false;
            }
        }
        function getDenda(){
            $query=mysqli_query($this->con,'SELECT data FROM  pengaturan WHERE nama="denda"');
            $hasil=mysqli_fetch_assoc($query)['data'];
            return $hasil;
        }
        function getDetailPustakaBuku($id){
            $hasil = array();
            $query=mysqli_query($this->con,'SELECT * FROM buku  WHERE kode_buku="'.$id.'"');
            $hasil=mysqli_fetch_assoc($query);
            return $hasil;
        }
        function getDetailDigitalLibrary($id){
            $hasil = array();
            $query=mysqli_query($this->con,'SELECT * FROM ebook JOIN kategori ON kategori.id_kategori=ebook.kategori WHERE kode_buku="'.$id.'"');
            $hasil=mysqli_fetch_assoc($query);
            return $hasil;
        }
        function tambahPeminjaman($data){
            $npm=$data['npm'];
            $tanggal_peminjaman=$data['tanggal_peminjaman'].' '.date('H:i:s');
            $tanggal_pengembalian=$data['tanggal_pengembalian'].' '.date('H:i:s');
            $buku=$data['buku'];
            // $query=mysqli_query($this->con,'INSERT INTO peminjaman (npm, tanggal_peminjaman, tanggal_pengembalian, nama_petugas) VALUES('.$npm.','.$tanggal_peminjaman.','.$tanggal_pengembalian.','.$_SESSION['username'].',)');
            $query=mysqli_query($this->con,'INSERT INTO peminjaman (npm, tanggal_peminjaman, tanggal_pengembalian, nama_petugas) VALUES("'.$npm.'","'.$tanggal_peminjaman.'","'.$tanggal_pengembalian.'","petugas")');
            if ($query) {
                $query=mysqli_query($this->con,'SELECT * FROM peminjaman WHERE npm="'.$npm.'" AND tanggal_peminjaman="'.$tanggal_peminjaman.'" AND tanggal_pengembalian="'.$tanggal_pengembalian.'" ORDER BY id_peminjaman DESC');
                $hasil=mysqli_fetch_object($query);
                $id_peminjaman=$hasil->id_peminjaman;
                foreach ($buku as $key => $value) {
                    $query=mysqli_query($this->con,'INSERT INTO detail_peminjaman (id_peminjaman,  kode_buku) VALUES("'.$id_peminjaman.'","'.$value[1].'")');
                }
                return true;
            }else{
                return false;
            }
        }
    }
    

?>