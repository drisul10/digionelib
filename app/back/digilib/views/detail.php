<?php
use config\Url;

require_once Url::template_back_header();
?>

<div class="box">
    <div class="box-header with-border text-center">
        <h3 class="box-title">Detail E-book</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-3 mb-3">
                <img style="width: 200px; height: 300px"
                    src="<?= Url::PATH_DIGILIB_COVER . $data[$this->model->field_cover_name]; ?>" alt="..."
                    class="img-thumbnail">
            </div>
            <div class="col-md-8 mb-3">
                <div class="row">
                    <h2><?=$data[$this->model->field_judul]; ?></h2>
                </div>
                <div class="row">
                    <h4 style="margin: 0!important;"><?=$data[$this->model->field_pengarang]; ?></h4>
                </div>
                <div class="row">
                    <hr style="margin: 0!important; margin-top: 5px!important; margin-bottom: 5px!important;" />
                </div>
                <div class="row">
                    <p><?=$data[$this->model->field_deskripsi]; ?></p>
                </div>
                <div class="row">
                    <div class="col-md-3"><strong class="text-uppercase">Kode Buku</strong></div>
                    <div class="col-md-9"><?=$data[$this->model->field_kode]; ?></div>
                </div>
                <div class="row">
                    <div class="col-md-3"><strong class="text-uppercase">Nama Penerbit</strong></div>
                    <div class="col-md-9"><?=$data[$this->model->field_penerbit]; ?></div>
                </div>
                <div class="row">
                    <div class="col-md-3"><strong class="text-uppercase">Tahun Terbit</strong></div>
                    <div class="col-md-9"><?=$data[$this->model->field_tahun]; ?></div>
                </div>
                <div class="row">
                    <div class="col-md-3"><strong class="text-uppercase">Kategori Buku</strong></div>
                    <div class="col-md-9"><?= $book_ctg_name; ?></div>
                </div>
                <div class="row" style="margin-top: 15px">
                    <a type="button" class="btn btn-info" target="_blank"
                        href="<?=Url::BACK_DIGILIB_READ_PDF ."&" . $this->model->field_file_name . "=" . $data[$this->model->field_file_name]?>">
                        Lihat PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="button" onclick="window.location.href='<?=Url::BACK_DIGILIB_INDEX?>'"
            class="btn btn-default">Kembali</button>
    </div>
</div>

<?php require_once Url::template_back_footer();?>