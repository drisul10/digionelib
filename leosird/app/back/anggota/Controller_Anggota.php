<?php

namespace app\back\anggota;

use app\back\anggota\Model_Anggota;
use config\Url;
use core\Base_Controller;
use lang\Lang;

class Controller_Anggota extends Base_Controller
{
    private $model, $errors_message;

    public function __construct()
    {
        parent::__construct();

        $this->model = new Model_Anggota();
    }

    public function index()
    {
        $data = $this->model->get_all();

        require_once "views/list.php";
    }

    public function create()
    {
        require_once "views/create.php";
    }

    public function create_action()
    {

        if ($this->validForm() &&
            $this->model->insert($this->model->prepare_data())
        ) {
            return header("location:" . Url::BACK_ANGGOTA_INDEX . "&success=" . Lang::OK_CODE_INSERT_TO_DB);
        }

        //die($this->model->error);
        if ($this->model->error) {
            $this->errors_message[Lang::ERR_CODE_INSERT_TO_DB] = "";
        }

        //generate error message
        $data_error = "";

        if ($this->errors_message) {
            foreach ($this->errors_message as $key => $value) {
                $data_error .= "&error_$key=$value";
            }
        }

        return header("location:" . Url::BACK_ANGGOTA_CREATE .
            "&b4=" .
            "&" . $this->model->field_npm . "=" . $this->model->npm .
            "&" . $this->model->field_email . "=" . $this->model->email .
            "&" . $this->model->field_nama_lengkap . "=" . $this->model->nama_lengkap .
            "&" . $this->model->field_no_hp . "=" . $this->model->no_hp .
            "&" . $this->model->field_alamat . "=" . $this->model->alamat .
            $data_error);
    }

    public function detail()
    {
        $data = $this->model->get_one($this->get($this->model->field_id));

        if (!$this->get($this->model->field_id) || !$data) {
            return header("location:" . Url::BACK_ANGGOTA_INDEX . "&error=" . Lang::ERR_CODE_UNKNOWN_DATA);
        }

        require_once "views/detail.php";
    }

    public function update()
    {
        $data = $this->model->get_one($this->get($this->model->field_id));

        if (!$this->get($this->model->field_id) || !$data) {
            return header("location:" . Url::BACK_ANGGOTA_INDEX . "&error=" . Lang::ERR_CODE_UNKNOWN_DATA);
        }

        require_once "views/update.php";
    }

    public function update_action()
    {
        if ($this->validForm("update") &&
            $this->model->update($this->model->id, $this->model->prepare_data("update"))
        ) {
            return header("location:" . Url::BACK_ANGGOTA_INDEX . "&success=" . Lang::OK_CODE_UPDATE_TO_DB);
        }

        // die($this->model->error);
        if ($this->model->error) {
            $this->errors_message[Lang::ERR_CODE_UPDATE_TO_DB] = "";
        }

        //generate error message
        $data_error = "";

        if ($this->errors_message) {
            foreach ($this->errors_message as $key => $value) {
                $data_error .= "&error_$key=$value";
            }
        }

        return header("location:" . Url::BACK_ANGGOTA_UPDATE .
            "&b4=" .
            "&" . $this->model->field_id . "=" . $this->model->id .
            $data_error);
    }

    public function delete()
    {
        if ($this->model->drop($this->get($this->model->field_id))) {
            return header("location:" . Url::BACK_ANGGOTA_INDEX . "&success=" . Lang::OK_CODE_DROP_TO_DB);
        }

        return header("location:" . Url::BACK_ANGGOTA_INDEX . "&error=" . Lang::ERR_CODE_DROP_TO_DB);
    }

    private function validForm($type = "crete")
    {
        if ($type == "update") {
            $this->model->id = $_POST['i'];
        }

        $this->model->npm = $_POST[$this->model->field_npm];
        $this->model->email = $_POST[$this->model->field_email];
        $this->model->nama_lengkap = $_POST[$this->model->field_nama_lengkap];
        $this->model->no_hp = $_POST[$this->model->field_no_hp];
        $this->model->alamat = $_POST[$this->model->field_alamat];
        $this->model->password = $this->password_generate();

        $is_not_duplicate_npm = false;

        //check duplicate npm
        if ($type == "update" && ($this->model->get_one($this->model->id)[$this->model->field_npm] == $this->model->npm)) {
            $is_not_duplicate_npm = true;
        } else {
            if ($this->model->find_npm_one($this->model->npm) == 0) {
                $is_not_duplicate_npm = true;
            } else {
                $this->errors_message[$this->model->field_npm] = Lang::ERR_CODE_INPUT_NPM_DUPLICATE;
            }
        }

        if (!empty($is_not_duplicate_npm)) {
            return true;
        }

        return false;
    }

    public function password_generate($len=6)
    {
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($data), 0, $len);
    }
}
