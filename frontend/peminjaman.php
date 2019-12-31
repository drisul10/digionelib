<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Data Peminjaman</h3>
    </div>
    <div class="box-body text-center">
            <div class="table-responsive margin">
                <table class="table table-hover" id="mytable">
                    <thead>
                        <tr>
                            <th class="hidden">id</th>
                            <th class="text-center" style="width:10px">No</th>
                            <th class="text-center">Judul Buku</th>
                            <th class="text-center">Tanggal Peminjaman</th>
                            <th class="text-center">Petugas</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "database.php";
                            $db= new database();
                            $x=1;
                            foreach ($db->getDataPeminjamanUser() as $key => $value) {
                        ?>
                            <tr class="text-center">
                                <td class="hidden"><?=$value->id_peminjaman?></td>
                                <td><?=$x?></td>
                                <td><?=$value->judul_buku?></td>
                                <td><?=date('H:i:s, d F Y',strtotime($value->tanggal_peminjaman))?></td>
                                <td><?=ucwords($value->nama_petugas)?></td>
                                <td class="text-center"><button class="btn btn-sm btn-default"><i class="fa fa-eye"></i></button></td>
                            </tr>
                        <?php
                            $x++;
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="judul-buku">Modal Header</h4>
            </div>
            <div class="modal-body clearfix">
                <div class="col-sm-4">
                    <img alt="" class=" img-responsive" id="sampul-buku">
                </div>
                <div class="col-sm-8">
                    <table class="table">
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
                        <tr>
                            <td class="text-bold">Petugas</td>
                            <td class="text-right" id="petugas">Petugas</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
    </div>
    <?php
    $datatables = '
        <script type="text/javascript">
            $(document).ready(function() {
                var t = $("#mytable").DataTable({
                    "order": [[ 1, "asc" ]],
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
                    }
                });
                $(\'#mytable tbody\').on( \'click\', \'button\', function () {
                    var data = t.row( $(this).parents(\'tr\') ).data();
                    $.ajax({
                        url : "'.$base_url.'api.php?get=getDetailPeminjamanUser&id="+data[0],
                        type: "GET",
                        success: function(dataku)
                        {
                            var d  = JSON.parse(dataku);
                            $("#judul-buku").text(d.judul_buku);
                            $("#pengarang").text(d.pengarang);
                            $("#penerbit").text(d.penerbit);
                            $("#kategori").text(d.nama_kategori);
                            $("#tahun").text(d.tahun);
                            $("#tanggal-peminjaman").text(data[2]);
                            $("#petugas").text(data[4]);
                            $("#sampul-buku").attr(\'src\', "'.$base_url.'dist/buku/"+d.nama_cover);
                            $("#myModal").modal("show"); 

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            Swal.fire({
                              title:"Gagal",
                              text:"Gagal mengambil data.",
                              icon:"error",
                            });
                        }
                    });
                } );
            });
        </script>';
    ?>