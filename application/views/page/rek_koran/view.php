<div class="row">
    <form class="form-horizontal" id="formSearch" method="POST" role="form" id="formSearch">
        Kriteria Pencarian Rekening Koran
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Periode </label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input class="form-control date-picker" id="periode_awal" name="periode_awal" required type="date" data-date-format="dd-mm-yyyy" />
                        <span class="input-group-addon">
                            <i class="fa fa-calendar bigger-110"></i>
                        </span>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input class="form-control date-picker" id="periode_akhir" type="date" required name="periode_akhir" data-date-format="dd-mm-yyyy" />
                        <span class="input-group-addon">
                            <i class="fa fa-calendar bigger-110"></i>
                        </span>
                    </div>
                </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Muzaki </label>
            <div class="col-sm-3">
                <select class="form-control" name="muzaki">
                    <option value="0">--Pilih Muzaki--</option>
                    <?php
                        foreach($mymuzaki as $row){
                    ?>
                    <option value="<?= $row['npwp'] ?>"><?= $row['nama'] ?></option>
                    <?php
                        }
                    ?>
                </select>
                <small id="emailHelp" class="form-text text-muted">Status approve / unapprove (Boleh tidak diisi).</small>
            </div>
        </div>
        <!-- <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NPWZ </label>
            <div class="col-sm-3">
                <input type="text" id="npwz" required name="npwz" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat </label>
            <div class="col-sm-6">
                <input type="text" id="alamat" required name="alamat" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Provinsi </label>
            <div class="col-sm-6">
                <input type="text" id="provinsi" required name="provinsi" class="form-control" />
            </div>
        </div> -->
        <td>

        <td>
            <div class="col-xs-9">
                <button type="submit" id="btn_print_all" class="btn btn-sm btn-yellow pull-right" style="margin-left: 10px;">
                    <a class="ace-icon fa fa-print bigger-120"></a> Print All
                </button>
                <button type="submit" id="btn_search" class="btn btn-sm btn-success pull-right">
                    <a class="ace-icon fa fa-search bigger-120"></a>Periksa
                </button>
            </div>
            <br>
            <br>
    </form>
</div>
<!-- <div class="row">
    <div class="col-xs-1">
        <button href="#my-modal" role="button" data-toggle="modal" class="btn btn-xs btn-info">
            <a class="ace-icon fa fa-plus bigger-120"></a>Tambah Data
        </button>
    </div>
    <br>
    <br>
</div> -->

<div class="row">
    <div class="col-xs-12">
        <div class="table-header">
            Semua Data Rekening Koran
        </div>
    </div>
</div>
<div class="table-responsive">
    <table id="datatable_tabletools" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>NPWZ</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Provinsi</th>
                <th>Tanggal</th>
                <th>Transaksi</th>
                <th>Jumlah</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="show_data">
        </tbody>
    </table>
</div>
<script type="text/javascript">
    if ($("#formSearch").length > 0) {
        $("#formSearch").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            rules: {
                periode_awal: {
                    required: true
                },

                periode_akhir: {
                    required: true
                },
            },
            submitHandler: function(form) {
                $('#btn_search').html('Searching..');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('rek_koran/tampil') ?>',
                    data: $('#formSearch').serialize(),
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $('#btn_search').html('<i class="ace-icon fa fa-search"></i>' +
                            'Periksa');
                        var html = '';
                        var i = 0;
                        var no = 1;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td class="text-center">' + no + '</td>' +
                                '<td>' + data[i].npwp +'</td>' +
                                '<td>' + data[i].nama + '</td>' +
                                '<td>' + data[i].alamat + '</td>' +
                                '<td>' + data[i].provinsi + '</td>' +
                                '<td>' + data[i].tgl_terima + '</td>' +
                                '<td>' + data[i].jenis_penerimaan + '</td>' +
                                '<td>' + data[i].total_terima + '</td>' +
                                '<td>' +
                                '</button> &nbsp' +
                                '<button class="btn btn-xs btn-info item_print" title="Print" data-id="' + data[i].npwp + '">' +
                                '<i class="ace-icon fa fa-print bigger-120"></i>' +
                                '</button>' +
                                '</td>' +
                                '</tr>';
                            no++;
                        }
                        $("#table_id").dataTable().fnDestroy();
                        var a = $('#show_data').html(html);
                        //                    $('#mydata').dataTable();
                        if (a) {
                            $('#table_id').dataTable({
                                "bPaginate": true,
                                "bLengthChange": false,
                                "bFilter": true,
                                "bInfo": false,

                            });

                        }
                        /* END TABLETOOLS */
                    }
                });

            }
        })
    }

    $(document).ready(function() {
        $('#datatable_tabletools').DataTable();
    });

    //Simpan guru

    $('#show_data').on('click', '.item_print', function() {
        var id = $(this).data('id');
        var periode_awal = document.getElementById("periode_awal").value;
        var periode_akhir = document.getElementById("periode_akhir").value;
        window.open('<?php echo base_url('rek_koran/laporan/?') ?>'+'periode_awal='+periode_awal+'&periode_akhir='+periode_akhir+'&muzaki='+id, '_blank');
        // $.ajax({
        //     type: "POST",
        //     url: "<?php echo base_url('rek_koran/tampil_byid') ?>",
        //     async: true,
        //     dataType: "JSON",
        //     data: {
        //         id: id,
        //         periode_awal : periode_awal,
        //         periode_akhir : periode_akhir
        //     },
        //     success: function(data) {
        //         show_data();
        //         swalDeleteSuccess();
        //     }
        // });
    })

    $('#show_data').on('click', '.item_edit', function() {
        var id = $(this).data('id');
        $('#modalEdit').modal('show');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('karyawan/tampil_byid') ?>",
            async: true,
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function(data) {
                $('#e_id').val(data[0].id_pengawas);
                $('#e_nip').val(data[0].nip);
                $('#e_nama').val(data[0].nama);
                $('#e_jabatan').val(data[0].jabatan);
                $('#e_email').val(data[0].username);
                $('#e_level').val(data[0].level);
                $('#e_status').val(data[0].status);
            }
        });
    });

    //function show all Data
    function show_data() {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('karyawan/tampil') ?>',
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i = 0;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td class="text-center">' + no + '</td>' +
                        '<td>' + data[i].nip + '</td>' +
                        '<td>' + data[i].nama + '</td>' +
                        '<td>' + data[i].nmjabatan + '</td>' +
                        '<td>' + data[i].username + '</td>' +
                        '<td>' + data[i].level + '</td>' +
                        '<td>' + data[i].statusv2 + '</td>' +
                        '<td class="text-center">' +
                        '<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].id_pengawas + '">' +
                        '<i class="ace-icon fa fa-pencil bigger-120"></i>' +
                        '</button> &nbsp' +
                        '<button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="' + data[i].id_pengawas + '">' +
                        '<i class="ace-icon fa fa-trash-o bigger-120"></i>' +
                        '</button>' +
                        '</td>' +
                        '</tr>';
                    no++;
                }
                $("#datatable_tabletools").dataTable().fnDestroy();
                var a = $('#show_data').html(html);
                //                    $('#mydata').dataTable();
                if (a) {
                    $('#datatable_tabletools').dataTable({
                        "bPaginate": true,
                        "bLengthChange": false,
                        "bFilter": true,
                        "bInfo": false,
                        "bAutoWidth": false
                    });
                }
                /* END TABLETOOLS */
            }

        });
    }
</script>