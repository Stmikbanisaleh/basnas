<!-- <div class="row">
	<div class="col-xs-1">
		<button href="#my-modal2" role="button" data-toggle="modal" class="btn btn-xs btn-success">
			<a class="ace-icon fa fa-upload bigger-120"></a>Import Data
		</button>
	</div>
</div> -->
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
									<a href="<?php echo base_url() . 'approval/downloadsample' ?>" class="col-sm-3" for="form-field-1"> Download Sample Format</a>
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pilih </label>
								<input type="hidden" id="e_id" required name="e_id" class="form-control" />
								<div class="col-sm-9">
									<select required class="form-control" name="e_status" id="e_status">
										<option value="">-- Pilih Status--</option>
										<option value="0">Belum disetujui</option>
										<option value="1">Disetujui</option>
										<option value="2">Selesai</option>
										<option value="3">Ditolak</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Diajukan </label>
								<div class="col-sm-9">
									<input type="text" id="total_diajukan" readonly name="total_diajukan" placeholder="total penerimaan" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Disetujui </label>
								<div class="col-sm-9">
									<input type="text" id="e_total" required name="e_total" placeholder="total penerimaan" class="form-control" />
									<input type="hidden" id="e_total_v" required name="e_total_v" placeholder="total penerimaan" class="form-control" />
									<script language="JavaScript">
										var rupiah2 = document.getElementById('e_total');
										rupiah2.addEventListener('keyup', function(e) {
											rup2 = this.value.replace(/\D/g, '');
											$('#e_total_v').val(rup2);
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
			Semua Data <?= $page_name ?>
		</div>
	</div>
</div>
<div class="table-responsive">
	<table id="datatable_tabletools" class="display">
		<thead>
			<tr>
				<th class="text-center">No</th>
				<th class="text-center">Nama</th>
				<th class="text-center">Jenis Dana</th>
				<th class="text-center">Ansaf</th>
				<th class="text-center">Diajukan</th>
				<th class="text-center">Disetujui</th>
				<th class="text-center">Deskripsi</th>
				<th class="text-center">Proposal</th>
				<th class="text-center">Status</th>
				<th class="text-center">Tanggal</th>
				<th class="text-center">Petugas</th>
				<th class="text-center">Action</th>
			</tr>
		</thead>
		<tbody id="show_data">
		</tbody>
	</table>
</div>
<script type="text/javascript">
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

	if ($("#formImport").length > 0) {
		$("#formImport").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				is_approve: {
					required: true,
				},
				jumlah_dana_disetujui: {
					required: true,
				},
			},
			messages: {
				is_approve: {
					required: "Approve harus diisi!"
				},
				jumlah_data_disetujui: {
					required: "Dana Disetuji harus diisi!"
				},
			},
			submitHandler: function(form) {
				formdata = new FormData(form);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('approval/import') ?>",
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
	if ($("#formEdit").length > 0) {
		$("#formEdit").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			submitHandler: function(form) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('approval/update') ?>",
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
	});

	$('#show_data').on('click', '.item_edit', function() {
		var id = $(this).data('id');
		$('#modalEdit').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('approval/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_status').val(data[0].is_approve);
				var a = ConvertFormatRupiah(data[0].jumlah_dana, 'Rp. ');
				$('#total_diajukan').val(a);
				var b = ConvertFormatRupiah(data[0].jumlah_dana_disetujui, 'Rp. ');
				$('#e_total').val(b);
				$('#e_total_v').val(data[0].jumlah_dana_disetujui);
			}
		});
	});

	$('#show_data').on('click', '.item_print', function() {
		var id = $(this).data('id');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('approval/laporan_pdf') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			}
		});
	});

	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('approval/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					if (data[i].is_approve == '1') {
						var status = '<td class="text-center">' +
							'<button  href="#my-modal-detail" class="btn btn-xs btn-info " title="Add" data-id="' + data[i].id + '">' +
							'<i class="ace-icon fa fa-thumbs-up bigger-120"></i> Disetujui' +
							'</button> &nbsp' +
							'</td>';
						var print =  
						'<a target="_blank"  href="<?php echo base_url() . 'approval/laporan_pdf?id=' ?>' + data[i].id +'" class="btn btn-xs btn-danger" title="Print" data-id="' + data[i].id + '">' +
                                '<i class="ace-icon fa fa-print bigger-120"></i>' +
                                '</a>'+
						' &nbsp';
					} else if (data[i].is_approve == '2') {
						var status = '<td class="text-center">' +
							'<button  href="#my-modal-detail" class="btn btn-xs btn-success " title="Add" data-id="' + data[i].id + '">' +
							'<i class="ace-icon fa fa-check bigger-120"> </i> Selesai' +
							'</button> &nbsp' +
							'</td>';
							var print =  
						'<a target="_blank"  href="<?php echo base_url() . 'approval/laporan_pdf?id=' ?>' + data[i].id +'" class="btn btn-xs btn-danger" title="Print" data-id="' + data[i].id + '">' +
                                '<i class="ace-icon fa fa-print bigger-120"></i>' +
                                '</a>'+
						' &nbsp';
					} else if (data[i].is_approve == '3') {
						var status = '<td class="text-center">' +
							'<button  href="#my-modal-detail" class="btn btn-xs btn-danger " title="Add" data-id="' + data[i].id + '">' +
							'<i class="ace-icon fa fa-ban bigger-120"> </i> Ditolak' +
							'</button> &nbsp' +
							'</td>';
							var print = '';
					} else {
						var status = '<td class="text-center">' +
							'<button  href="#my-modal-detail" class="btn btn-xs btn-warning" title="Add" data-id="' + data[i].id + '">' +
							'<i class="ace-icon fa fa-bullhorn bigger-120"> </i> Menunggu disetujui' +
							'</button> &nbsp' +
							'</td>';
							var print = '';
					}
					html += '<tr>' +
						'<td class="text-center">' + no + '</td>' +
						'<td>' + data[i].namapenyalur + '</td>' +
						'<td>' + data[i].type + '</td>' +
						'<td>' + data[i].ansaf + '</td>' +
						'<td>' + data[i].Nominal + '</td>' +
						'<td>' + data[i].Nominal2 + '</td>' +
						'<td>' + data[i].deskripsi + '</td>' +
						'<td ><a href="<?php echo site_url('/assets/file/penyaluran/program/') ?>'+data[i].document_proposal+'"> Download Proposal</a></td>' +
						status +
						'<td>' + data[i].createdAt + '</td>' +
						'<td>' + data[i].petugasnama + '</td>' +
						'<td class="text-left">' +
						'<button  href="#my-modal-detail" class="btn btn-xs btn-info item_edit" title="Add" data-id="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-pencil bigger-120"></i>' +
						'</button> &nbsp' +
						print +
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
