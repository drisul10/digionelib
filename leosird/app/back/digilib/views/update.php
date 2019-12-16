<?php
use config\Url;
use lang\Lang;

require_once Url::template_back_header();
?>

<div class="box">
    <div class="box-header with-border text-center">
        <h3 class="box-title">Edit Data E-book</h3>
    </div>

    <form class="needs-validation" action="<?=Url::BACK_DIGILIB_UPDATE_ACTION;?>" method="POST"
        enctype="multipart/form-data" novalidate>
        <div class="box-body">
            <?php if (isset($_GET["error_" . Lang::ERR_CODE_UPDATE_TO_DB])) : ?>
            <div class="form-row">
                <div class="col-md-12 alert alert-danger text-center" role="alert">
                    <?= Lang::ERR_MESSAGE_UPDATE_TO_DB; ?>
                </div>
            </div>
            <?php endif ?>

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <?php
                        $is_any_error_kode = false;

                        if ($this->get("error_" . $this->model->field_kode)) {
                            if ($this->get("error_" . $this->model->field_kode) === Lang::ERR_CODE_INPUT_KODEBUKU_DUPLICATE) {
                                $err_message_kode = Lang::ERR_MESSAGE_INPUT_KODEBUKU_DUPLICATE;
                            }

                            $is_any_error_kode = true;
                        }
                    ?>

                    <label for="kode">Kode Buku</label>
                    <input type="text" class="form-control <?=($is_any_error_kode ? "is-invalid" : ""); ?>"
                        name="<?=$this->model->field_kode;?>" id="kode" placeholder="Kode Buku"
                        value="<?= $data[$this->model->field_kode] ;?>" required>
                    <div class="invalid-feedback">
                        <?=($is_any_error_kode ? $err_message_kode : Lang::ERR_MESSAGE_INPUT_KODEBUKU_REQUIRED); ?>
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <label for="judul">Judul Buku</label>
                    <input type="text" class="form-control" name="<?=$this->model->field_judul;?>" id="judul"
                        placeholder="Judul Buku" value="<?= $data[$this->model->field_judul]; ?>" required>
                    <div class="invalid-feedback">
                        Judul buku harus diisi dengan benar
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="deskripsi">Deskripsi Buku</label>
                    <textarea class="form-control" name="<?=$this->model->field_deskripsi;?>" id="deskripsi" rows="3" required><?= $data[$this->model->field_deskripsi]; ?></textarea>
                    <div class="invalid-feedback">
                        Deskripsi buku harus diisi dengan benar
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="pengarang">Pengarang Buku</label>
                    <input type="text" class="form-control" name="<?=$this->model->field_pengarang;?>" id="pengarang"
                        placeholder="Pengarang Buku" value="<?= $data[$this->model->field_pengarang]; ?>" required>
                    <div class="invalid-feedback">
                        Pengarang buku harus diisi dengan benar
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="penerbit">Penerbit Buku</label>
                    <input type="text" class="form-control" name="<?=$this->model->field_penerbit;?>" id="penerbit"
                        placeholder="Penerbit Buku" value="<?= $data[$this->model->field_penerbit]; ?>" required>
                    <div class="invalid-feedback">
                        Penerbit buku harus diisi dengan benar
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="tahun">Tahun Terbit</label>
                    <input type="number" type="number" min="1900" max="2099" step="1" class="form-control"
                        name="<?=$this->model->field_tahun;?>" id="tahun" placeholder="Tahun Terbit"
                        value="<?= $data[$this->model->field_tahun]; ?>" required>
                    <div class="invalid-feedback">
                        Tahun terbit buku harus diisi dengan benar
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="tahun">Kategori Buku</label>
                    <select class="custom-select custom-select-lg mb-3" id="kategori"
                        name="<?=$this->model->field_kategori;?>">

                        <?php foreach ($data_all_book_ctg as $key => $value): ?>

                        <option value="<?=$value[$model_book_ctg->field_id];?>"
                            <?=($data[$this->model->field_kategori] == $value[$model_book_ctg->field_id] ? "selected=selected" : "");?>>
                            <?=$value[$model_book_ctg->field_nama];?>
                        </option>

                        <?php endforeach?>

                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <?php
                        $is_any_error_file_name = false;

                        if ($this->get("error_" . $this->model->field_file_name)) {
                            if ($this->get("error_" . $this->model->field_file_name) === Lang::ERR_CODE_FILE_NOT_UPLOADED) {
                                $err_message_file_name = Lang::ERR_MESSAGE_FILE_NOT_UPLOADED;
                            }

                            if ($this->get("error_" . $this->model->field_file_name) === Lang::ERR_CODE_FILE_WRONG_EXT) {
                                $err_message_file_name = Lang::ERR_MESSAGE_FILE_WRONG_EXT;
                            }

                            $is_any_error_file_name = true;
                        }
                    ?>

                    <label>File e-book</label>
                    <div class="custom-file">
                        <input type="file"
                            class="custom-file-input form-control <?=($is_any_error_file_name ? "is-invalid" : ""); ?>"
                            id="file" name="<?=$this->model->field_file_name;?>"
                            <?=($data[$this->model->field_file_name] ? "" : "required"); ?>>
                        <label class="custom-file-label" for="file">Unggah file berformat PDF</label>

                        <div class="invalid-feedback">
                            <?=($is_any_error_file_name ? $err_message_file_name : Lang::ERR_MESSAGE_FILE_REQUIRED); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <?php
                        $is_any_error_cover_name = false;

                        if ($this->get("error_" . $this->model->field_cover_name)) {
                            if ($this->get("error_" . $this->model->field_cover_name) === Lang::ERR_CODE_COVER_NOT_UPLOADED) {
                                $err_message_cover_name = Lang::ERR_MESSAGE_COVER_NOT_UPLOADED;
                            }

                            if ($this->get("error_" . $this->model->field_cover_name) === Lang::ERR_CODE_COVER_WRONG_EXT) {
                                $err_message_cover_name = Lang::ERR_MESSAGE_COVER_WRONG_EXT;
                            }

                            if ($this->get("error_" . $this->model->field_cover_name) === Lang::ERR_CODE_COVER_MAX_SIZE_UPLOADED) {
                                $err_message_cover_name = Lang::ERR_MESSAGE_COVER_MAX_SIZE_UPLOADED;
                                // . ' (maks:' . (int)(ini_get('upload_max_filesize')) . ')'
                            }

                            $is_any_error_cover_name = true;
                        }
                    ?>

                    <label>File cover e-book</label>
                    <div class="custom-file">
                        <input type="file"
                            class="custom-file-input form-control <?=($is_any_error_cover_name ? "is-invalid" : ""); ?>"
                            id="cover" name="<?=$this->model->field_cover_name;?>">
                        <label class="custom-file-label" for="cover">Unggah cover berformat JPG/PNG</label>

                        <div class="invalid-feedback">
                            <?=($is_any_error_cover_name ? $err_message_cover_name : Lang::ERR_MESSAGE_COVER_REQUIRED); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($data[$this->model->field_file_name]) : ?>
            <div class="form-row">
                <div class="col-md-4 mb-3"></div>
                <div class="col-md-4 mb-3">
                    <label style="text-align: left">File sebelumnya:
                        <a target="_blank"
                            href="<?= Url::BACK_DIGILIB_READ_PDF . "&" . $this->model->field_file_name . "=" . $data[$this->model->field_file_name]?>">
                            <?=$data[$this->model->field_file_name_ori]?>
                        </a>
                    </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label style="text-align: left">Cover sebelumnya:
                        <?=$data[$this->model->field_cover_name_ori]?>
                    </label>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <input type="hidden" name="i" value="<?=$data[$this->model->field_id]?>">
        <div class="box-footer">
            <button type="button" onclick="window.location.href='<?=Url::BACK_DIGILIB_INDEX?>'"
                class="btn btn-default">Batalkan</button>
            <button type="submit" name="process" class="btn btn-primary pull-right">Perbarui</button>
        </div>
    </form>
</div>

<?php require_once Url::template_back_footer();?>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

//clear invalid form
$('.needs-validation input').on('keyup', function() {
    $(this).removeClass('is-invalid');
    $(this).parents('.form-group').find('#error').html(" ");
});
$('.needs-validation input').on('click', function() {
    $(this).removeClass('is-invalid');
    $(this).parents('.form-group').find('#error').html(" ");
});

//get file name from uploaded file
$('#file').on('change', function() {
    var fileName = $(this).val().replace('C:\\fakepath\\', " ");

    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
})
</script>