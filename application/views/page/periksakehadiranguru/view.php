<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<!-- End Select2 -->
<div class="row">
	<form class="form-horizontal" method="POST" role="form" id="formSearch">
		<div class="col-xs-3">
			Guru
			<div class="form-group">
				<select class="form-control" name="guru" id="guru">
					<option value="0">-- Pilih Guru --</option>
					<?php foreach ($myguru as $value) { ?>
						<option value=<?= $value['IdGuru'] ?>><?= $value['IdGuru'] . $value['GuruNama'] ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="col-xs-1">
		</div>
		<div class="col-xs-3">
			Mata Pelajaran
			<div class="form-group">
				<span>
					<select class="form-control" name="mapel" id="mapel">
						<option value="0">-- Pilih MataPelajaran --</option>
					</select>
				</span>

			</div>
		</div>
		<div class="col-xs-1">
			<br>
			<button type="submit" id="btn_search" class="btn btn-sm btn-success pull-left">
				<a class="ace-icon fa fa-success bigger-120"></a>Tampilkan
			</button>
		</div>
		<br>
		<br>
	</form>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="table-header">
			Semua Data <?= $page_name; ?>
		</div>
	</div>
</div>
<br>
<div class="table-responsive">
	<table id="table_id" class="display">
		<thead>
			<tr>
				<th class="col-md-1">No</th>
				<th>Nama Guru</th>
				<th>Mata Pelajaran</th>
				<th>Tanggal</th>
				<th>Mulai</th>
				<th>Inval</th>
				<th>Ket. Tidak Hadir</th>
				<th>Ganti Hari</th>
				<th>Tambahan</th>
				<th>Batal</th>
			</tr>
		</thead>
		<tbody id="show_data">
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		show_data();
		$('#table_id').DataTable();
		$('select').select2({
        width: '100%',
        placeholder: "Select an Option",
        allowClear: true
	});
	$("#guru").change(function() {
		var guru = $('#guru').val();
		$.ajax({
			type: "POST",
			url: '<?php echo site_url('periksakehadiranguru/showmapel') ?>',
			data: {
				guru: guru
			}
		}).done(function(data) {
			// console.log(data);
			$("#mapel").html(data);
		});
	});
	});
	

	if ($("#formSearch").length > 0) {
        $("#formSearch").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            rules: {
                nopembayaran: {
                    required: false
                },

                tahun: {
                    required: false
                },
            },
            submitHandler: function(form) {
                $('#btn_search').html('Searching..');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('periksakehadiranguru/search') ?>',
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
								'<td>' + data[i].GuruNama + '</td>' +
								'<td>' + data[i].mapel + '</td>' +
								'<td>' + data[i].TGLHADIR + '</td>' +
								'<td>' + data[i].MSKHADIR + '</td>' +
								'<td>' + data[i].STINVAL + '</td>' +
								'<td>' + data[i].KETTDKHDR + '</td>' +
								'<td>' + data[i].GANTIHARI + '</td>' +
								'<td>' +
								'<input type="number" id="tambahan'+no+'" name="tambahan" class="form-control" value="' + data[i].TAMBAHAN + '"/>' +
								'</td>' +
								'<td class="text-center">' +
								'<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].ID + '" data-no="'+no+'">' +
								'<i class="ace-icon fa fa-plus bigger-120"></i>' +
								'</button> &nbsp' +
								'<button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="' + data[i].ID + '">' +
								'<i class="ace-icon fa fa-trash-o bigger-120"></i>' +
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
                                "bAutoWidth": false
                            });
                        }
                        /* END TABLETOOLS */
                    }
                });

            }
        })
	}
	
	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('periksakehadiranguru/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-center">' + no + '</td>' +
						'<td>' + data[i].GuruNama + '</td>' +
						'<td>' + data[i].mapel + '</td>' +
						'<td>' + data[i].TGLHADIR + '</td>' +
						'<td>' + data[i].MSKHADIR + '</td>' +
						'<td>' + data[i].STINVAL + '</td>' +
						'<td>' + data[i].KETTDKHDR + '</td>' +
						'<td>' + data[i].GANTIHARI + '</td>' +
						'<td>' +
						'<input type="number" id="tambahan'+no+'" name="tambahan" class="form-control" value="' + data[i].TAMBAHAN + '"/>' +
						'</td>' +
						'<td class="text-center">' +
						'<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].ID + '" data-no="'+no+'">' +
						'<i class="ace-icon fa fa-plus bigger-120"></i>' +
						'</button> &nbsp' +
						'<button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="' + data[i].ID + '">' +
						'<i class="ace-icon fa fa-trash-o bigger-120"></i>' +
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
						"bAutoWidth": false
					});
				}
				/* END TABLETOOLS */
			}

		});
	}

	//get data for update record
	$('#show_data').on('click', '.item_edit', function() {
		var id = $(this).data('id');
		var no = $(this).data('no');
		var tambahan = document.getElementById ('tambahan'+no).value;
		var post_data = {
			id : id,
			tambahan : tambahan
		}
		$.ajax({
			url: "<?php echo base_url('periksakehadiranguru/update') ?>",
			type: "POST",
			data: post_data,
			dataType: "json",
			success: function(response) {
				$('#btn_edit').html('<i class="ace-icon fa fa-save"></i>' +
					'Ubah');
				if (response == true) {
					swalEditSuccess();
				} else {
					swalEditFailed();
				}
			}
		});
	});

	$('#show_data').on('click', '.item_hapus', function() {
		var id = $(this).data('id');
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Ini akan mereset data pada baris ini!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('periksakehadiranguru/delete') ?>",
					async: true,
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function(data) {
						show_data();
						Swal.fire(
							'Terhapus!',
							'Data sudah dihapus.',
							'success'
						)
					}
				});
			}
		})
	})
</script>