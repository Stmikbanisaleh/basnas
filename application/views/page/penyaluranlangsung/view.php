<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<div class="row">
	<form class="form-horizontal" role="form" id="formSearch">
		Kriteria Pencarian
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sub Program </label>
			<div class="col-sm-3">
				<select class="form-control basic-single2" name="penyalur" id="penyalur">
					<option value="">-- Pilih --</option>
					<?php foreach ($mysubprogram as $value) {
					?>
						<option value=<?= $value['id'] ?>><?= $value['deskripsi'] ?></option>
					<?php }
					?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>
			<div class="col-sm-3">
				<select class="basic-single form-control" name="status" id="status">
					<option value="">-- Pilih --</option>
					<option value="1">Approved</option>
					<option value="0">UnApprove</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tipe Ansaf </label>
			<div class="col-sm-3">
				<select class="form-control basic-single3" name="tipe" id="tipe">
					<option value="">-- Pilih --</option>
					<?php foreach ($mykategorimustahik as $value) {
					?>
						<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
					<?php }
					?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Dana </label>
			<div class="col-sm-3">
				<select class="form-control basic-single4" name="jenis" id="jenis">
					<option value="">-- Pilih --</option>
					<?php foreach ($mytype as $value) {
					?>
						<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
					<?php }
					?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Periode </label>
			<div class="col-sm-3">
				<div class="input-group">
					<input class="form-control date-picker" id="id-date-picker-1" name="periode_awal" type="date" data-date-format="dd-mm-yyyy" />
					<span class="input-group-addon">
						<i class="fa fa-calendar bigger-110"></i>
					</span>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="input-group">
					<input class="form-control date-picker" id="id-date-picker-1" type="date" name="periode_akhir" data-date-format="dd-mm-yyyy" />
					<span class="input-group-addon">
						<i class="fa fa-calendar bigger-110"></i>
					</span>
				</div>
			</div>
		</div>
		<td>
		<td>

			<div class="col-xs-9">
				<button type="submit" id="btn_search" class="btn btn-sm btn-success pull-right">
					<a class="ace-icon fa fa-search bigger-120"></a>Periksa
				</button>
			</div>
			<br>
			<br>
	</form>
</div>
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
		<button href="#my-modal22" role="button" data-toggle="modal" class="btn btn-xs btn-success">
			<a class="ace-icon fa fa-upload bigger-120"></a>Import Data
		</button>
	</div>
</div>
<br>
<div id="my-modal22" class="modal fade" tabindex="-1">
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
									<a href="<?php echo base_url() . 'penyaluranlangsung/downloadsample' ?>" class="col-sm-3" for="form-field-1"> Download Sample Format</a>
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
<div id="my-modal2" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Input <?= $page_name ?>
				</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" enctype="multipart/form-data" role="form" id="formTambah2">
							<input type="hidden" id="e_id2" required name="e_id2" class="form-control" />
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Mustahik </label>
								<div class="col-sm-6">
									<select class="form-control" required name="nama3" id="nama3">
										<option value="">-- Pilih --</option>
										<?php foreach ($mymustahik as $value) {
										?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php }
										?>
									</select>
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

