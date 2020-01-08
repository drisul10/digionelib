<?php
use config\Url;

require_once Url::template_back_header();
?>

<div class="box">
    <div class="box-header with-border text-center">
        <h3 class="box-title">Detail Anggota</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-3 mb-3">
            </div>
            <div class="col-md-8 mb-3">
                <div class="row">
                    <div class="col-md-3"><strong class="text-uppercase">NPM</strong></div>
                    <div class="col-md-9"><?= $data[$this->model->field_npm]; ?></div>
                </div>
                <div class="row">
                    <div class="col-md-3"><strong class="text-uppercase">Nama Lengkap</strong></div>
                    <div class="col-md-9"><?= $data[$this->model->field_nama_lengkap]; ?></div>
                </div>
                <div class="row">
                    <div class="col-md-3"><strong class="text-uppercase">Email</strong></div>
                    <div class="col-md-9"><?= $data[$this->model->field_email]; ?></div>
                </div>
                <div class="row">
                    <div class="col-md-3"><strong class="text-uppercase">Alamat</strong></div>
                    <div class="col-md-9"><?= $data[$this->model->field_alamat]; ?></div>
                </div>
                <div class="row">
                    <div class="col-md-3"><strong class="text-uppercase">No HP</strong></div>
                    <div class="col-md-9"><?= $data[$this->model->field_no_hp]; ?></div>
                </div>
                <div class="row">
                    <div class="col-md-3"><strong class="text-uppercase">Status</strong></div>
                    <div class="col-md-9"><?= $data[$this->model->field_status]; ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="button" onclick="window.location.href='<?=Url::BACK_ANGGOTA_INDEX?>'"
            class="btn btn-default">Kembali</button>
    </div>
</div>

<?php require_once Url::template_back_footer();?>