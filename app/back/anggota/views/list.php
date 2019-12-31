<?php
use config\Url;
use lang\Lang;

require_once Url::template_back_header();
?>

<div class="row">
    <div class="col-xs-2">
        <a href="<?=Url::BACK_ANGGOTA_CREATE;?>&b4=" class="btn btn-block btn-social btn-dropbox">
            <i class="fa fa-plus-square"></i>
            Tambah Data
        </a>
    </div>

    <br><br>

    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border text-center">
                <h3 class="box-title">Digital Library</h3>
            </div>
            <div class="box-body table-responsive">
                <?php if (isset($_GET["error"])) :
                    $error_message = "";

                    switch ($_GET["error"]) {
                        case Lang::ERR_CODE_UNKNOWN_DATA : $error_message = Lang::ERR_MESSAGE_UNKNOWN_DATA;
                        break;
            
                        case Lang::ERR_CODE_DROP_TO_DB : $error_message = Lang::ERR_MESSAGE_DROP_TO_DB;
                        break;
                    }   
                ?>

                <div class="form-row">
                    <div class="col-md-12 alert alert-danger text-center my-alert" role="alert">
                        <?= $error_message; ?>
                    </div>
                </div>
                
                <?php endif ?>

                <?php if (isset($_GET["success"])) :
                    $success_message = "";

                    switch ($_GET["success"]) {
                        case Lang::OK_CODE_INSERT_TO_DB : $success_message = Lang::OK_MESSAGE_INSERT_TO_DB;
                        break;

                        case Lang::OK_CODE_UPDATE_TO_DB : $success_message = Lang::OK_MESSAGE_UPDATE_TO_DB;
                        break;

                        case Lang::OK_CODE_DROP_TO_DB : $success_message = Lang::OK_MESSAGE_DROP_TO_DB;
                        break;
                    }   
                ?>

                <div class="form-row">
                    <div class="col-md-12 alert alert-success text-center my-alert" role="alert">
                        <?= $success_message; ?>
                    </div>
                </div>
                
                <?php endif ?>
                
                <table id="tableAnggota" class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th></th>
                            <th>NPM</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Generated Password</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>NPM</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Generated Password</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php if ($data == null): //if data null ?>

                        <tr>
                            <td colspan="8" style="text-align:center"><?=Lang::TABLE_ROW_EMPTY?></td>
                        </tr>

                        <?php endif;

                        //if data not null, then fetch
                        foreach ($data as $key => $value): ?>

                        <tr>
                            <td><?=$key + 1?>.</td>

                            <td><?=$value[$this->model->field_npm]?></td>

                            <td><?=$value[$this->model->field_nama_lengkap]?></td>
                            
                            <td><?=$value[$this->model->field_email]?></td>

                            <td><?=$value[$this->model->field_no_hp]?></td>

                            <?php if($value[$this->model->field_is_password_generated] == 1) : ?>

                            <td> <?=$value[$this->model->field_no_hp]?> </td>
    
                            <?php else : ?>
                            
                            <td class="text-danger"> password telah diperbarui </td>

                            <?php endif; ?>

                            <td><?=$value[$this->model->field_status]?></td>

                            <td class="td-action">
                                <button type="button" class="btn btn-warning btn-sm" title="detail"
                                    onclick="window.location.href='<?=Url::BACK_ANGGOTA_DETAIL?>&<?= $this->model->field_id; ?>=<?=$value[$this->model->field_id]?>'">
                                    <span class="glyphicon glyphicon-eye-open"></span>&nbsp;
                                </button>
                                <button type="button" class="btn btn-info btn-sm" title="edit"
                                    onclick="window.location.href='<?=Url::BACK_ANGGOTA_UPDATE?>&b4=&<?= $this->model->field_id; ?>=<?=$value[$this->model->field_id]?>'">
                                    <span class="glyphicon glyphicon-edit"></span>&nbsp;
                                </button>
                                <button type="button" class="btn btn-danger btn-sm delete-row" title="hapus" data-toggle="modal"
                                    data-target="#modal-danger" data-id="<?=$value[$this->model->field_id]?>">
                                    <span class="glyphicon glyphicon-trash"></span>&nbsp;
                                </button>
                            </td>
                        </tr>

                        <?php endforeach?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-danger fade" id="modal-danger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Data</h4>
            </div>
            <div class="modal-body">
                <p>Apakah yakin ingin menghapus data di baris ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batalkan</button>
                <button type="button" class="btn btn-outline action-delete-row">Ya, hapus sekarang</button>
            </div>
        </div>
    </div>
</div>

<?php require_once Url::template_back_footer();?>

<script>
window.history.replaceState({}, document.title, "<?=Url::BACK_ANGGOTA_INDEX?>");

setTimeout(function(){
  $('.my-alert').remove();
}, 5000);

$(document).ready(function() {
    //table datatables initiate
    $('#tableAnggota').DataTable({
        "pageLength": 20,
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false
    });
});

//show modal on delete row table
$(document).on("click", "#tableAnggota .delete-row", function() {
    var bookId = $(this).data('id');

    $(document).on("click", ".action-delete-row", function() {
        window.location.href = '<?=Url::BACK_ANGGOTA_DELETE . "&" . $this->model->field_id; ?>=' + bookId;
    });
});
</script>