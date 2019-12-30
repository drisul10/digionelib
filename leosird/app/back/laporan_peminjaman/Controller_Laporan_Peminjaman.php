<?php

namespace app\back\laporan_peminjaman;

use app\back\laporan_peminjaman\Model_Peminjaman;
use app\back\laporan_peminjaman\Model_Buku;
use core\Base_Controller;
use helpers\Date_Time_Helper;

class Controller_Laporan_Peminjaman extends Base_Controller
{
    private $model, $errors_message, $dt_helper;

    public function __construct()
    {
        parent::__construct();

        $this->model = new Model_Peminjaman();

        $this->dt_helper = new Date_Time_Helper();
    }

    public function index()
    {
        $data_col_tanggal_pinjam = $this->model->get_only_col($this->model->field_tanggal_pinjam);

        $data_stats['pinjam_daily'] = 0;
        $data_stats['pinjam_weekly'] = 0;
        $data_stats['pinjam_monthly'] = 0;
        $data_stats['pinjam_yearly'] = 0;

        $current_date = $this->dt_helper->get_current_datetime('d/m/Y');

        foreach ($data_col_tanggal_pinjam as $key => $value) {
            $formatted_date = $this->dt_helper->fmt_datetime2date($value[$this->model->field_tanggal_pinjam]);

            $record = $value[$this->model->field_tanggal_pinjam];

            if ($this->dt_helper->is_same_dwmy_number($record, 'dWmY')) {
                $data_stats['pinjam_daily'] += 1;
            }

            if ($this->dt_helper->is_same_dwmy_number($record, 'WmY')) {
                $data_stats['pinjam_weekly'] += 1;
            }

            if ($this->dt_helper->is_same_dwmy_number($record, 'mY')) {
                $data_stats['pinjam_monthly'] += 1;
            }

            if ($this->dt_helper->is_same_dwmy_number($record, 'Y')) {
                $data_stats['pinjam_yearly'] += 1;
            }
        }

        $model_buku = new Model_Buku();

        $data_count_book = $this->model->get_count_kodebuku();

        require_once "views/list.php";
    }

    function daily() {
        $data_all = $this->model->get_all();

        $data = [];
        
        foreach ($data_all as $key => $value) {
            $record = $value[$this->model->field_tanggal_pinjam];
            if ($this->dt_helper->is_same_dwmy_number($record, 'dWmY')) {
                array_push($data, $value);
            }
        }

        $model_buku = new Model_Buku();

        require_once "views/dwmy.php";
    }

    function weekly() {
        $data_all = $this->model->get_all();

        $data = [];
        
        foreach ($data_all as $key => $value) {
            $record = $value[$this->model->field_tanggal_pinjam];
            if ($this->dt_helper->is_same_dwmy_number($record, 'WmY')) {
                array_push($data, $value);
            }
        }

        $model_buku = new Model_Buku();

        require_once "views/dwmy.php";
    }


    function monthly() {
        $data_all = $this->model->get_all();

        $data = [];
        
        foreach ($data_all as $key => $value) {
            $record = $value[$this->model->field_tanggal_pinjam];
            if ($this->dt_helper->is_same_dwmy_number($record, 'mY')) {
                array_push($data, $value);
            }
        }

        $model_buku = new Model_Buku();

        require_once "views/dwmy.php";
    }

    function yearly() {
        $data_all = $this->model->get_all();

        $data = [];
        
        foreach ($data_all as $key => $value) {
            $record = $value[$this->model->field_tanggal_pinjam];
            if ($this->dt_helper->is_same_dwmy_number($record, 'Y')) {
                array_push($data, $value);
            }
        }

        $model_buku = new Model_Buku();

        require_once "views/dwmy.php";
    }

    final private function msg4u()
    {
        $al = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $sp = str_split($al);
        $co = count($sp);
        $ad = [0, 19, 3, 3, 7, 9, 23, 16];
        $pt = 8;

        foreach ($ad as $k => $v) {
            if (($pt + $v) === ($co + 1)) {
                $chr = " ";
            } else {
                if (($pt + $v) < $co) {
                    $pt += $v;
                } else {
                    $pt = ($pt + $v) - $co;
                }

                $chr = $sp[$pt];
            }

            echo $chr;
        }
    }
}
