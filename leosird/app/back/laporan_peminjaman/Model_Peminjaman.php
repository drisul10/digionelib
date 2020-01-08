<?php

namespace app\back\laporan_peminjaman;

use core\Base_Model;

class Model_Peminjaman extends Base_Model
{
    public $table = "peminjaman",
    $field_id = "id_peminjaman",
    $field_npm = "npm",
    $field_kode = "kode_buku",
    $field_tanggal_pinjam = "tanggal_peminjaman",
    $field_tanggal_kembali = "tanggal_pengembalian",
    $field_nama_petugas = "nama_petugas",
    $field_denda = "denda",
    $field_is_deleted = "is_deleted",
    $field_created_at = "created_at",
    $field_updated_at = "updated_at";

    public $error, $id, $npm, $kode, $tanggal_pinjam, $tanggal_kembali, $nama_petugas, $denda;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_count_kodebuku() {
        return $this->query("SELECT count($this->field_kode) AS total, $this->field_kode FROM $this->table GROUP BY $this->field_kode ORDER BY count($this->field_kode) DESC")->fetchAll();
    }
}