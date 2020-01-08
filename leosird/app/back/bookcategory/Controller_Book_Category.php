<?php

namespace app\back\bookcategory;

use app\back\bookcategory\Model_Book_Category;
use config\Url;
use core\Base_Controller;
use lang\Lang;

class Controller_Book_Category extends Base_Controller
{

    private $model, $errors_message;

    public function __construct()
    {
        parent::__construct();

        $this->model = new Model_Book_Category();
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
        
        if ($this->validateForm() &&
            $this->model->insert($this->model->prepare_data())
        ) {
            return header("location:" . Url::BACK_BOOK_CATEGORY_INDEX . "&success=" . Lang::OK_CODE_INSERT_TO_DB);
        }

        // die($this->model->error);
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

        return header("location:" . Url::BACK_BOOK_CATEGORY_CREATE .
            "&b4=" .
            "&" . $this->model->field_nama . "=" . $this->model->nama .
            $data_error);
    }

    public function update()
    {

        $data = $this->model->get_one($this->get($this->model->field_id));

        if (!$this->get($this->model->field_id) || !$data) {
            die ($this->get($this->model->field_id));
            return header("location:" . Url::BACK_BOOK_CATEGORY_INDEX . "&error=" . Lang::ERR_CODE_UNKNOWN_DATA);
        }

        require_once "views/update.php";
    }

    public function update_action()
    {
        if ($this->validateForm("update") &&
            $this->model->update($this->model->id, $this->model->prepare_data("update"))
        ) {
            return header("location:" . Url::BACK_BOOK_CATEGORY_INDEX . "&success=" . Lang::OK_CODE_UPDATE_TO_DB);
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

        return header("location:" . Url::BACK_BOOK_CATEGORY_UPDATE .
            "&b4=" .
            "&" . $this->model->field_id . "=" . $this->model->id .
            $data_error);
    }

    public function delete()
    {
        if ($this->model->drop($this->get($this->model->field_id))) {
            return header("location:" . Url::BACK_BOOK_CATEGORY_INDEX . "&success=" . Lang::OK_CODE_DROP_TO_DB);
        }

        return header("location:" . Url::BACK_BOOK_CATEGORY_INDEX . "&error=" . Lang::ERR_CODE_DROP_TO_DB);
    }

    private function validateForm($type="create")
    {
        if ($type == "update") {
            $this->model->id = $_POST['i'];
        }

        $this->model->nama = $_POST[$this->model->field_nama];

        $is_not_duplicate_nama = false;

        //check duplicate nama
        if ($type == "update" && ($this->model->get_one($this->model->id)[$this->model->field_nama] == $this->model->nama)) {
            $is_not_duplicate_nama = true;
        } else {
            if ($this->model->find_nama_one($this->model->nama) == 0) {
                $is_not_duplicate_nama = true;
            } else {
                $this->errors_message[$this->model->field_nama] = Lang::ERR_CODE_INPUT_NAMAKATEGORI_DUPLICATE;
            }
        }

        if (!empty($is_not_duplicate_nama)) {
            return true;
        }

        return false;
    }
}
