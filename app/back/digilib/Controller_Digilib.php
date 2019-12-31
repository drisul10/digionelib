<?php

namespace app\back\digilib;

use app\back\bookcategory\Model_Book_Category;
use app\back\digilib\Model_Digilib;
use config\Url;
use core\Base_Controller;
use lang\Lang;

class Controller_Digilib extends Base_Controller
{
    private $model, $errors_message;

    public function __construct()
    {
        parent::__construct();

        $this->model = new Model_Digilib();
    }

    public function index()
    {
        $data = $this->model->get_all();

        //call model book's category
        $model_book_ctg = new Model_Book_Category();

        require_once "views/list.php";
    }

    public function create()
    {
        //call model book's category
        $model_book_ctg = new Model_Book_Category();

        $data_all_book_ctg = $model_book_ctg->get_all();

        require_once "views/create.php";
    }

    public function create_action()
    {

        if ($this->validForm() &&
            $this->fileUploaded() &&
            $this->coverUploaded() &&
            $this->model->insert($this->model->prepare_data())
        ) {
            return header("location:" . Url::BACK_DIGILIB_INDEX . "&success=" . Lang::OK_CODE_INSERT_TO_DB);
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

        return header("location:" . Url::BACK_DIGILIB_CREATE .
            "&b4=" .
            "&" . $this->model->field_kode . "=" . $this->model->kode .
            "&" . $this->model->field_judul . "=" . $this->model->judul .
            "&" . $this->model->field_deskripsi . "=" . $this->model->deskripsi .
            "&" . $this->model->field_pengarang . "=" . $this->model->pengarang .
            "&" . $this->model->field_penerbit . "=" . $this->model->penerbit .
            "&" . $this->model->field_tahun . "=" . $this->model->tahun .
            "&" . $this->model->field_kategori . "=" . $this->model->kategori .
            "&" . $this->model->field_file_name . "=" . $this->model->file_name .
            $data_error);
    }

    public function detail()
    {
        $data = $this->model->get_one($this->get($this->model->field_id));

        if (!$this->get($this->model->field_id) || !$data) {
            return header("location:" . Url::BACK_DIGILIB_INDEX . "&error=" . Lang::ERR_CODE_UNKNOWN_DATA);
        }

        $model_book_ctg = new Model_Book_Category();
        $book_ctg_name = $model_book_ctg->get_one($data[$this->model->field_kategori])[$model_book_ctg->field_nama];

        require_once "views/detail.php";
    }

    public function update()
    {
        $data = $this->model->get_one($this->get($this->model->field_id));

        if (!$this->get($this->model->field_id) || !$data) {
            return header("location:" . Url::BACK_DIGILIB_INDEX . "&error=" . Lang::ERR_CODE_UNKNOWN_DATA);
        }

        $model_book_ctg = new Model_Book_Category();
        $data_all_book_ctg = $model_book_ctg->get_all();

        require_once "views/update.php";
    }

    public function update_action()
    {
        if ($this->validForm("update") &&
            $this->fileUploaded("update") &&
            $this->coverUploaded("update") &&
            $this->model->update($this->model->id, $this->model->prepare_data("update"))
        ) {
            return header("location:" . Url::BACK_DIGILIB_INDEX . "&success=" . Lang::OK_CODE_UPDATE_TO_DB);
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

        return header("location:" . Url::BACK_DIGILIB_UPDATE .
            "&b4=" .
            "&" . $this->model->field_id . "=" . $this->model->id .
            $data_error);
    }

    public function delete()
    {
        if ($this->model->drop($this->get($this->model->field_id))) {
            return header("location:" . Url::BACK_DIGILIB_INDEX . "&success=" . Lang::OK_CODE_DROP_TO_DB);
        }

        return header("location:" . Url::BACK_DIGILIB_INDEX . "&error=" . Lang::ERR_CODE_DROP_TO_DB);
    }

    private function validForm($type = "crete")
    {
        if ($type == "update") {
            $this->model->id = $_POST['i'];
        }

        $this->model->kode = $_POST[$this->model->field_kode];
        $this->model->judul = $_POST[$this->model->field_judul];
        $this->model->deskripsi = $_POST[$this->model->field_deskripsi];
        $this->model->pengarang = $_POST[$this->model->field_pengarang];
        $this->model->penerbit = $_POST[$this->model->field_penerbit];
        $this->model->tahun = $_POST[$this->model->field_tahun];
        $this->model->kategori = $_POST[$this->model->field_kategori];
        $this->model->file_name = basename($_FILES[$this->model->field_file_name]['name']);
        $this->model->file_name_ori = basename($_FILES[$this->model->field_file_name]['name']);
        $this->model->cover_name = basename($_FILES[$this->model->field_cover_name]['name']);
        $this->model->cover_name_ori = basename($_FILES[$this->model->field_cover_name]['name']);

        $is_valid_tahun = false;
        $is_not_error_file = false;
        $is_file_pdf = false;
        $is_not_error_cover = false;
        $is_cover_format = false;
        $is_not_duplicate_kode = false;

        //check file upload error
        if ($type == "update") {
            $is_not_error_file = true;
        } else {
            if ($_FILES[$this->model->field_file_name]['error'] == 0) {
                $is_not_error_file = true;
            } else {
                $this->errors_message[$this->model->field_file_name] = Lang::ERR_CODE_FILE_NOT_UPLOADED;
            }
        }

        //check file upload extension
        if ($type == "update") {
            $is_file_pdf = true;
        } else {
            $ext = pathinfo($this->model->file_name, PATHINFO_EXTENSION);
            $allowed_ext = array('pdf');

            if (in_array($ext, $allowed_ext)) {
                $is_file_pdf = true;
            } else {
                $this->errors_message[$this->model->field_file_name] = Lang::ERR_CODE_FILE_WRONG_EXT;
            }
        }

        //check cover upload error
        if ($type == "update") {
            $is_not_error_cover = true;
        } else {
            if ($_FILES[$this->model->field_cover_name]['error'] == 0) {
                $is_not_cover_cover = true;
            } else {
                if ($_FILES[$this->model->field_cover_name]['error'] == 1) {
                    $this->errors_message[$this->model->field_cover_name] = Lang::ERR_CODE_COVER_MAX_SIZE_UPLOADED;
                } else {
                    $this->errors_message[$this->model->field_cover_name] = Lang::ERR_CODE_COVER_NOT_UPLOADED;
                }
            }
        }

        //check cover upload extension
        if ($type == "update") {
            $is_cover_format = true;
        } else {
            $ext = pathinfo($this->model->cover_name, PATHINFO_EXTENSION);
            $allowed_ext = array('png', 'jpg');

            if (in_array($ext, $allowed_ext)) {
                $is_cover_format = true;
            } else {
                $this->errors_message[$this->model->field_cover_name] = Lang::ERR_CODE_COVER_WRONG_EXT;
            }
        }

        //validate tahun
        if ($this->model->tahun > 1900 && $this->model->tahun < 2100) {
            $is_valid_tahun = true;
        } else {
            $this->errors_message[$this->model->field_tahun] = Lang::ERR_CODE_INPUT_WRONG_YEAR;
        }

        //check duplicate kodebuku
        if ($type == "update" && ($this->model->get_one($this->model->id)[$this->model->field_kode] == $this->model->kode)) {
            $is_not_duplicate_kode = true;
        } else {
            if ($this->model->find_kode_one($this->model->kode) == 0) {
                $is_not_duplicate_kode = true;
            } else {
                $this->errors_message[$this->model->field_kode] = Lang::ERR_CODE_INPUT_KODEBUKU_DUPLICATE;
            }
        }

        if (!empty($is_valid_tahun && $is_not_error_file && $is_file_pdf && $is_not_duplicate_kode)) {
            return true;
        }

        return false;
    }

    private function fileUploaded($type = "create")
    {
        if (($type == "update") && $_FILES[$this->model->field_file_name]['error'] > 0) {
            $this->model->file_name = "";
            return true;
        }

        $target_folder = __DIR__ . "/files/";
        $tmp_name = $_FILES[$this->model->field_file_name]['tmp_name'];
        $new_format_name = $this->model->kode . "_" . $this->model->file_name;
        $upload_file = $target_folder . $new_format_name;
        $file_type = $_FILES[$this->model->field_file_name]['type'];

        if ($file_type == "application/pdf") {
            if (move_uploaded_file($tmp_name, $upload_file)) {
                //update filename prepare to insert
                $this->model->file_name = $new_format_name;
                return true;
            } else {
                $this->errors_message[$this->model->field_file_name] = Lang::ERR_CODE_FILE_NOT_UPLOADED;
                return false;
            }
        } else {
            $this->errors_message[$this->model->field_file_name] = Lang::ERR_CODE_FILE_WRONG_EXT;
            return false;
        }
    }

    private function coverUploaded($type = "create")
    {
        if (($type == "update") && $_FILES[$this->model->field_cover_name]['error'] > 0) {
            $this->model->cover_name = "";
            return true;
        }

        $target_folder = __DIR__ . "/files/";
        $tmp_name = $_FILES[$this->model->field_cover_name]['tmp_name'];
        $new_format_name = $this->model->kode . "_" . $this->model->cover_name;
        $upload_file = $target_folder . $new_format_name;
        $file_type = $_FILES[$this->model->field_cover_name]['type'];

        if (move_uploaded_file($tmp_name, $upload_file)) {
            //update filename prepare to insert
            $this->model->cover_name = $new_format_name;
            return true;
        } else {
            $this->errors_message[$this->model->field_cover_name] = Lang::ERR_CODE_COVER_NOT_UPLOADED;
            return false;
        }
    }

    public function read_pdf()
    {
        $filename = $_GET[$this->model->field_file_name];

        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=$filename");
        @readfile(__DIR__ . "/files/" . $filename);
    }
}
