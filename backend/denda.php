<div class="row">
    <div class="col-xs-5">
        <div class="box box-success">
            <div class="box-header with-border">
                <h2 class="box-title">Pengaturan Denda</h2>
            </div>
            <div class="box-body">
                <?php
                    include "database.php";
                    $db= new database();
                    $denda=$db->getDenda();
                ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="denda">Denda</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="denda" id="denda" min="1000" step="1000" value="<?=$denda?>" />
                        </div>
                    </div>
            </div>
            <div class="box-footer text-right">
                <button class="btn btn-success" id="simpan">Simpan</button>
            </div>
        </div>
    </div>
</div>
<?php
    $datatables = '
    <script type="text/javascript">
        $(document).ready(function() {
            $("#simpan").on( "click", function (e) {
                var input ={
                    "action" : "simpanDenda",
                    "denda" : $("#denda").val(),
                };
                $.ajax({
                    type : "POST",
                    url : "'.$base_url.'api.php",
                    data: input,
                    success: function (data) {
                        Swal.fire({
                            title:"Sukses",
                            text:"Berhasil menyimpan pengaturan.",
                            icon:"success",
                            timer:3000
                        });
                    },
                    error: function(data){
                        Swal.fire({
                            title:"Gagal",
                            text:"Gagal menyimpan pengaturan.",
                            icon:"error",
                        });
                    }
                });
            });
        });
    </script>
    ';
?>