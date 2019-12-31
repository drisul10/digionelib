<div class="row">
    <div class="col-xs-12">
        <div class="box box-green">
            <div class="box-header with-border">
                <h2 class="box-title">Peminjaman Buku</h2>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                            <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label class="control-label" for="npm">Mahasiswa</label>
                                            <select class="form-control select2" style="width: 100%;" name="npm" id="npm">
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label" for="tanggal_peminjaman">Tanggal</label>
                                            <input type="text" name="tanggal_peminjaman" class="form-control" id="tanggal_peminjaman">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label" for="jumlah_hari">Jumlah Hari</label>
                                            <input type="number" name="jumlah_hari" class="form-control" id="jumlah_hari" value="1" min="1">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label" for="tanggal_pengembalian">Tanggal</label>
                                            <input type="text" name="tanggal_pengembalian" class="form-control" id="tanggal_pengembalian" readonly>
                                        </div>
                                        <div class="col-md-3" style="padding-top:25px">
                                            <button class="btn btn-primary" id="selesai" disabled><i class="fa fa-fw fa-check"></i> Simpan</button>
                                        </div>
                                    </div>
                            </div>
                </div>
                <div class="col-md-12">
                <hr class="">
                    <div class="row">
                        <div class="table-responsive margin">
                        <button class="btn btn-success" id="tambah_buku" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-plus"></i> Tambah</button>
                            <table class="table table-bordered table-striped table-hover" id="mytable">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width:10px">No</th>
                                        <th class="text-center">Kode Buku</th>
                                        <th class="text-center">Judul Buku</th>
                                        <th class="text-center">Pengarang</th>
                                        <th class="text-center">Penerbit</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Tahun</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
            
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="judul-buku">Tambah Peminjaman Buku</h4>
        </div>
        <div class="modal-body clearfix ">
            <div class="col-sm-12 margin-bottom">
                <div class="row">
                    <input type="hidden" class="form-control" name="index" id="index">
                    <div class="col-md-4 no-padding">
                        <label class="" for="kode_buku">Kode Buku</label>
                        <select class="form-control select2" name="kode_buku" id="kode_buku_input">
                        </select>
                    </div>
                    <div class="col-md-8 no-padding">
                        <label class="" for="judul_buku">Judul</label>
                        <select class="form-control select2" name="judul_buku" id="judul_buku_input">
                        </select>
                    </div>
                     <div class="col-md-12 text-right">
                    </div>
                </div>
            </div>
            <div class="col-sm-12" id="detail-buku" style="display:none;">
                <div class="row">
                    <div class="col-sm-4">
                        <img alt="" class=" img-responsive" id="sampul-buku">
                    </div>
                    <div class="col-sm-8">
                        <table class="table margin-bottom-none">
                            <tr>
                                <td class="text-bold">Pengarang</td>
                                <td class="text-right" id="pengarang">Pengarang</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Penerbit</td>
                                <td class="text-right" id="penerbit">Penerbit</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Kategori</td>
                                <td class="text-right" id="kategori">Kategori</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Tahun</td>
                                <td class="text-right" id="tahun">Tahun</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Tanggal Peminjaman</td>
                                <td class="text-right" id="tanggal-peminjaman">Tanggal Peminjaman</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <button class="btn btn-success" id="simpan-buku" disabled>Tambah</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
        </div>
    </div>
