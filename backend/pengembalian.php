<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h2 class="box-title">Pengembalian Buku</h2>
            </div>
            <div class="box-body">
                <div class="table-responsive margin">
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:10px;">No</th>
                                <th class="text-center">NPM</th>
                                <th class="text-center">Nama Mahasiswa</th>
                                <th class="text-center">Tanggal Peminjaman</th>
                                <th class="text-center">Tanggal Pengembalian</th>
                                <th class="text-center">Denda</th>
                                <th class="text-center">Nama Petugas</th>
                                <th class="text-center">Pengembalian</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                                include "database.php";
                                $db= new database();
                                $x=1;
                                $denda=$db->getDenda();
                                foreach ($db->getDataPeminjaman() as $key => $value) {
                            ?>
                                <tr class="text-center">
                                    <td><?=$x?></td>
                                    <td><?=$value->npm?></td>
                                    <td><?=$value->nama_lengkap?></td>
                                    <td><?=date('H:i:s, d F Y',strtotime($value->tanggal_peminjaman))?></td>
                                    <td>
                                    <?=date('H:i:s, d F Y',strtotime($value->tanggal_pengembalian))?>
                                    <p class="hidden"  id="tanggal_pengembalian_<?=$value->id_peminjaman?>"><?=$value->tanggal_pengembalian?></p>
                                    </td>
                                    <td id="td_denda_<?=$value->id_peminjaman?>">Rp. <?=number_format($value->denda,0,',','.') ?></td>
                                    <td><?=ucwords($value->nama_petugas)?></td>
                                    <td id="status_<?=$value->id_peminjaman?>">
                                    <?php 
                                        if ($value->status_pengembalian) {
                                            echo '<span class="label label-success" >'.date('H:i:s, d F Y',strtotime($value->pengembalian)).'</span>';
                                        }else {
                                            echo '<span class="label label-danger" >Belum</span>';
                                        }
                                    ?>
                                    </td>
                                    <td id="button_<?=$value->id_peminjaman?>"><button class="btn btn-sm btn-default" onclick="detail('<?=$value->id_peminjaman?>','<?=$value->status_pengembalian?>',)"><i class="fa fa-eye"></i></button></td>
                                </tr>
                            <?php
                                $x++;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="detailbuku" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="judul-buku">Detail Peminjaman</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive margin">
                    <input type="hidden" name="id_peminjaman" id="id_peminjaman">
                    <table class="table table-bordered table-striped table-hover" id="table-detail">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:10px">No</th>
                                <th class="text-center">Kode Buku</th>
                                <th class="text-center">Judul Buku</th>
                                <th class="text-center">Pengarang</th>
                                <th class="text-center">Penerbit</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Tahun</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-horizontal col-sm-8 text-left" id="denda_peminjaman">
                    <label class=" control-label col-sm-1" for="tanggal_peminjaman">Denda</label>
                    <div class="col-sm-3">
                        <input type="hidden" class="form-control" id="denda" name="denda" value="<?=$denda?>" readonly>
                    </div>
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-success" id="simpan">Kembalikan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    $datatables = '
    <script type="text/javascript">
        function formatNumber (num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
        }
        function detail(id,status) {
            $("#table-detail").DataTable().clear();
            $("#table-detail").DataTable().destroy();
            $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings){
                return {
                    "iStart": oSettings._iDisplayStart,
                    "iEnd": oSettings.fnDisplayEnd(),
                    "iLength": oSettings._iDisplayLength,
                    "iTotal": oSettings.fnRecordsTotal(),
                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                };
            };
            var table = $("#table-detail").DataTable({
                
                columnDefs: [
                    { className: "text-center", targets: [0,1] },
                ],
                "language": {
                    "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
                    "sProcessing":   "Sedang memproses...",
                    "sLengthMenu":   "Tampilkan _MENU_ entri",
                    "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                    "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                    "sInfoPostFix":  "",
                    "sSearch":       "Cari:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext":     "Selanjutnya",
                        "sLast":     "Terakhir"
                    }
                },
                ajax: {"url": "'.$base_url.'api.php?get=getDetailPeminjaman&id="+id, "type": "GET"},
                columns: [
                    {
                        "data": "kode_buku",
                        "orderable": false
                    },
                    {"data": "kode_buku"},
                    {"data": "judul_buku"},
                    {"data": "pengarang"},
                    {"data": "penerbit"},
                    {"data": "nama_kategori"},
                    {"data": "tahun"},
                ],
                rowCallback: function(row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    var index = page * length + (iDisplayIndex + 1);
                    $("td:eq(0)", row).addClass("text-center");
                    $("td:eq(6)", row).addClass("text-center");
                    $("td:eq(0)", row).html(index);
                },
            });
            if(status==0){
                
                if(moment($("#tanggal_pengembalian_"+id).text()).isAfter(moment().format("YYYY-MM-DD hh:mm:ss"))){
                    $("#denda_peminjaman").html("<label class=\"control-label text-red\">Denda : Rp. 0</label>"+
                            "<input type=\"hidden\" class=\"form-control\" id=\"denda\" name=\"denda\" value=\"0\" readonly>"
                    );
                }else{
                    console.log($("#tanggal_pengembalian_"+id).text());
                    console.log(moment().format("YYYY-MM-DD hh:mm:ss"));
                    var a = moment($("#tanggal_pengembalian_"+id).text(), "YYYY-MM-DD hh:mm:ss");
                    var b = moment().format("YYYY-MM-DD hh:mm:ss");
                    var hari = a.diff(b, "days");
                    console.log(hari);
                    $("#denda_peminjaman").html("<label class=\"control-label text-red\">Denda : Rp. "+Math.abs(hari)*'.$denda.'+"</label>"+
                            "<input type=\"hidden\" class=\"form-control\" id=\"denda\" name=\"denda\" value=\"'.$denda.'\" readonly>"
                    );
                    $("#denda").val(Math.abs(hari)*'.$denda.');
                }
                $("#simpan").removeClass("btn-danger"); 
                $("#simpan").addClass("btn-success"); 
                $("#simpan").html("Kembalikan"); 
            }else{
                $("#denda").val(Math.abs(hari)*'.$denda.');
                $("#denda_peminjaman").html("<label class=\"control-label text-green\">Pengembalian : "+$("#status_"+id).text()+"</label>"+
                            "<input type=\"hidden\" class=\"form-control\" id=\"denda\" name=\"denda\" value=\"0\" readonly>"
                );
                $("#simpan").removeClass("btn-success"); 
                $("#simpan").addClass("btn-danger"); 
                $("#simpan").html("Batalkan"); 
            }
            
            $("#id_peminjaman").val(id); 
            $("#detailbuku").modal("show"); 

        };
        $(document).ready(function() {
            var t = $("#mytable").DataTable({
                columnDefs: [
                    { className: "text-center", targets: [0,1,2,3,4,5,6,7] },
                ],
                "language": {
                    "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
                    "sProcessing":   "Sedang memproses...",
                    "sLengthMenu":   "Tampilkan _MENU_ entri",
                    "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                    "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                    "sInfoPostFix":  "",
                    "sSearch":       "Cari:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext":     "Selanjutnya",
                        "sLast":     "Terakhir"
                    }
                },
            });
            $("#simpan").on( "click", function (e) {
                var id_peminjaman=$("#id_peminjaman").val();
               
                if($("#simpan").html()=="Kembalikan"){
                    var input ={
                        "action" : "simpanPengembalian",
                        "id_peminjaman":id_peminjaman,
                        "status_pengembalian": 1,
                        "denda":$("#denda").val(),
                    };
                    $.ajax({
                        type : "POST",
                        url : "'.$base_url.'api.php",
                        data: input,
                        success: function (data) {
                            $("#detailbuku").modal("hide"); 
                            Swal.fire({
                                title:"Sukses",
                                text:"Berhasil mengembalikan buku.",
                                icon:"success",
                                timer:3000
                            });
                            console.log(moment().format("YYYY-MM-DD hh:mm:ss"));
                            $("#status_"+id_peminjaman).html("<span class=\"label label-success\">"+moment().format("hh:mm:ss, DD MMMM YYYY")+"</span>");
                            $("#button_"+id_peminjaman).html("<button class=\"btn btn-sm btn-default\" onclick=\"detail(\'"+id_peminjaman+"\',\'1\',)\"><i class=\"fa fa-eye\"></i></button>");
                            $("#td_denda_"+id_peminjaman).text("Rp. "+formatNumber($("#denda").val()));
                        },
                        error: function(data){
                            Swal.fire({
                                title:"Gagal",
                                text:"Gagal mengembalikan buku.",
                                icon:"error",
                            });
                        }
                    });
                }else{
                    var input ={
                        "action" : "simpanPengembalian",
                        "id_peminjaman":id_peminjaman,
                        "status_pengembalian":0,
                        "denda":$("#denda").val(),
                    };
                    $.ajax({
                        type : "POST",
                        url : "'.$base_url.'api.php",
                        data: input,
                        success: function (data) {
                            $("#detailbuku").modal("hide"); 
                            Swal.fire({
                                title:"Sukses",
                                text:"Berhasil membatalkan pengembalian.",
                                icon:"success",
                                timer:3000
                            });
                            $("#status_"+id_peminjaman).html("<span class=\"label label-danger\">Belum</span><p class=\"hidden\" id=\"pengembalian_"+id_peminjaman+"\">a</p>");
                            $("#button_"+id_peminjaman).html("<button class=\"btn btn-sm btn-default\" onclick=\"detail(\'"+id_peminjaman+"\',\'0\',)\"><i class=\"fa fa-eye\"></i></button>");
                            $("#td_denda_"+id_peminjaman).text("Rp. "+formatNumber($("#denda").val()));
                        },
                        error: function(data){
                            Swal.fire({
                                title:"Gagal",
                                text:"Gagal membatalkan pengembalian.",
                                icon:"error",
                            });
                        }
                    });
                }
                
            });
            
        });
    </script>';
?>