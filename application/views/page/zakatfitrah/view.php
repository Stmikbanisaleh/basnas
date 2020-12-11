<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<div class="row">
	<div class="col-xs-1">
		<button href="#my-modal" role="button" data-toggle="modal" class="btn btn-xs btn-info">
			<a class="ace-icon fa fa-plus bigger-120"></a>Tambah Data
		</button>
	</div>
	<br>
	<br>
</div>
<div class="row">
	<div class="col-xs-1">
		<button href="#my-modal2" role="button" data-toggle="modal" class="btn btn-xs btn-success">
			<a class="ace-icon fa fa-upload bigger-120"></a>Import Data
		</button>
	</div>
</div>
<br>
<div id="my-modal2" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Import Data <?= $page_name; ?></h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<?php if ($this->session->flashdata('message')) { ?>
						<div class="alert alert-danger"> <?= $this->session->flashdata('message') ?> </div>
					<?php } ?>
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
									<a href="<?php echo base_url() . 'zakatfitrah/downloadsample' ?>" class="col-sm-3" for="form-field-1"> Download Sample Format</a>
								</div>
							</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="btn_import" class="btn btn-sm btn-success pull-left">
					<i class="ace-icon fa fa-save"></i>
					Import
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

<div id="my-modal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Input Data <?= $page_name ?></h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" enctype="multipart/form-data" role="form" id="formTambah">
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Nama </label>
								<div class="col-sm-9">
									<select required class="form-control" required name="nama" id="nama">
										<option value="">-- Pilih Muzakki--</option>
										<?php foreach ($mymuzakki as $value) {
										?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NPWZ </label>
								<div class="col-sm-6">
									<input type="text" id="npwp"  name="npwp" placeholder="NPWZ" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Cara Penerimaan </label>
								<div class="col-sm-9">
									<select class="form-control" required name="penerimaan" id="penerimaan">
										<option value="0">-- Pilih --</option>
										<option value="Tunai">Tunai</option>
										<option value="Non Tunai">Non Tunai</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Pilih Nomor Rekening </label>
								<div class="col-sm-9">
									<select class="form-control"  required name="norek" id="norek">
										<option value="0">-- Pilih --</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Tanggal Penerimaan </label>
								<div class="col-sm-6">
									<input type="date" id="tanggal" required name="tanggal" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Total Penerimaan </label>
								<div class="col-sm-9">
									<input type="text" id="total" required name="total" placeholder="total penerimaan" class="form-control" />
									<input type="hidden" id="total_v" required name="total_v" placeholder="total penerimaan" class="form-control" />
									<script language="JavaScript">
										var rupiah2 = document.getElementById('total');
										rupiah2.addEventListener('keyup', function(e) {
											rup2 = this.value.replace(/\D/g, '');
											$('#total_v').val(rup2);
											rupiah2.value = formatRupiah(this.value, 'Rp. ');
										});

										function formatRupiah(angka, prefix) {
											var number_string = angka.replace(/[^,\d]/g, '').toString(),
												split = number_string.split(','),
												sisa = split[0].length % 3,
												rupiah = split[0].substr(0, sisa),
												ribuan = split[0].substr(sisa).match(/\d{3}/gi);

											// tambahkan titik jika yang di input sudah menjadi angka ribuan
											if (ribuan) {
												separator = sisa ? '.' : '';
												rupiah += separator + ribuan.join('.');
											}

											rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
											return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
										}
									</script>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Deskripsi </label>
								<div class="col-sm-9">
									<input type="text" id="deskripsi" required name="deskripsi" placeholder="Deskripsi" class="form-control" />
								</div>
							</div>

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="btn_simpan" class="btn btn-sm btn-success pull-left">
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

<div id="modalEdit" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Edit Data <?= $page_name ?></h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" enctype="multipart/form-data" role="form" id="formEdit">
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Nama </label>
								<div class="col-sm-9">
									<select required class="form-control" required name="e_nama" id="e_nama">
										<option value="">-- Pilih Muzakki--</option>
										<?php foreach ($mymuzakki as $value) {
										?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NPWZ </label>
								<div class="col-sm-6">
									<input type="hidden" id="e_id" required name="e_id" />
									<input type="text" id="e_npwz" required name="e_npwz" placeholder="NPWZ" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Cara Penerimaan </label>
								<div class="col-sm-9">
									<select class="form-control" required name="e_penerimaan" id="e_penerimaan">
										<option value="0">-- Pilih --</option>
										<option value="Tunai">Tunai</option>
										<option value="Non Tunai">Non Tunai</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pilih Nomor Rekening </label>
								<div class="col-sm-9">
									<select class="form-control" required name="e_norek" id="e_norek">
										<option value="0">-- Pilih --</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Tanggal Penerimaan </label>
								<div class="col-sm-6">
									<input type="date" id="e_tanggal" required name="e_tanggal" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Total Penerimaan </label>
								<div class="col-sm-9">
									<input type="text" id="e_total" required name="e_total" placeholder="total penerimaan" class="form-control" />
									<input type="hidden" id="e_total_v" required name="e_total_v" placeholder="total penerimaan" class="form-control" />
									<script language="JavaScript">
										var rupiah = document.getElementById('e_total');
										rupiah.addEventListener('keyup', function(e) {
											rup = this.value.replace(/\D/g, '');
											$('#e_total_v').val(rup);
											rupiah.value = formatRupiah(this.value, 'Rp. ');
										});

										function formatRupiah(angka, prefix) {
											var number_string = angka.replace(/[^,\d]/g, '').toString(),
												split = number_string.split(','),
												sisa = split[0].length % 3,
												rupiah = split[0].substr(0, sisa),
												ribuan = split[0].substr(sisa).match(/\d{3}/gi);

											// tambahkan titik jika yang di input sudah menjadi angka ribuan
											if (ribuan) {
												separator = sisa ? '.' : '';
												rupiah += separator + ribuan.join('.');
											}

											rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
											return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
										}
									</script>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Deskripsi </label>
								<div class="col-sm-9">
									<input type="text" id="e_deskripsi" name="e_deskripsi" placeholder="Deskripsi" class="form-control" />
								</div>
							</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="btn_update" class="btn btn-sm btn-success pull-left">
					<i class="ace-icon fa fa-save"></i>
					Update
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

<div class="row">
	<div class="col-xs-12">
		<div class="table-header">
			Semua Data Zakatfitrah
		</div>
	</div>
</div>
<div class="table-responsive">
	<table id="datatable_tabletools" class="display">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Cara Penerimaan</th>
				<th>Tanggal Penerimaan</th>
				<th>Total Penerimaan</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="show_data">
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$('#nama').select2({
		width: '100%',
		placeholder: "Pilih",
		allowClear: true
	});
	if ($("#formImport").length > 0) {
		$("#formImport").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				nama: {
					required: true,
				},
				
			},
			messages: {
				nama: {
					required: "Nama harus diisi!"
				},
			},
			submitHandler: function(form) {
				formdata = new FormData(form);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('zakatfitrah/import') ?>",
					data: formdata,
					processData: false,
					contentType: false,
					cache: false,
					async: false,
					success: function(data) {
						console.log(data);
						if (data == 1 || data == true) {
							document.getElementById("formImport").reset();
							swalInputSuccess();
							$('#my-modal2').modal('hide');
							show_data();
						} else if (data == 401) {
							document.getElementById("formImport").reset();
							swalIdDouble();
						} else {
							document.getElementById("formImport").reset();
							swalInputFailed();

						}
					}
				});
				return false;
			}
		});
	}

	if ($("#formTambah").length > 0) {
		$("#formTambah").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			submitHandler: function(form) {
				formdata = new FormData(form);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('zakatfitrah/simpan') ?>",
					data: formdata,
					processData: false,
					contentType: false,
					cache: false,
					async: false,
					success: function(data) {
						console.log(data);
						$('#my-modal').modal('hide');
						if (data == 1) {
							document.getElementById("formTambah").reset();
							swalInputSuccess();
							show_data();
						} else if (data == 401) {
							document.getElementById("formTambah").reset();
							swalIdDouble();
						} else {
							document.getElementById("formTambah").reset();
							swalInputFailed();
						}
					}
				});
				return false;
			}
		});
	}

	if ($("#formEdit").length > 0) {
		$("#formEdit").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			submitHandler: function(form) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('zakatfitrah/update') ?>",
					dataType: "JSON",
					data: $('#formEdit').serialize(),
					success: function(data) {
						$('#modalEdit').modal('hide');
						if (data == 1) {
							document.getElementById("formEdit").reset();
							swalEditSuccess();
							show_data();
						} else if (data == 401) {
							document.getElementById("formEdit").reset();
							swalIdDouble();
						} else {
							document.getElementById("formEdit").reset();
							swalEditFailed();
						}
					}
				});
				return false;
			}
		});
	}

	$(document).ready(function() {
		show_data();
		$('#datatable_tabletools').DataTable();
		$("#nama").change(function() {
			var ps = $('#nama').val();
			$.ajax({
				type: "POST",
				url: "zakatfitrah/shownorek",
				data: {
					ps: ps
				}
			}).done(function(data) {
				$("#norek").html(data);
			});
		});

		$("#nama").change(function() {
			var ps = $('#nama').val();
			$.ajax({
				type: "POST",
				url: "zakatmal/shownpwp",
				data: {
					ps: ps
				}
			}).done(function(data) {
				$("#npwp").val(data);
			});
		});
	});

	//Simpan guru

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
					url: "<?php echo base_url('zakatfitrah/delete') ?>",
					async: true,
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function(data) {
						show_data();
						swalDeleteSuccess();
					}
				});
			}
		})
	})

	$('#show_data').on('click', '.item_print', function() {
		var id = $(this).data('id');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('zakatfitrah/laporan_pdf') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			}
		});
	});

	$('#show_data').on('click', '.item_edit', function() {
		var id = $(this).data('id');
		$('#modalEdit').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('zakatfitrah/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_nama').val(data[0].id_muzakki);
				$('#e_penerimaan').val(data[0].cara_terima);
				$('#e_npwz').val(data[0].npwp);
				$('#e_tanggal').val(data[0].tgl_terima);
				var a = ConvertFormatRupiah(data[0].total_terima, 'Rp. ');
				$('#e_total').val(a);
				$('#e_total_v').val(data[0].total_terima);
				show_data_rekening(data[0].id_muzakki, function(a) {
					$('#e_norek').val(data[0].id_kartu);
				});
				$('#e_deskripsi').val(data[0].deskripsi);
			}
		});
	});

	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('zakatfitrah/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-center">' + no + '</td>' +
						'<td>' + data[i].nama + '</td>' +
						'<td>' + data[i].cara_terima + '</td>' +
						'<td>' + data[i].tgl_terima + '</td>' +
						'<td>' + data[i].Nominal + '</td>' +
						'<td class="text-center">' +
						'<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-pencil bigger-120"></i>' +
						'</button> &nbsp' +
						'<button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-trash-o bigger-120"></i>' +
						'</button> &nbsp' +
						'<a target="_blank"  href="<?php echo base_url() . 'zakatfitrah/laporan_pdf?id=' ?>' + data[i].id +'" class="btn btn-xs btn-success" title="Print" data-id="' + data[i].id + '">' +
                                '<i class="ace-icon fa fa-print bigger-120"></i>' +
                                '</a>'+
						' &nbsp'; +
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


	function show_data_rekening(id, callback) {
		var ps = id;
		$.ajax({
			type: "POST",
			url: "zakatfitrah/shownorek",
			data: {
				ps: ps
			}
		}).done(function(data) {
			console.log(data);
			$("#e_norek").html(data);
			callback()
		});
	}


	function ConvertFormatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}
</script>