</div>
 <?php
    $datatables = '
    <script type="text/javascript">
        $(document).ready(function() {
            $(".select2").select2({width:"100%"});
            var tgl = $.datepicker.formatDate("yy-mm-dd", new Date());
            $("#tanggal_peminjaman").val(tgl);
            $("#tanggal_peminjaman").datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
            });
            $("#tanggal_pengembalian").val(moment($("#tanggal_peminjaman").val(),"YYYY-MM-DD").add(1, "days").format("YYYY-MM-DD"));
            $("#jumlah_hari").on("input", function() {
                if($("#jumlah_hari").val()==0 || $("#jumlah_hari").val()==null || $("#jumlah_hari").val()==""){
                    $("#selesai ").attr("disabled","");
                }else{
                    $("#selesai ").removeAttr("disabled");

                }
                $("#tanggal_pengembalian").val(moment($("#tanggal_peminjaman").val(),"YYYY-MM-DD").add($("#jumlah_hari").val(), "days").format("YYYY-MM-DD"));
            });
            var t = $("#mytable").DataTable({
                columnDefs: [
                    { className: "text-center", targets: [0,1,5,6,7] },
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
                lengthChange: false,
                searching   : false,
                pageLength  : 5,
                columns: [
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                ],
                initComplete: function(oSettings) {
                    $(this).on("click", "button", function(e) {
                        Swal.fire({
                          title: "Anda yakin ingin menghapus?",
                          text: "Data akan dihapus",
                          icon: "warning",
                          showCancelButton: true,
                          confirmButtonText: "Ya, Hapus",
                          cancelButtonText: "Tidak, Batal",
                          closeOnConfirm: false,
                          closeOnCancel: false,
                        }).then((result) => {
                          if (result.value) {
                              t.row( $(this).closest("tr") ).remove().draw();
                              if(t.data().count()==0){
                                $("#selesai ").attr("disabled","");
                              }

                          }
                        })
                    });
                },
            });
            
            $("#npm").select2({
                placeholder: "Mahasiswa",
                ajax: {
                    url: "'.$base_url.'api.php?get=getMahasiswa",
                    dataType: "json",
                    data: function (params) {
                    return {
                        kode_buku: params.term
                    };
                    },
                    processResults: function (response) {
                    var data =  {
                        results: $.map(response, function (obj) {
                            obj.id = obj.npm;
                            obj.text = obj.nama_lengkap;

                            return obj;
                        })
                        };
                        return data;
                    },
                    cache: true
                }
            });
            $("#kode_buku_input").select2({
                placeholder: "Kode Buku",
                ajax: {
                    url: "'.$base_url.'api.php?get=getDataPustakaBuku",
                    dataType: "json",
                    data: function (params) {
                    return {
                        kode_buku: params.term
                    };
                    },
                    processResults: function (response) {
                    var data =  {
                        results: $.map(response, function (obj) {
                            obj.id = obj.kode_buku;
                            obj.text = obj.kode_buku;

                            return obj;
                        })
                        };
                        return data;
                    },
                    cache: true
                }
            });
            $("#judul_buku_input").select2({
                placeholder: "Judul Buku",
                ajax: {
                    url: "'.$base_url.'/api.php?get=getDataPustakaBuku",
                    dataType: "json",
                    data: function (params) {
                    return {
                        judul_buku: params.term
                    };
                    },
                    processResults: function (response) {
                    var data =  {
                        results: $.map(response, function (obj) {
                            obj.id = obj.judul_buku;
                            obj.text = obj.judul_buku;

                            return obj;
                        })
                        };
                        return data;
                    },
                    cache: true
                }
            });
            $("#npm").on("select2:select",function(e){
                if(t.data().count()>0){
                    $("#selesai").removeAttr("disabled");
                }
            });
            $("#kode_buku_input").on("select2:select",function(e){
                $("#simpan-buku").removeAttr("disabled");
                var data = e.params.data;
                var option = new Option(data.judul_buku, data.judul_buku);
                option.selected = true;
                $("#judul_buku_input").append(option);
                $("#judul_buku_input").trigger("change");

                $("#judul-buku").text(data.judul_buku);
                $("#pengarang").text(data.pengarang);
                $("#penerbit").text(data.penerbit);
                $("#kategori").text(data.nama_kategori);
                $("#tahun").text(data.tahun);
                $("#sampul-buku").attr(\'src\', "'.$base_url.'dist/buku/"+data.nama_cover);
                document.getElementById("detail-buku").style.display = "block";
            });
            $("#judul_buku_input").on("select2:select",function(e){
                $("#simpan-buku").removeAttr("disabled");
                var data = e.params.data;
                var option = new Option(data.kode_buku, data.kode_buku);
                option.selected = true;
                $("#kode_buku_input").append(option);
                $("#kode_buku_input").trigger("change");

                $("#judul-buku").text(data.judul_buku);
                $("#pengarang").text(data.pengarang);
                $("#penerbit").text(data.penerbit);
                $("#kategori").text(data.nama_kategori);
                $("#tahun").text(data.tahun);
                $("#sampul-buku").attr(\'src\', "'.$base_url.'dist/buku/"+data.nama_cover);
                document.getElementById("detail-buku").style.display = "block";
            });
            
            $("#selesai").on( "click", function (e) {
                if(!$("#npm").val()){
                    Swal.fire({
                      title:"Gagal",
                      text:"Mohon melengkapi data.",
                      icon:"error",
                    });
                }else{
                    var input ={
                        "action" : "tambah_peminjaman",
                        "npm" : $("#npm").val(),
                        "tanggal_peminjaman" : $("#tanggal_peminjaman").val(),
                        "tanggal_pengembalian" : $("#tanggal_pengembalian").val(),
                        "buku" : t.data().toArray(),
                    };
                    $.ajax({
                        type : "POST",
                        url : "'.$base_url.'api.php",
                        data :  input,
                        success: function (data) {
                            if(data=="Sukses"){
                                Swal.fire({
                                    title:"Sukses",
                                    text:"Berhasil ditambahkan.",
                                    icon:"success",
                                    timer:3000
                                });
                                $("#npm").val(null).trigger("change");
                                $("#jumlah_hari").val(1);
                                $("#tanggal_peminjaman").val(tgl);
                                $("#tanggal_peminjaman").datepicker({
                                    format: "yyyy-mm-dd",
                                    autoclose: true,
                                });
                                $("#tanggal_pengembalian").val(moment($("#tanggal_peminjaman").val(),"YYYY-MM-DD").add(1, "days").format("YYYY-MM-DD"));
                                t.clear().draw();
                            }else{
                                Swal.fire({
                                    title:"Gagal",
                                    text:"Gagal menambahkan data.",
                                    icon:"error",
                                });
                            }
                        },
                        error: function(data){
                            Swal.fire({
                                title:"Gagal",
                                text:"Gagal menambahkan data.",
                                icon:"error",
                            });
                        }
                    });
                }
            });
            $("#simpan-buku").on( "click", function (e) {
                if($("#npm").val()){
                    $("#selesai").removeAttr("disabled");
                }
                $("#myModal").modal("hide");
                
                $("#simpan-buku").attr("disabled","");
                t.columns().search("").draw();
                t.row.add( [
                    "",
                    $("#kode_buku_input").val(),
                    $("#judul_buku_input").val(),
                    $("#pengarang").text(),
                    $("#penerbit").text(),
                    $("#kategori").text(),
                    $("#tahun").text(),
                    \'<button type="button" class="btn btn-flat btn-default btn-sm" id="hapus"><i class="fa fa-fw fa-trash"></i></button>\',
                ] ).draw(true);
                $("#kode_buku_input").val(null).trigger("change");
                $("#judul_buku_input").val(null).trigger("change");
                $("#kode_buku_input").select2({
                    placeholder: "Kode Buku",
                    ajax: {
                        url: "'.$base_url.'api.php?get=getDataPustakaBuku",
                        dataType: "json",
                        data: function (params) {
                        return {
                            kode_buku: params.term
                        };
                        },
                        processResults: function (response) {
                        var data =  {
                            results: $.map(response, function (obj) {
                                obj.id = obj.kode_buku;
                                obj.text = obj.kode_buku;

                                return obj;
                            })
                            };
                            return data;
                        },
                        cache: true
                    }
                });
                $("#judul_buku_input").select2({
                    placeholder: "Judul Buku",
                    ajax: {
                        url: "'.$base_url.'api.php?get=getDataPustakaBuku",
                        dataType: "json",
                        data: function (params) {
                        return {
                            judul_buku: params.term
                        };
                        },
                        processResults: function (response) {
                        var data =  {
                            results: $.map(response, function (obj) {
                                obj.id = obj.judul_buku;
                                obj.text = obj.judul_buku;

                                return obj;
                            })
                            };
                            return data;
                        },
                        cache: true
                    }
                });
                document.getElementById("detail-buku").style.display = "none";
            });
        });
    </script>';
?>