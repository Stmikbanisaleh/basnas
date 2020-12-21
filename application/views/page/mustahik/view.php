<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<div class="row">
	<form class="form-horizontal" id="formSearch">
		Kriteria Pencarian Mustahik
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kategori Mustahik </label>
			<div class="col-sm-6">
				<select class="form-control" name="kat_mustahik" id="kat_mustahik">
					<option value="">-- Pilih Mustahik --</option>
					<option value="Individu">Individu</option>
					<option value="Lembaga">Lembaga</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Muzaki </label>
			<div class="col-sm-3">
				<select class="form-control" name="nama2" id="nama2">
					<option value="">--Pilih Berdasarkan Nama</option>
					<?php foreach ($mynama as $value) { ?>
						<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
					<?php } ?>
				</select>
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
									<a href="<?php echo base_url() . 'mustahik/downloadsample' ?>" class="col-sm-3" for="form-field-1"> Download Sample Format</a>
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

<div id="modalRekening" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Rekening Data <?= $page_name ?></h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" role="form" id="formRekening">
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Muzaki </label>
								<div class="col-sm-6">
									<input type="text" id="nama3" readonly name="nama3" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat </label>
								<div class="col-sm-9">
									<input type="text" id="alamat3" readonly name="alamat3" placeholder="Nama Muzakki" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nomor Kartu </label>
								<div class="col-sm-6">
									<input type="text" id="no_kartu" required name="no_kartu" placeholder="Nomor Kartu" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Bank </label>
								<div class="col-sm-6">
									<input type="text" id="nama_bank" required name="nama_bank" placeholder="Nomor Kartu" class="form-control" />
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Kategori Mustahik </label>
								<div class="col-sm-9">
									<select class="form-control" required name="kat_mustahik" id="kat_mustahik">
										<option value="">--Pilih--</option>
										<?php foreach ($mykatmustahik as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Nama Musthaik </label>
								<div class="col-sm-9">
									<input type="text" id="nama" required name="nama" placeholder="Nama Mustahik" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pendapatan Bulananan </label>
								<div class="col-sm-6">
									<input type="text" id="pendapatan"  name="pendapatan" placeholder="Pendapatan Bulanan" class="form-control" />
									<input type="hidden" id="pendapatan_v"  name="pendapatan_v" />
									<script language="JavaScript">
										var rupiah = document.getElementById('pendapatan');
										rupiah.addEventListener('keyup', function(e) {
											rup = this.value.replace(/\D/g, '');
											$('#pendapatan_v').val(rup);
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Tipe Identitas </label>
								<div class="col-sm-9">
									<select class="form-control" required name="tipe_identitas" id="tipe_identitas">
										<option value="0">-- Pilih --</option>
										<option value="KTP">KTP</option>
										<option value="PASPORT">PASPORT</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Jenis Mustahik </label>
								<div class="col-sm-9">
									<select class="form-control" required name="jenis_mustahik" id="jenis_mustahik">
										<option value="0">-- Pilih --</option>
										<option value="Individu">Individu</option>
										<option value="Lembaga">Lembaga</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> No. Identitas </label>
								<div class="col-sm-9">
									<input type="text" id="idn" maxlength="16" name="idn" required placeholder="No. Identitas" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> No. KK </label>
								<div class="col-sm-9">
									<input type="text" id="no_kk" name="no_kk" required placeholder="No. KK" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Tempat Lahir </label>
								<div class="col-sm-6">
									<input type="text" id="tempat_lahir" required name="tempat_lahir" placeholder="Tempat Lahir" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Tanggal lahir </label>
								<div class="col-sm-6">
									<input type="date" id="tgl_lhr" required name="tgl_lhr" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Foto </label>
								<div class="col-sm-9">
									<input type="file" id="foto" required name="foto" placeholder="" class="form-control" />
								</div>
							</div>

						
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Jenis Kelamin </label>
								<div class="col-sm-9">
									<select class="form-control" required name="jk" id="jk">
										<option value="">-- Pilih Kelamin --</option>
										<option value="L">Laki - Laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Kewarganegaraan </label>
								<div class="col-sm-9">
									<select class="form-control" required name="warganegara" id="warganegara">
										<option value="">-- Pilih --</option>
										<option value="WNA">WNA</option>
										<option value="WNI">WNI</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Program </label>
								<div class="col-sm-9">
									<select class="form-control" name="ju" id="ju">
										<option value="">--Pilih--</option>
										<?php foreach ($myusaha as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat </label>
								<div class="col-sm-9">
									<input type="text" id="alamat" required name="alamat" placeholder="Alamat" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Provinsi </label>
								<div class="col-sm-9">
									<select class="form-control" required name="provinsi" id="provinsi">
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Kabupaten / Kota </label>
								<div class="col-sm-9">
								<select class="form-control" required name="kab_kot" id="kab_kot">
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Kecamatan </label>
								<div class="col-sm-9">
								<select class="form-control" required name="kec" id="kec">
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Desa / Kelurahan </label>
								<div class="col-sm-9">
									<input type="text" id="desa" name="desa" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kode Pos </label>
								<div class="col-sm-9">
									<input type="number"  id="kode_pos" name="kode_pos" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> No. Telp </label>
								<div class="col-sm-6">
									<input type="number" id="telp_mustahik" required name="telp_mustahik" placeholder="No. Telp" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Fax </label>
								<div class="col-sm-6">
									<input type="number" id="fax_mustahik" name="fax_mustahik" placeholder="FAX" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Hanphone </label>
								<div class="col-sm-6">
									<input type="number" id="hp_mustahik" required name="hp_mustahik" placeholder="Handphone" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> E-mail </label>
								<div class="col-sm-6">
									<input type="email" id="email" name="email" placeholder="E-mail" class="form-control" />
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Kategori Mustahik </label>
								<input type="hidden" id="e_id" required name="e_id" class="form-control" />
								<div class="col-sm-9">
									<select class="form-control" required name="e_kat_mustahik" id="e_kat_mustahik">
										<option value="">--Pilih--</option>
										<?php foreach ($mykatmustahik as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Nama Musthaik </label>
								<div class="col-sm-9">
									<input type="text" id="e_nama" required name="e_nama" placeholder="Nama Mustahik" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Pendapatan Bulananan </label>
								<div class="col-sm-6">
									<input type="text" id="e_pendapatan" required name="e_pendapatan" placeholder="Pendapatan Bulanan" class="form-control" />
									<input type="hidden" id="e_pendapatan_v" required name="e_pendapatan_v" />
									<script language="JavaScript">
										var rupiah2 = document.getElementById('e_pendapatan');
										rupiah2.addEventListener('keyup', function(e) {
											rup2 = this.value.replace(/\D/g, '');
											$('#e_pendapatan_v').val(rup2);
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Tipe Identitas </label>
								<div class="col-sm-9">
									<select class="form-control" required name="e_tipe_identitas" id="e_tipe_identitas">
										<option value="0">-- Pilih --</option>
										<option value="KTP">KTP</option>
										<option value="PASPORT">PASPORT</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Jenis Mustahik </label>
								<div class="col-sm-9">
									<select class="form-control" required name="e_jenis_mustahik" id="e_jenis_mustahik">
										<option value="0">-- Pilih --</option>
										<option value="Individu">Individu</option>
										<option value="Lembaga">Lembaga</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. Identitas </label>
								<div class="col-sm-9">
									<input type="text" id="e_idn" name="e_idn" placeholder="No. Identitas" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. KK </label>
								<div class="col-sm-9">
									<input type="text" id="e_no_kk" name="e_no_kk" placeholder="No. KK" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tempat Lahir </label>
								<div class="col-sm-6">
									<input type="text" id="e_tempat_lahir" required name="e_tempat_lahir" placeholder="Tempat Lahir" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Foto </label>
								<div class="col-sm-9">
									<input type="file" id="e_foto" name="e_foto" placeholder="" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal lahir </label>
								<div class="col-sm-6">
									<input type="date" id="e_tgl_lhr" required name="e_tgl_lhr" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Jenis Kelamin </label>
								<div class="col-sm-9">
									<select class="form-control" required name="e_jk" id="e_jk">
										<option value="">-- Pilih Kelamin --</option>
										<option value="L">Laki - Laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <b>*</b> Kewarganegaraan </label>
								<div class="col-sm-9">
									<select class="form-control" required name="e_warganegara" id="e_warganegara">
										<option value="">-- Pilih --</option>
										<option value="WNA">WNA</option>
										<option value="WNI">WNI</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Jenis Usaha </label>
								<div class="col-sm-9">
									<select class="form-control" required name="e_ju" id="e_ju">
										<option value="">--Pilih--</option>
										<?php foreach ($myusaha as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Alamat </label>
								<div class="col-sm-9">
									<input type="text" id="e_alamat" required name="e_alamat" placeholder="Alamat" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Provinsi </label>
								<div class="col-sm-9">
									<select class="form-control" name="e_provinsi" id="e_provinsi">
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kabupaten / Kota </label>
								<div class="col-sm-9">
								<select class="form-control" name="e_kab_kot" id="e_kab_kot">
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kecamatan </label>
								<div class="col-sm-9">
								<select class="form-control" name="e_kec" id="e_kec">
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Desa / Kelurahan </label>
								<div class="col-sm-9">
									<input type="text" id="e_desa" name="e_desa" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Kode Pos </label>
								<div class="col-sm-9">
									<input type="number" id="e_kode_pos" required name="e_kode_pos" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. Telp </label>
								<div class="col-sm-6">
									<input type="number" id="e_telp_mustahik" required name="e_telp_mustahik" placeholder="No. Telp" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Fax </label>
								<div class="col-sm-6">
									<input type="number" id="e_fax_mustahik" name="e_fax_mustahik" placeholder="FAX" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>*</b> Hanphone </label>
								<div class="col-sm-6">
									<input type="number" id="e_hp_mustahik" required name="e_hp_mustahik" placeholder="Handphone" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> E-mail </label>
								<div class="col-sm-6">
									<input type="email" id="e_email" name="e_email" placeholder="E-mail" class="form-control" />
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
			Semua Data Mustahik
		</div>
	</div>
</div>
<div class="table-responsive">
	<table id="datatable_tabletools" class="display">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Mustahik</th>
				<th>Foto</th>
				<th>Jenis Mustahik</th>
				<th>Kategori</th>
				<th>Alamat</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="show_data">
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$('#kab_kot').select2({
		width: '100%',
		placeholder: "Pilih",
		allowClear: true
	});

	$('#provinsi').select2({
		width: '100%',
		placeholder: "Pilih",
		allowClear: true
	});

	$('#kec').select2({
		width: '100%',
		placeholder: "Pilih",
		allowClear: true
	});

	$('kat_mustahik').select2({
		width: '100%',
		placeholder: "Pilih",
		allowClear: true
	});

	$('provinsi').select2({
		width: '100%',
		placeholder: "Pilih",
		allowClear: true
	});

	$('kab_kot').select2({
		width: '100%',
		placeholder: "Pilih",
		allowClear: true
	});

	$('ju').select2({
		width: '100%',
		placeholder: "Pilih",
		allowClear: true
	});

	$('provinsi').select2({
		width: '100%',
		placeholder: "Pilih",
		allowClear: true
	});

	$('kab_kot').select2({
		width: '100%',
		placeholder: "Pilih",
		allowClear: true
	});

	$('kat_mustahik').select2({
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
				telepon: {
					required: true,
					digits: true,
					maxlength: 14,
					minlength: 10,
				},
				alamat: {
					required: true,
					minlength: 10,
				},
				email: {
					required: true,
					email: true,
				},
			},
			messages: {
				nama: {
					required: "Nama harus diisi!"
				},
				telepon: {
					required: "Telepon harus diisi!"
				},
				alamat: {
					required: "Harap Masukan alamat dengan benar!"
				},
			},
			submitHandler: function(form) {
				formdata = new FormData(form);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('mustahik/import') ?>",
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
					url: "<?php echo base_url('mustahik/simpan') ?>",
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
				formdata = new FormData(form);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('mustahik/update') ?>",
					data: formdata,
					processData: false,
					contentType: false,
					cache: false,
					async: false,
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
		$.ajax({
			type: "POST",
			url: "mustahik/showprovinsi",
		}).done(function(data) {
			$("#provinsi").html(data);
			$("#e_provinsi").html(data);
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
					url: "<?php echo base_url('mustahik/delete') ?>",
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

	$("#provinsi").change(function() {
		var provinsi = $('#provinsi').val();
		$.ajax({
			type: "POST",
			url: "mustahik/showkab",
			data:{
				provinsi:provinsi,
			}
		}).done(function(data) {
			$("#kab_kot").html(data);
		});
	});

	$("#kab_kot").change(function() {
		var provinsi = $('#provinsi').val();
		var cityid = $('#kab_kot').val();
		$.ajax({
			type: "POST",
			url: "mustahik/showkec",
			data:{
				cityid:cityid,
			}
		}).done(function(data) {
			$("#kec").html(data);
		});
	});

	$("#e_provinsi").change(function() {
		var provinsi = $('#e_provinsi').val();
		$.ajax({
			type: "POST",
			url: "mustahik/showkab",
			data:{
				provinsi:provinsi,
			}
		}).done(function(data) {
			$("#e_kab_kot").html(data);
		});
	});

	$("#e_kab_kot").change(function() {
		var provinsi = $('#e_provinsi').val();
		var cityid = $('#e_kab_kot').val();
		$.ajax({
			type: "POST",
			url: "mustahik/showkec",
			data:{
				cityid:cityid,
			}
		}).done(function(data) {
			$("#e_kec").html(data);
		});
	});

	$('#show_data').on('click', '.item_edit', function() {
		var id = $(this).data('id');
		$('#modalEdit').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('mustahik/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_kat_mustahik').val(data[0].kat_mustahik);
				var a = ConvertFormatRupiah(data[0].pendapatan, 'Rp. ');
				$('#e_pendapatan').val(a);
				$('#e_pendapatan_v').val(data[0].pendapatan);
				$('#e_tanggal').val(data[0].tgl_reg);
				$('#e_nama').val(data[0].nama);
				$('#e_npwp').val(data[0].npwp);
				$('#e_tipe_identitas').val(data[0].tipe_identitas);
				$('#e_idn').val(data[0].no_identitas);
				$('#e_warganegara').val(data[0].kewarganegaraan);
				$('#e_tempat_lahir').val(data[0].tmp_lhr);
				$('#e_tgl_lhr').val(data[0].tgl_lhr);
				$('#e_jk').val(data[0].jenis_kelamin);
				$('#e_no_kk').val(data[0].no_kk);
				$('#e_kerja').val(data[0].pekerjaan);
				$('#e_status').val(data[0].status_pernikahan);
				$('#e_pendidikan').val(data[0].status_pendidikan);
				$('#e_alamat').val(data[0].alamat);
				$('#e_provinsi').val(data[0].provinsi);
				$('#e_kab_kot').val(data[0].kab_kota);
				$('#e_kec').val(data[0].kecamatan);
				$('#e_desa').val(data[0].desa_kelurahan);
				$('#e_kode_pos').val(data[0].kode_pos);
				$('#e_kepemilikan').val(data[0].status_rumah);
				$('#e_telp_mustahik').val(data[0].telp);
				$('#e_fax_mustahik').val(data[0].fax);
				$('#e_hp_mustahik').val(data[0].handphone);
				$('#e_email').val(data[0].email);
				$('#e_website').val(data[0].website);
				$('#e_jenis_mustahik').val(data[0].jenis_mustahik);
				$('#e_ju').val(data[0].jenis_usaha);
			}
		});
	});

	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('mustahik/tampil') ?>',
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
						'<td ><a href="<?php echo site_url('/assets/image/mustahik/') ?>' + data[i].foto + '"> <img style="width:80px; height: 60px;" src="<?php echo site_url('/assets/image/mustahik/') ?>' + data[i].foto + '""></a></td>' +
						'<td>' + data[i].jenis_mustahik + '</td>' +
						'<td>' + data[i].kat_mustahiks + '</td>' +
						'<td>' + data[i].alamat + '</td>' +
						'<td class="text-center">' +
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


	$('#show_data').on('click', '.item_rekening', function() {
		var id = $(this).data('id');
		$('#modalRekening').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('muzakki/tampil_byidrekening') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#nama3').val(data[0].nama);
				$('#alamat3').val(data[0].alamat);
				$('#no_kartu').val(data[0].nokartu);
				$('#nama_bank').val(data[0].namabank);

			}
		});
	});

	if ($("#formRekening").length > 0) {
		$("#formRekening").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			submitHandler: function(form) {
				formdata = new FormData(form);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('muzakki/simpanrekening') ?>",
					data: formdata,
					processData: false,
					contentType: false,
					cache: false,
					async: false,
					success: function(data) {
						console.log(data);
						$('#modalRekening').modal('hide');
						if (data == 1) {
							document.getElementById("formRekening").reset();
							swalInputSuccess();
							show_data();
						} else if (data == 401) {
							document.getElementById("formRekening").reset();
							swalIdDouble();
						} else {
							document.getElementById("formRekening").reset();
							swalInputFailed();
						}
					}
				});
				return false;
			}
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
					url: '<?php echo site_url('mustahik/search') ?>',
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
								'<td>' + data[i].nama + '</td>' +
								'<td ><a href="<?php echo site_url('/assets/image/mustahik/') ?>' + data[i].foto + '"> <img style="width:80px; height: 60px;" src="<?php echo site_url('/assets/image/mustahik/') ?>' + data[i].foto + '""></a></td>' +
								'<td>' + data[i].jenis_mustahik + '</td>' +
								'<td>' + data[i].kat_mustahiks + '</td>' +
								'<td>' + data[i].alamat + '</td>' +
								'<td class="text-center">' +
								'<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].id + '">' +
								'<i class="ace-icon fa fa-pencil bigger-120"></i>' +
								'</button> &nbsp' +
								// '</button> &nbsp' +
								// '<button  href="#my-modal-rekening" class="btn btn-xs btn-success item_rekening" title="Rekening" data-id="' + data[i].id + '">' +
								// '<i class="ace-icon fa fa-book bigger-120"></i>' +
								// '</button> &nbsp' +
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
</script>
