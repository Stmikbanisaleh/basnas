<div class="row">
	<div class="col-xs-1">
		<button id="item-tambah" role="button" data-toggle="modal" class="btn btn-xs btn-warning">
			<a class="ace-icon fa fa-plus bigger-120"></a>Generate
		</button>
	</div>
	<br>
	<br>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="table-header">
			Semua Data <?= $page_name; ?>
		</div>
	</div>
</div>
<br>
<div id="modalTambah" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form  <?= $page_name; ?></h3>
			</div>
			<form class="form-horizontal" role="form" id="formTambah">
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun </label>
								<div class="col-sm-6">
									<input type="text" id="tahun" maxlength="4" name="tahun" required placeholder="2020" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bulan </label>
								<div class="col-sm-6">
									<select class="form-control" required name="bln" id="bln">
										<option value="0">--Bulan Awal--</option>
										<option value="01">Januari</option>
										<option value="02">Februari</option>
										<option value="03">Maret</option>
										<option value="04">April</option>
										<option value="05">Mei</option>
										<option value="06">Juni</option>
										<option value="07">Juli</option>
										<option value="08">Agustus</option>
										<option value="09">September</option>
										<option value="10">Oktober</option>
										<option value="11">November</option>
										<option value="12">Desember</option>
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
<div class="table-responsive">
	<table id="table_id" class="display">
		<thead>
			<tr>
				<th class="col-md-1">No</th>
				<th>Nama Operator</th>
				<th>Keterangan</th>
				<th>NIP</th>
				<th>Waktu generate</th>
			</tr>
		</thead>
		<tbody id="show_data">
		</tbody>
	</table>
</div>
<script>
	$('#item-tambah').on('click', function() {
		$('#modalTambah').modal('show');
	});

	if ($("#formTambah").length > 0) {
		$("#formTambah").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			submitHandler: function(form) {
			}
		})
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		show_data();
		$('#table_id').DataTable();
	});

	$('#btn_simpan').on('click', function() {
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda yakin aja mengenerate atau kemungkinan data gaji pada bulan ini akan berubah!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Generate!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				$('#btn_simpan').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('generategajikaryawan/generate') ?>",
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
							swalIdDouble('Nama Jabatan Sudah digunakan!');
						} else {
							swalInputFailed();
						}
					}
				});
			}
		})
	})

	function generate() {
		$('#btn_generate').html('Generating...');
		document.getElementById("btn_generate").setAttribute("disabled", true);
		$.ajax({
			url: "<?php echo base_url('generategajikaryawan/generate') ?>",
			type: "POST",
			dataType: "json",
			success: function(response) {
				// console.log(response);
				$('#btn_generate').html('<i class="ace-icon fa fa-plus"></i>' +
					'Generate');
				if (response == true) {
					swalGenerateSuccess();
					document.getElementById("btn_generate").removeAttribute("disabled");
					show_data();
				} else if (response == 401) {
					swalIdDouble('Nama Ruangan Sudah digunakan!');
					document.getElementById("btn_generate").removeAttribute("disabled");
				} else {
					swalGenerateFailed();
					document.getElementById("btn_generate").removeAttribute("disabled");
				}
			}
		});
	};
	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('generategajikaryawan/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-center">' + no + '</td>' +
						'<td>' + data[i].username + '</td>' +
						'<td> Sukses </td>' +
						'<td>' + data[i].nip + '</td>' +
						'<td>' + data[i].waktu + '</td>' +
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

</script>