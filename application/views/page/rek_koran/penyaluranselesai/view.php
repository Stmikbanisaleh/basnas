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
										<option value="1">Disetujui</option>
										<option value="2">Selesai</option>
									</select>
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
	if ($("#formEdit").length > 0) {
		$("#formEdit").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			submitHandler: function(form) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('penyaluranselesai/update') ?>",
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
			url: "<?php echo base_url('penyaluranselesai/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_status').val(data[0].is_approve);
				
			}
		});
	});

	$('#show_data').on('click', '.item_print', function() {
		var id = $(this).data('id');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('penyaluranselesai/laporan_pdf') ?>",
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
			url: '<?php echo site_url('penyaluranselesai/tampil') ?>',
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
</script>
