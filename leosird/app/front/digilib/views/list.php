<?php
use config\Url;

require_once Url::template_front_header();
?>
<div class="col-lg-2">
    <label>Kategori</label>
    <?php foreach ($data_kategori as $key => $value): ?>
    <div class="row">
        <a
            href="<?=Url::FRONT_DIGILIB_CATEGORY . "&" . $this->model->field_id . "=" . $value[$model_kategori->field_id];?>"><?=$value[$model_kategori->field_nama];?></a>
    </div>
    <?php endforeach;?>
</div>
<div class="col-lg-10">
    <div class="row">
        <form action="<?=Url::FRONT_DIGILIB_SEARCH;?>" method="POST">
            <div class="col-lg-10">
                <input type="text" class="form-control" name="q" placeholder="Cari Buku" required />
            </div>
            <button type="submit" name="search" class="btn btn-primary">Cari</button>
        </form>
    </div>

    <br>
    <br>

    <label>E-book Terbaru</label>
    <div class="row">
        <?php foreach ($data_latest_book6 as $key => $value): ?>
        <div class="col-lg-3">
            <div class="card" style="background: white !important">
                <img width="100%" height="200px" class="card-img-top"
                    src="<?=Url::PATH_DIGILIB_COVER . $value[$this->model->field_cover_name];?>" alt="img">
                <div class="card-body">
                    <h5 class="card-title"><?=$value[$this->model->field_judul];?></h5>
                    <p class="card-text"><?=$value[$this->model->field_pengarang];?></p>
                    <a href="<?=Url::FRONT_DIGILIB_DETAIL?>&<?=$this->model->field_id;?>=<?=$value[$this->model->field_id]?>"
                        class="btn btn-default">Detail</a>
                    <a target="_blank"
                        href="<?=Url::FRONT_DIGILIB_READ_PDF . "&" . $this->model->field_file_name . "=" . $value[$this->model->field_file_name]?>"
                        class="btn btn-primary">Download</a>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>

<?php require_once Url::template_front_footer();?>