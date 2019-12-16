<?php

namespace app\back\digilib;

use core\Base_Model;

class Model_Digilib extends Base_Model
{

    public $table = "ebook",
    $field_id = "_id",
    $field_kode = "kode_buku",
    $field_judul = "judul_buku",
    $field_deskripsi = "deskripsi_buku",
    $field_pengarang = "pengarang",
    $field_penerbit = "penerbit",
    $field_tahun = "tahun",
    $field_kategori = "kategori",
    $field_file_name = "nama_file",
    $field_file_name_ori = "nama_file_ori",
    $field_cover_name = "nama_cover",
    $field_cover_name_ori = "nama_cover_ori",
    $field_is_deleted = "is_deleted",
    $field_created_at = "created_at",
    $field_updated_at = "updated_at";

    public $error, $id, $kode, $judul, $pengarang, $penerbit, $tahun, $kategori, $file_name;

    public function __construct()
    {
        parent::__construct();
    }

    public function find_kode_one($kode)
    {
        return $this->query("SELECT $this->field_kode FROM $this->table WHERE $this->field_kode='$kode'")->numRows();
    }

    public function insert($data)
    {
        $q = $this->query("INSERT INTO $this->table (
                $this->field_id,
                $this->field_kode,
                $this->field_judul,
                $this->field_deskripsi,
                $this->field_pengarang,
                $this->field_penerbit,
                $this->field_tahun,
                $this->field_kategori,
                $this->field_file_name,
                $this->field_file_name_ori,
                $this->field_cover_name,
                $this->field_cover_name_ori
            ) VALUES(
                '" . $data[$this->field_id] . "','" .
                $data[$this->field_kode] . "','" .
                $data[$this->field_judul] . "','" .
                $data[$this->field_deskripsi] . "','" .
                $data[$this->field_pengarang] . "','" .
                $data[$this->field_penerbit] . "','" .
                $data[$this->field_tahun] . "','" .
                $data[$this->field_kategori] . "','" .
                $data[$this->field_file_name] . "','" .
                $data[$this->field_file_name_ori] . "','" .
                $data[$this->field_cover_name] . "','" .
                $data[$this->field_cover_name_ori] . "')
        ");

        if ($q->affectedRows() == 1) {
            return true;
        }

        $this->error = mysqli_error($this->connection);

        return false;
    }

    public function update($id, $data)
    {
        if ($data[$this->field_file_name] != "") {
            $data_file_name = "," . $this->field_file_name . "='" . $data[$this->field_file_name] . "'";
        } else {
            $data_file_name = '';
        }

        if ($data[$this->field_cover_name] != "") {
            $data_cover_name = "," . $this->field_cover_name . "='" . $data[$this->field_cover_name] . "'";
        } else {
            $data_cover_name = '';
        }

        $q = $this->query("UPDATE $this->table
        SET
            $this->field_kode='" . $data[$this->field_kode] . "',
            $this->field_judul='" . $data[$this->field_judul] . "',
            $this->field_pengarang='" . $data[$this->field_pengarang] . "',
            $this->field_penerbit='" . $data[$this->field_penerbit] . "',
            $this->field_tahun='" . $data[$this->field_tahun] . "',
            $this->field_kategori='" . $data[$this->field_kategori] . "'
            $data_file_name
            $data_cover_name
        WHERE $this->field_id='$id'");

        if ($q->affectedRows() == 1) {
            return true;
        }

        $this->error = mysqli_error($this->connection);

        return false;
    }

    public function prepare_data($type = "insert")
    {
        if ($type == "insert") {
            $this->id = uniqid();
        }

        return array(
            $this->field_id => $this->id,
            $this->field_kode => $this->kode,
            $this->field_judul => $this->judul,
            $this->field_deskripsi => $this->deskripsi,
            $this->field_pengarang => $this->pengarang,
            $this->field_penerbit => $this->penerbit,
            $this->field_tahun => $this->tahun,
            $this->field_kategori => $this->kategori,
            $this->field_file_name => $this->file_name,
            $this->field_file_name_ori => $this->file_name_ori,
            $this->field_cover_name => $this->cover_name,
            $this->field_cover_name_ori => $this->cover_name_ori
        );
    }
}