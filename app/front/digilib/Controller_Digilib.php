<?php

namespace app\front\digilib;

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
        $model_kategori = new Model_Book_Category();
        $data_kategori = $model_kategori->get_all();

        // $data_latest_book6 = $this->model->get_limit(4);

        // require_once "views/list.php";
    }

    public function detail()
    {
        $data = $this->model->get_one($this->get($this->model->field_id));

        if (!$this->get($this->model->field_id) || !$data) {
            return header("location:" . Url::FRONT_DIGILIB_INDEX . "&error=" . Lang::ERR_CODE_UNKNOWN_DATA);
        }

        $model_book_ctg = new Model_Book_Category();
        $data_kategori = $model_book_ctg->get_all();
        $book_ctg_name = $model_book_ctg->get_one($data[$this->model->field_kategori])[$model_book_ctg->field_nama];

        require_once "views/detail.php";
    }

    public function category()
    {
        $model_kategori = new Model_Book_Category();
        $data = $model_kategori->get_one($this->get($model_kategori->field_id));

        if (!$this->get($model_kategori->field_id) || !$data) {
            return header("location:" . Url::FRONT_DIGILIB_INDEX . "&error=" . Lang::ERR_CODE_UNKNOWN_DATA);
        }

        $data_kategori = $model_kategori->get_all();
        $nama_kategori = $data[$model_kategori->field_nama];
        $data_book_by_ctg = $this->model->get_by_ctg($this->get($model_kategori->field_id));

        require_once "views/category.php";
    }

    public function search()
    {
        $model_kategori = new Model_Book_Category();
        $data_kategori = $model_kategori->get_all();

        if (isset($_POST['q'])) {
            $q = $_POST['q'];

            $data_book_by_search = $this->model->get_by_search($q);

            require_once "views/search.php";
        }

        return header("location:" . Url::FRONT_DIGILIB_INDEX . "&error=" . Lang::ERR_CODE_UNKNOWN_DATA);
    }

    public function read_pdf()
    {
        $filename = $_GET[$this->model->field_file_name];

        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=$filename");
        @readfile(Url::base_project() . "/leosird/app/back/digilib/files/" . $filename);
    }
}
