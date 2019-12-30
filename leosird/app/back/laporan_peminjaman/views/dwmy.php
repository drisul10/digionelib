<?php
use config\Url;
use lang\Lang;

require_once Url::template_back_header();

switch ($_GET['r']) {
    case 'daily':
        $type = 'Hari ini';
    break;

    case 'weekly':
        $type = 'Minggu ini';
    break;

    case 'monthly':
        $type = 'Bulan ini';
    break;

    case 'yearly':
        $type = 'Tahun ini';
    break;
}

?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border text-center">
                <h3 class="box-title">Laporan Peminjaman <?=$type?></h3>
            </div>
            <div class="box-body table-responsive">
                <table id="tableDigilib" class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Peminjam</th>
                            <th>Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Petugas</th>
                            <th>Denda</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Peminjam</th>
                            <th>Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Petugas</th>
                            <th>Denda</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php if ($data == null): //if data null ?>

                        <tr>
                            <td colspan="8" style="text-align:center"><?=Lang::TABLE_ROW_EMPTY?></td>
                        </tr>

                        <?php endif;

                        //if data not null, then fetch
                        foreach ($data as $key => $value):

                            if ($value['is_deleted'] === "0"):
                        ?>

                        <tr>
                            <td><?=$key + 1?>.</td>

                            <td><?=$value[$this->model->field_npm]?></td>

                            <td><?= $model_buku->get_one($value[$this->model->field_kode])[$model_buku->field_judul]; ?></td>

                            <td><?= $this->dt_helper->fmt_datetime2date($value[$this->model->field_tanggal_pinjam]); ?></td>

                            <td><?= $this->dt_helper->fmt_datetime2date($value[$this->model->field_tanggal_kembali]); ?></td>

                            <td><?= $value[$this->model->field_nama_petugas]?></td>

                            <td><?= $value[$this->model->field_denda]?></td>
                        </tr>

                            <?php endif;

                        endforeach?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once Url::template_back_footer();?>

<script>
$(document).ready(function() {
    //table datatables initiate
    $('#tableDigilib').DataTable({
        "pageLength": 20,
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false
    });
});
</script>