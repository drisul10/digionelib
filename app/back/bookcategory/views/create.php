<?php
use config\Url;
use lang\Lang;

require_once Url::template_back_header();
?>

<div class="box">
    <div class="box-header with-border text-center">
        <h3 class="box-title">Tambah Data Baru</h3>
    </div>

    <form class="needs-validation" action="<?=Url::BACK_BOOK_CATEGORY_CREATE_ACTION?>" method="POST">
        <div class="box-body" novalidate>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="nama">Nama Kategori Buku</label>
                    <input type="text" class="form-control" name="<?=$this->model->field_nama;?>" id="nama"
                        placeholder="Nama Kategori Buku" value="<?=$this->get($this->model->field_nama);?>" required>
                    <div class="invalid-feedback">
                        Nama kategori buku harus diisi dengan benar
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="button" onclick="window.location.href='<?=Url::BACK_BOOK_CATEGORY_INDEX; ?>'"
                class="btn btn-default">Batalkan</button>
            <button type="submit" name="process" class="btn btn-info pull-right">Tambah</button>
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