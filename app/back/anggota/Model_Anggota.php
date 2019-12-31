<?php

namespace app\back\anggota;

use core\Base_Model;

class Model_Anggota extends Base_Model
{

    public $table = "anggota",
    $field_id = "_id",
    $field_npm = "npm",
    $field_email = "email",
    $field_nama_lengkap = "nama_lengkap",
    $field_password = "password",
    $field_alamat = "alamat",
    $field_status = "status",
    $field_no_hp = "no_hp",
    $field_is_deleted = "is_deleted",
    $field_is_password_generated = "is_password_generated",
    $field_created_at = "created_at",
    $field_updated_at = "updated_at";

    public $error, $id, $npm, $nama_lengkap, $password, $alamat, $status, $no_hp;

    public function __construct()
    {
        parent::__construct();
    }

    public function find_npm_one($npm)
    {
        return $this->query("SELECT $this->field_npm FROM $this->table WHERE $this->field_npm='$npm'")->numRows();
    }

    public function insert($data)
    {
        $q = $this->query("INSERT INTO $this->table (
                $this->field_id,
                $this->field_npm,
                $this->field_email,
                $this->field_nama_lengkap,
                $this->field_password,
                $this->field_alamat,
                $this->field_no_hp
            ) VALUES(
                '" . $data[$this->field_id] . "','" .
                $data[$this->field_npm] . "','" .
                $data[$this->field_email] . "','" .
                $data[$this->field_nama_lengkap] . "','" .
                $data[$this->field_password] . "','" .
                $data[$this->field_alamat] . "','" .
                $data[$this->field_no_hp] . "')
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
            $this->field_npm='" . $data[$this->field_npm] . "',
            $this->field_email='" . $data[$this->field_email] . "',
            $this->field_nama_lengkap='" . $data[$this->field_nama_lengkap] . "',
            $this->field_alamat='" . $data[$this->field_alamat] . "',
            $this->field_no_hp='" . $data[$this->field_no_hp] . "'
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
            $this->field_npm => $this->npm,
            $this->field_email => $this->email,
            $this->field_nama_lengkap => $this->nama_lengkap,
            $this->field_password => $this->password,
            $this->field_alamat => $this->alamat,
            $this->field_no_hp => $this->no_hp
        );
    }
}