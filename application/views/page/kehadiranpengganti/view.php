<div class="row">
	<div class="col-xs-1">
		<button id="item-tambah" role="button" data-toggle="modal" class="btn btn-xs btn-info">
			<a class="ace-icon fa fa-plus bigger-120"></a>Tambah Data
		</button>
	</div>
</div>
<br>
<div id="my-modal2" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Import Data Jabatan</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" role="form" enctype="multipart/form-data" id="formImport">
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Import Excel FIle </label>
								<div class="col-sm-6">
									<input type="file" id="file" required name="file" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sample </label>
								<div class="col-sm-9">
									<a href="<?php echo base_url() . 'assets/jabatan.xlsx' ?>" class="col-sm-3" for="form-field-1"> Download Sample Format</a>
								</div>
							</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="btn_import" class="btn btn-sm btn-success pull-left">
					<i class="ace-icon fa fa-save"></i>
					Simpan
				</button>
				<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Batal
				</button>
			</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<?php
// echo json_encode($myjadwal);exit;	
?>
<div id="modalTambah" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Input Data <?= $page_name; ?></h3>
			</div>
			<form class="form-horizontal" role="form" id="formTambah">
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Pilih Nama Guru </label>
								<div class="col-sm-6">
									<select class="form-control" id="nama" name="nama">
									<option value="0">-- Pilih Guru --</option>
									<?php foreach ($myguru as $value) { ?>
										<option value=<?= $value['IdGuru'] ?>><?= $value['IdGuru'] . $value['GuruNama'] ?></option>
									<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Pilih jadwal </label>
								<div class="col-sm-6">
									<select class="form-control" id="id_jadwal" name="id_jadwal">
										<option value="0">-- Pilih Jadwal --</option>
										<?php foreach ($myjadwal as $row) { ?>
											<option value=<?= $row['id'] ?>><?php echo "[".$row['nama_guru']."]".$row['matapelajaran'] ."-". $row['kelas'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Asal tanggal </label>
								<div class="col-sm-6">
									<input type="date" id="tanggal_awal" name="tanggal_awal">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Ganti tanggal </label>
								<div class="col-sm-6">
									<input type="date" id="tanggal_khir" name="tanggal_akhir">
								</div>
							</div>
								<button type="submit" id="btn_simpan" class="btn btn-sm btn-primary pull-right">
									<i class="ace-icon fa fa-save"></i>
									Simpan
								</button>
						</div>
					</div>
				</div>
				<!-- <div class="modal-footer">
					<button type="submit" id="btn_simpan" class="btn btn-sm btn-success pull-left">
						<i class="ace-icon fa fa-save"></i>
						Simpan
					</button>
					<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Batal
					</button>
				</div> -->
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div id="modalEdit" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Edit Data <?= $page_name; ?></h3>
			</div>
			<form class="form-horizontal" role="form" id="formEdit">
				<div class="modal-body">
				<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Pilih Nama Guru </label>
								<div class="col-sm-6">
									<input type="hidden" id="e_id" name="e_id">
									<select class="form-control" id="e_nama" name="e_nama">
									<option value="0">-- Pilih Guru --</option>
									<?php foreach ($myguru as $value) { ?>
										<option value=<?= $value['IdGuru'] ?>><?= $value['IdGuru'] . $value['GuruNama'] ?></option>
									<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Pilih jadwal </label>
								<div class="col-sm-6">
									<select class="form-control" id="e_id_jadwal" name="e_id_jadwal">
										<option value="0">-- Pilih Jadwal --</option>
										<?php foreach ($myjadwal as $row) { ?>
											<option value=<?= $row['id'] ?>><?php echo "[".$row['nama_guru']."]".$row['matapelajaran'] ."-". $row['kelas'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Asal tanggal </label>
								<div class="col-sm-6">
									<input type="date" id="e_tanggal_awal" name="e_tanggal_awal">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Ganti tanggal </label>
								<div class="col-sm-6">
									<input type="date" id="e_tanggal_akhir" name="e_tanggal_akhir">
								</div>
							</div>
								<button type="submit" id="btn_simpan" class="btn btn-sm btn-primary pull-right">
									<i class="ace-icon fa fa-save"></i>
									Update
								</button>
						</div>
					</div>
				</div>
				<!-- <div class="modal-footer">
					<button type="submit" id="btn_edit" class="btn btn-sm btn-success pull-left">
						<i class="ace-icon fa fa-save"></i>
						Ubah
					</button>
					<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Batal
					</button>
				</div> -->
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
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
				<th>Asal tanggal</th>
				<th>Tanggal pengganti</th>
				<!-- <th>Ingin Ganti Hari</th> -->
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="show_data">
		</tbody>
	</table>
</div>
<script>
	if ($("#formTambah").length > 0) {
		$("#formTambah").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				nama: {
					required: true,
				},
				id_jadwal: {
					required: true,
				},
				tanggal_awal: {
					required: true,
				},
				tanggal_akhir: {
					required: true,
				},
			},
			messages: {
				nama: {
					required: "Nama Guru harus diisi!"
				},
				id_jadwal: {
					required: "Jadwal harus diisi!"
				},
				tanggal_awal: {
					required: "Tanggal awal harus diisi!"
				},
				tanggal_akhir: {
					required: "Tanggal akhir harus diisi!"
				},
			},
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('kehadiranpengganti/simpan') ?>",
					type: "POST",
					data: $('#formTambah').serialize(),
					dataType: "json",
					success: function(response) {
						$('#btn_simpan').html('<i class="ace-icon fa fa-save"></i>' +
							'Simpan');
						if (response == true) {
							document.getElementById("formTambah").reset();
							swalInputSuccess();
							show_data();
							$('#modalTambah').modal('hide');
						} else if (response == 401) {
							swalIdDouble('Data duplicate!');
						} else {
							swalInputFailed();
						}
						// setTimeout(function(){
						// // $('#res_message').hide();
						// // $('#msg_div').hide();
						// },3000);
					}
				});
			}
		})
	}

	if ($("#formEdit").length > 0) {
		$("#formEdit").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				e_nama: {
					required: true,
				},
				e_id_jadwal: {
					required: true,
				},
				e_tanggal_awal: {
					required: true,
				},
				e_tanggal_akhir: {
					required: true,
				},
			},
			messages: {
				e_nama: {
					required: "Nama Guru harus diisi!"
				},
				e_id_jadwal: {
					required: "Jadwal harus diisi!"
				},
				e_tanggal_awal: {
					required: "Tanggal awal harus diisi!"
				},
				e_tanggal_akhir: {
					required: "Tanggal akhir harus diisi!"
				},
			},
			submitHandler: function(form) {
				$('#btn_edit').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('kehadiranpengganti/update') ?>",
					type: "POST",
					data: $('#formEdit').serialize(),
					dataType: "json",
					success: function(response) {
						$('#btn_edit').html('<i class="ace-icon fa fa-save"></i>' +
							'Ubah');
						if (response == true) {
							document.getElementById("formEdit").reset();
							swalEditSuccess();
							show_data();
							$('#modalEdit').modal('hide');
						} else if (response == 401) {
							swalIdDouble('Nama Jabatan Sudah digunakan!');
						} else {
							swalEditFailed();
						}
					}
				});
			}
		})
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		show_data();
		$('#table_id').DataTable();
	});

	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('kehadiranpengganti/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-center">' + no + '</td>' +
						'<td>[' + data[i].IdGuru + ']' + data[i].nama_guru + '</td>' +
						'<td>' + data[i].matapelajaran + '</td>' +
						'<td>' + data[i].ASALTGL + '</td>' +
						'<td>' + data[i].GANTIHARI + '</td>' +
						// '<td> <input  type="text" id="e_id" name="e_id"> </td>' +
						'<td class="text-center">' +
						'<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].ID + '">' +
						'<i class="ace-icon fa fa-pencil bigger-120"></i>' +
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

	//show modal tambah
	$('#item-tambah').on('click', function() {
		$('#modalTambah').modal('show');
	});

	//get data for update record
	$('#show_data').on('click', '.item_edit', function() {
		document.getElementById("formEdit").reset();
		var id = $(this).data('id');
		$('#modalEdit').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('kehadiranpengganti/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].ID);
				$('#e_nama').val(data[0].IdGuru);
				$('#e_id_jadwal').val(data[0].idJadwal);
				$('#e_tanggal_awal').val(data[0].ASALTGL);
				$('#e_tanggal_akhir').val(data[0].GANTIHARI);

			}
		});
	});

	$('#show_data').on('click', '.item_hapus', function() {
		var id = $(this).data('id');
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda tidak akan dapat mengembalikan ini!",
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
					url: "<?php echo base_url('kehadiranpengganti/delete') ?>",
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