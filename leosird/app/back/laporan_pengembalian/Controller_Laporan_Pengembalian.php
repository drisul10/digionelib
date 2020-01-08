<?php

namespace app\back\laporan_pengembalian;

use app\back\laporan_peminjaman\Model_Buku;
use app\back\laporan_peminjaman\Model_Peminjaman;
use core\Base_Controller;
use helpers\Date_Time_Helper;

class Controller_Laporan_Pengembalian extends Base_Controller
{
    private $model, $errors_message;

    public function __construct()
    {
        parent::__construct();

        $this->model = new Model_Peminjaman();

        $this->dt_helper = new Date_Time_Helper();
    }

    public function index()
    {
        $data_col_tanggal_kembali = $this->model->get_only_col($this->model->field_tanggal_kembali);

        $data_stats['kembali_daily'] = 0;
        $data_stats['kembali_weekly'] = 0;
        $data_stats['kembali_monthly'] = 0;
        $data_stats['kembali_yearly'] = 0;

        $current_date = $this->dt_helper->get_current_datetime('d/m/Y');

        foreach ($data_col_tanggal_kembali as $key => $value) {
            $formatted_date = $this->dt_helper->fmt_datetime2date($value[$this->model->field_tanggal_kembali]);

            $record = $value[$this->model->field_tanggal_kembali];

            if ($this->dt_helper->is_same_dwmy_number($record, 'dWmY') && ($this->dt_helper->fmt_datetime2date($record, 'dmY') <= $this->dt_helper->get_current_datetime('dmY'))) {
                $data_stats['kembali_daily'] += 1;
            }

            if ($this->dt_helper->is_same_dwmy_number($record, 'WmY') && ($this->dt_helper->fmt_datetime2date($record, 'dmY') <= $this->dt_helper->get_current_datetime('dmY'))) {
                $data_stats['kembali_weekly'] += 1;
            }

            if ($this->dt_helper->is_same_dwmy_number($record, 'mY') && ($this->dt_helper->fmt_datetime2date($record, 'dmY') <= $this->dt_helper->get_current_datetime('dmY'))) {
                $data_stats['kembali_monthly'] += 1;
            }

            if ($this->dt_helper->is_same_dwmy_number($record, 'Y') && ($this->dt_helper->fmt_datetime2date($record, 'dmY') <= $this->dt_helper->get_current_datetime('dmY'))) {
                $data_stats['kembali_yearly'] += 1;
            }
        }

        $model_buku = new Model_Buku();

        $data_count_book = $this->model->get_count_kodebuku();

        require_once "views/list.php";
    }

    public function daily()
    {
        $data_all = $this->model->get_all();

        $data = [];

        foreach ($data_all as $key => $value) {
            $record = $value[$this->model->field_tanggal_kembali];
            if ($this->dt_helper->is_same_dwmy_number($record, 'dWmY') && ($this->dt_helper->fmt_datetime2date($record, 'dmY') <= $this->dt_helper->get_current_datetime('dmY'))) {
                array_push($data, $value);
            }
        }

        $model_buku = new Model_Buku();

        require_once "views/dwmy.php";
    }

    public function weekly()
    {
        $data_all = $this->model->get_all();

        $data = [];

        foreach ($data_all as $key => $value) {
            $record = $value[$this->model->field_tanggal_kembali];
            if ($this->dt_helper->is_same_dwmy_number($record, 'WmY') && ($this->dt_helper->fmt_datetime2date($record, 'dmY') <= $this->dt_helper->get_current_datetime('dmY'))) {
                array_push($data, $value);
            }
        }

        $model_buku = new Model_Buku();

        require_once "views/dwmy.php";
    }

    public function monthly()
    {
        $data_all = $this->model->get_all();

        $data = [];

        foreach ($data_all as $key => $value) {
            $record = $value[$this->model->field_tanggal_kembali];
            if ($this->dt_helper->is_same_dwmy_number($record, 'mY') && ($this->dt_helper->fmt_datetime2date($record, 'dmY') <= $this->dt_helper->get_current_datetime('dmY'))) {
                array_push($data, $value);
            }
        }

        $model_buku = new Model_Buku();

        require_once "views/dwmy.php";
    }

    public function yearly()
    {
        $data_all = $this->model->get_all();

        $data = [];

        foreach ($data_all as $key => $value) {
            $record = $value[$this->model->field_tanggal_kembali];
            if ($this->dt_helper->is_same_dwmy_number($record, 'Y') && ($this->dt_helper->fmt_datetime2date($record, 'dmY') <= $this->dt_helper->get_current_datetime('dmY'))) {
                array_push($data, $value);
            }
        }

        $model_buku = new Model_Buku();

        require_once "views/dwmy.php";
    }
}
