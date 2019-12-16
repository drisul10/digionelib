<?php
use config\Url;
use lang\Lang;

require_once Url::template_back_header();
?>

<div class="box">
    <div class="box-header with-border text-center">
        <h3 class="box-title">Edit Data Anggota</h3>
    </div>

    <form class="needs-validation" action="<?=Url::BACK_ANGGOTA_UPDATE_ACTION;?>" method="POST"
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
                        $is_any_error_npm = false;

                        if ($this->get("error_" . $this->model->field_npm)) {
                            if ($this->get("error_" . $this->model->field_npm) === Lang::ERR_CODE_INPUT_NPM_DUPLICATE) {
                                $err_message_npm = Lang::ERR_MESSAGE_INPUT_NPM_DUPLICATE;
                            }

                            $is_any_error_npm = true;
                        }
                    ?>

                    <label for="npm">NPM</label>
                    <input type="text" class="form-control <?=($is_any_error_npm ? "is-invalid" : ""); ?>"
                        name="<?=$this->model->field_npm;?>" id="npm" placeholder="NPM"
                        value="<?=$data[$this->model->field_npm];?>" required>
                    <div class="invalid-feedback">
                        <?=($is_any_error_npm ? $err_message_npm : Lang::ERR_MESSAGE_INPUT_NPM_REQUIRED); ?>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" name="<?=$this->model->field_nama_lengkap;?>" id="nama"
                        placeholder="Nama Lengkap" value="<?=$data[$this->model->field_nama_lengkap];?>" required>
                    <div class="invalid-feedback">
                        <?= Lang::ERR_MESSAGE_INPUT_NAMA_LENGKAP_REQUIRED; ?>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nohp">Nomor HP</label>
                    <input type="text" class="form-control" name="<?=$this->model->field_no_hp;?>" id="nohp"
                        placeholder="Nomor HP" value="<?=$data[$this->model->field_no_hp];?>" required>
                    <div class="invalid-feedback">
                        <?= Lang::ERR_MESSAGE_INPUT_NO_HP_REQUIRED; ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="<?=$this->model->field_email;?>" id="email"
                        placeholder="Nomor HP" value="<?=$data[$this->model->field_email];?>" required>
                    <div class="invalid-feedback">
                        <?= Lang::ERR_MESSAGE_INPUT_EMAIL_REQUIRED; ?>
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="<?=$this->model->field_alamat;?>" id="alamat"
                        placeholder="Alamat" value="<?= $data[$this->model->field_alamat]; ?>" required>
                    <div class="invalid-feedback">
                        <?= Lang::ERR_MESSAGE_INPUT_ALAMAT_REQUIRED; ?>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="i" value="<?=$data[$this->model->field_id]?>">
        <div class="box-footer">
            <button type="button" onclick="window.location.href='<?=Url::BACK_ANGGOTA_INDEX?>'"
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
</script>