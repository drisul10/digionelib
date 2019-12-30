<?php
use config\Url;
use lang\Lang;

require_once Url::template_back_header();
?>

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= $data_stats['pinjam_daily']; ?></h3>

                <p>Hari ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=Url::BACK_LAPORAN_PEMINJAMAN_DAILY?>" class="small-box-footer">
                Detail <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-orange">
            <div class="inner">
                <h3><?= $data_stats['pinjam_weekly']; ?></h3>

                <p>Minggu ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=Url::BACK_LAPORAN_PEMINJAMAN_WEEKLY?>" class="small-box-footer">
                Detail <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-purple">
            <div class="inner">
                <h3><?= $data_stats['pinjam_monthly']; ?></h3>

                <p>Bulan ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=Url::BACK_LAPORAN_PEMINJAMAN_MONTHLY?>" class="small-box-footer">
                Detail <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= $data_stats['pinjam_yearly']; ?></h3>

                <p>Tahun ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=Url::BACK_LAPORAN_PEMINJAMAN_YEARLY?>" class="small-box-footer">
                Detail <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
                <div class="widget-user-image">
                    <!-- <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar"> -->
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">Buku paling sering dipinjam</h3>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <?php foreach ($data_count_book as $key => $value) : ?>
                        <?php if ($key == 0) : ?>
                            <li><a href="#"><?=$key+1?>. <?= $model_buku->get_one($value[$this->model->field_kode])[$model_buku->field_judul]; ?> <span class="pull-right badge bg-blue"><?= $value['total']; ?></span></a></li>
                        <?php elseif ($key == 1) : ?>
                            <li><a href="#"><?=$key+1?>. <?= $model_buku->get_one($value[$this->model->field_kode])[$model_buku->field_judul]; ?> <span class="pull-right badge bg-aqua"><?= $value['total']; ?></span></a></li>
                        <?php elseif ($key == 2) : ?>
                            <li><a href="#"><?=$key+1?>. <?= $model_buku->get_one($value[$this->model->field_kode])[$model_buku->field_judul]; ?> <span class="pull-right badge bg-green"><?= $value['total']; ?></span></a></li>
                        <?php else : ?>
                            <li><a href="#"><?=$key+1?>. <?= $model_buku->get_one($value[$this->model->field_kode])[$model_buku->field_judul]; ?> <span class="pull-right badge bg-yellow"><?= $value['total']; ?></span></a></li>
                        <?php endif ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!-- /.widget-user -->
    </div>
</div>

<?php require_once Url::template_back_footer(); ?>