<div id="my-modal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Input <?= $page_name ?>
				</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" enctype="multipart/form-data" role="form" id="formTambah">
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tipe Ansaf </label>
								<div class="col-sm-6">
									<select class="form-control" name="tipe2" id="tipe2">
										<option value="">-- Pilih --</option>
										<?php foreach ($mykategorimustahik as $value) {
										?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Penerimaan </label>
								<div class="col-sm-6">
									<input type="date" id="tanggal2" required name="tanggal2" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Total Penerimaan </label>
								<div class="col-sm-9">
									<input type="text" id="total" required name="total" placeholder="Total Penerimaan" class="form-control" />
									<input type="hidden" id="total_v" required name="total_v" class="form-control" />
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Dana </label>
								<div class="col-sm-9">
									<select class="form-control" name="jenis2" id="jenis2">
										<option value="">-- Pilih --</option>
										<?php foreach ($mytype as $value) {
										?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Proposal </label>
								<div class="col-sm-6">
									<input type="file" id="proposal" required name="proposal" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Mustahik </label>
								<div class="col-sm-6">
									<select class="form-control" required name="pic" id="pic">
										<option value="">-- Pilih --</option>
										<?php foreach ($mymustahik as $value) {
										?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Deskripsi </label>
								<div class="col-sm-9">
									<textarea id="deskripsi" required name="deskripsi" class="form-control"></textarea>
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

<div id="my-modal-detail" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal " aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Input Detail Penyaluran
				</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" role="form" id="formTambah">
							<div class="form-group">
								<div class="table-responsive">
									<table id="datatable_tabletools2" class="display">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Mustahik</th>
												<th>Tipe Mustahik</th>
												<th>Alamat</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody id="show_data2">
										</tbody>
									</table>
								</div>
							</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Kembali
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tipe Ansaf </label>
								<div class="col-sm-6">
									<select class="form-control" name="e_tipe2" id="e_tipe2">
										<option value="">-- Pilih --</option>
										<?php foreach ($mykategorimustahik as $value) {
										?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Penerimaan </label>
								<div class="col-sm-6">
									<input type="hidden" id="e_id" required name="e_id" class="form-control" />
									<input type="date" id="e_tanggal2" required name="e_tanggal2" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Total Penerimaan </label>
								<div class="col-sm-9">
									<input type="text" id="e_total" required name="e_total" placeholder="Total Penerimaan" class="form-control" />
									<input type="hidden" id="e_total_v" required name="e_total_v" class="form-control" />
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Dana </label>
								<div class="col-sm-9">
									<select class="form-control" name="e_jenis2" id="e_jenis2">
										<option value="">-- Pilih --</option>
										<?php foreach ($mytype as $value) {
										?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>
							
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Proposal </label>
								<div class="col-sm-6">
									<input type="file" id="asdf" required name="asdf" class="form-control" />
									<input type="hidden" id="e_proposal_hide" required name="e_proposal_hide" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Mustahik </label>
								<div class="col-sm-6">
									<select class="form-control" required name="e_pic" id="e_pic">
										<option value="">-- Pilih --</option>
										<?php foreach ($mymustahik as $value) {
										?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Deskripsi </label>
								<div class="col-sm-9">
									<textarea id="e_deskripsi" required name="e_deskripsi" class="form-control"></textarea>
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
			Semua Data Penyaluran Langsung
		</div>
	</div>
</div>
<br>
<div class="table-responsive">
	<table id="datatable_tabletools" class="display">
		<thead>
			<tr>
				<th>No</th>
				<th class="text-center">Jenis Dana</th>
				<th class="text-center">Ansaf</th>
				<th class="text-center">Jumlah Dana</th>
				<th class="text-center">Deskripsi</th>
				<th class="text-center">Status</th>
				<th class="text-center">Tanggal</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="show_data">
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$('#penyalur').select2({
		width: '100%',
		placeholder: "Pilih",
		allowClear: true
	});

	$('#tipe2').select2({
		width: '100%',
		placeholder: "Pilih",
		allowClear: true
	});

	if ($("#formImport").length > 0) {
		$("#formImport").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				ansaf: {
					required: true,
				},
				
			},
			messages: {
				ansaf: {
					required: "Ansaf harus diisi!"
				},
			},
			submitHandler: function(form) {
				formdata = new FormData(form);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('penyaluranlangsung/import') ?>",
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
					url: '<?php echo site_url('penyaluranlangsung/search') ?>',
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
							if (data[i].status == '1') {
								var status = '<td> APPROVED</td>'
							} else {
								var status = '<td> UNAPPROVED</td>';
							}
							html += '<tr>' +
								'<td class="text-center">' + no + '</td>' +
								'<td>' + data[i].type + '</td>' +
								'<td>' + data[i].ansaf + '</td>' +
								'<td>' + data[i].Nominal + '</td>' +
								'<td>' + data[i].deskripsi + '</td>' +
								status +
								'<td>' + data[i].createdAt + '</td>' +
								'<td class="text-center">' +
								'<button  href="#my-modal-detail" class="btn btn-xs btn-warning item_add" title="Add" data-id="' + data[i].id + '">' +
								'<i class="ace-icon fa fa-plus bigger-120"></i>' +
								'</button> &nbsp' +
								'<button  href="#my-modal-detail" class="btn btn-xs btn-success item_mustahik" title="Add" data-id="' + data[i].id + '">' +
								'<i class="ace-icon fa fa-book bigger-120"></i>' +
								'</button> &nbsp' +
								'<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].id + '">' +
								'<i class="ace-icon fa fa-pencil bigger-120"></i>' +
								'</button> &nbsp' +
								'<button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="' + data[i].id + '">' +
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

							});

						}
						/* END TABLETOOLS */
					}
				});

			}
		})
	}

	if ($("#formTambah").length > 0) {
		$("#formTambah").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				proposal: {
					required: false,
				},
				
			},
			submitHandler: function(form) {
				formdata = new FormData(form);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('penyaluranlangsung/simpan') ?>",
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

	if ($("#formTambah2").length > 0) {
		$("#formTambah2").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			submitHandler: function(form) {
				formdata = new FormData(form);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('penyaluranlangsung/simpan2') ?>",
					data: formdata,
					processData: false,
					contentType: false,
					cache: false,
					async: false,
					success: function(data) {
						console.log(data);
						$('#my-modal2').modal('hide');
						if (data == 1) {
							document.getElementById("formTambah2").reset();
							swalInputSuccess();
							show_data();
						} else if (data == 401) {
							document.getElementById("formTambah2").reset();
							swalIdDouble();
						} else {
							document.getElementById("formTambah2").reset();
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
			rules: {
				asdf: {
					required: false,
				},
				
			},
			submitHandler: function(form) {
				formdata = new FormData(form);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('penyaluranlangsung/update') ?>",
					data: formdata,
					processData: false,
					contentType: false,
					cache: false,
					async: false,
					// dataType: "JSON",
					// data: $('#formEdit').serialize(),
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
		$('#datatable_tabletools2').DataTable();
		$('.basic-single').select2({
			width: '100%',
			placeholder: "--Pilih--",
			allowClear: true
		});
		$('.basic-single2').select2({
			width: '100%',
			placeholder: "--Pilih--",
			allowClear: true
		});
		$('.basic-single3').select2({
			width: '100%',
			placeholder: "--Pilih--",
			allowClear: true
		});
		$('.basic-single4').select2({
			width: '100%',
			placeholder: "--Pilih--",
			allowClear: true
		});
	});


	$('#show_data2').on('click', '.item_hapus2', function() {
		var id = $(this).data('id');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('penyaluranlangsung/delete2') ?>",
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
	})
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
					url: "<?php echo base_url('penyaluranlangsung/delete') ?>",
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
	$('#show_data').on('click', '.item_add', function() {
		var id = $(this).data('id');
		$('#my-modal2').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('penyaluranlangsung/tampil_byidprogram2') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id2').val(data[0].id);
			}
		});
	});

	$('#show_data').on('click', '.item_mustahik', function() {
		var id = $(this).data('id');
		$('#my-modal-detail').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('penyaluranlangsung/tampil_byidprogram') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-center">' + no + '</td>' +
						'<td>' + data[i].nama + '</td>' +
						'<td>' + data[i].jenis_mustahik + '</td>' +
						'<td>' + data[i].alamat + '</td>' +
						'<td class="text-center">' +
						'<button class="btn btn-xs btn-danger item_hapus2"  data-id="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-trash-o bigger-120"></i>' +
						'</button>' +
						'</td>' +
						'</tr>';
					no++;
				}
				$("#datatable_tabletools2").dataTable().fnDestroy();
				var a = $('#show_data2').html(html);
				//                    $('#mydata').dataTable();
				if (a) {
					$('#datatable_tabletools2').dataTable({
						"bPaginate": true,
						"bLengthChange": false,
						"bFilter": true,
						"bInfo": false,
						"bAutoWidth": false
					});
				}
			}
		});
	});

	$('#show_data').on('click', '.item_edit', function() {
		var id = $(this).data('id');
		$('#modalEdit').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('penyaluranlangsung/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_tanggal2').val(data[0].createdAt);
				var a = ConvertFormatRupiah(data[0].jumlah_dana, 'Rp. ');
				$('#e_total').val(a);
				$('#e_total_v').val(data[0].jumlah_dana);
				$('#e_proposal_hide').val(data[0].document_proposal);
				$('#e_pic').val(data[0].pic);
				// $('#e_total_v').val(data[0].total);
				$('#e_tipe2').val(data[0].ansaf);
				$('#e_jenis2').val(data[0].type);
				$('#e_deskripsi').val(data[0].deskripsi);
			}
		});
	});

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
	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('penyaluranlangsung/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					if (data[i].is_approve == '1') {
						var status = '<td class="text-center">' +
						'<button  href="#my-modal-detail" class="btn btn-xs btn-info " data-id="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-thumbs-up bigger-120"></i> Disetujui' +
						'</button> &nbsp' +
						'</td>';
					 } else if (data[i].is_approve == '2') {
						var status = '<td class="text-center">' +
						'<button  href="#my-modal-detail" class="btn btn-xs btn-success " data-id="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-check-square-o bigger-120"> </i> Selesai' +
						'</button> &nbsp' +
						'</td>';
					} else if (data[i].is_approve == '3') {
						var status = '<td class="text-center">' +
						'<button  href="#my-modal-detail" class="btn btn-xs btn-danger " data-id="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-ban bigger-120"> </i> Ditolak' +
						'</button> &nbsp' +
						'</td>';
					}
					 else {
						var status = '<td class="text-center">' +
						'<button  href="#my-modal-detail" class="btn btn-xs btn-warning " title="Add" data-id="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-bullhorn bigger-120"> </i> Menunggu disetujui' +
						'</button> &nbsp' +
						'</td>';
					}
					html += '<tr>' +
						'<td class="text-center">' + no + '</td>' +
						'<td>' + data[i].type + '</td>' +
						'<td>' + data[i].ansaf + '</td>' +
						'<td>' + data[i].Nominal + '</td>' +
						'<td>' + data[i].deskripsi + '</td>' +
						status +
						'<td>' + data[i].createdAt + '</td>' +
						'<td class="text-center">' +
						'<button  href="#my-modal-detail" class="btn btn-xs btn-warning item_add" title="Add" data-id="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-plus bigger-120"></i>' +
						'</button> &nbsp' +
						'<button  href="#my-modal-detail" class="btn btn-xs btn-success item_mustahik" title="Add" data-id="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-book bigger-120"></i>' +
						'</button> &nbsp' +
						'<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-pencil bigger-120"></i>' +
						'</button> &nbsp' +
						'<button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-trash-o bigger-120"></i>' +
						'</button> &nbsp' +
						'<a target="_blank"  href="<?php echo base_url() . 'penyaluranlangsung/laporan_pdf?id=' ?>' + data[i].id +'" class="btn btn-xs btn-default" title="Print" data-id="' + data[i].id + '">' +
                                '<i class="ace-icon fa fa-print bigger-120"></i>' +
                                '</a>'+
						' &nbsp'+
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
