<?php

namespace app\back\laporan_peminjaman;

use core\Base_Model;

class Model_Buku extends Base_Model
{
    public $table = "buku",
    $field_id = "kode_buku",
    $field_judul = "judul_buku",
    $field_pengarang = "pangarang",
    $field_tahun = "tahun",
    $field_kategori = "kategori",
    $field_penerbit = "penerbit",
    $field_lokasi_rak = "lokasi rak",
    $field_is_deleted = "is_deleted",
    $field_created_at = "created_at",
    $field_updated_at = "updated_at";

    public $error, $id, $judul, $pengarang, $tahun, $kategori, $penerbit, $lokasi_rak;

    public function __construct()
    {
        parent::__construct();
    }
}