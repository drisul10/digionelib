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
                <h3><?= $data_stats['kembali_daily']; ?></h3>

                <p>Hari ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=Url::BACK_LAPORAN_PENGEMBALIAN_DAILY?>" class="small-box-footer">
                Detail <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-orange">
            <div class="inner">
                <h3><?= $data_stats['kembali_weekly']; ?></h3>

                <p>Minggu ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=Url::BACK_LAPORAN_PENGEMBALIAN_WEEKLY?>" class="small-box-footer">
                Detail <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-purple">
            <div class="inner">
                <h3><?= $data_stats['kembali_monthly']; ?></h3>

                <p>Bulan ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=Url::BACK_LAPORAN_PENGEMBALIAN_MONTHLY?>" class="small-box-footer">
                Detail <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= $data_stats['kembali_yearly']; ?></h3>

                <p>Tahun ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=Url::BACK_LAPORAN_PENGEMBALIAN_YEARLY?>" class="small-box-footer">
                Detail <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<?php require_once Url::template_back_footer(); ?>