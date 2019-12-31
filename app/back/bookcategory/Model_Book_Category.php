<?php

namespace app\back\bookcategory;

use core\Base_Model;

class Model_Book_Category extends Base_Model
{
    public $table = "kategori_buku",
    $field_id = "_id",
    $field_nama = "nama",
    $field_is_deleted = "is_deleted",
    $field_created_at = "created_at",
    $field_updated_at = "updated_at";

    public $error, $id, $nama;

    public function __construct()
    {
        parent::__construct();
    }

    public function find_nama_one($nama)
    {
        return $this->query("SELECT $this->field_nama FROM $this->table WHERE $this->field_nama='$nama'")->numRows();
    }

    public function insert($data)
    {
        $q = $this->query("INSERT INTO $this->table (
                $this->field_id,
                $this->field_nama
            ) VALUES(
                '" . $data[$this->field_id] . "','" .
                $data[$this->field_nama] . "')
        ");

        if ($q->affectedRows() == 1) {
            return true;
        }

        $this->error = mysqli_error($this->connection);

        return false;
    }

    public function update($id, $data)
    {
        $q = $this->query("UPDATE $this->table
            SET
                $this->field_nama='" . $data[$this->field_nama] . "'
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
            $this->field_nama => $this->nama
        );
    }
}
