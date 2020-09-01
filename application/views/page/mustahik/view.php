<div class="row">
	<form class="form-horizontal" target="_blank" method="POST" role="form" id="formSearch" action="<?php echo base_url() ?>muzakki/laporan">
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
<div id="my-modal2" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Import Data <?= $page_name; ?></h3>
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
									<a label class="col-sm-3" for="form-field-1"> Download Sample Format </label></a>
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
<div id="my-modal" class="modal fade" tabindex="-1">
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kategori Mustahik </label>
								<div class="col-sm-9">
									<select class="form-control" name="kat_mustahik" id="kat_mustahik">
										<option value="">--Pilih--</option>
										<?php foreach ($mykatmustahik as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>


							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Musthaik </label>
								<div class="col-sm-9">
									<input type="text" id="nama" required name="nama" placeholder="Nama Mustahik" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pendapatan Bulananan </label>
								<div class="col-sm-6">
									<input type="text" id="pendapatan" required name="pendapatan" placeholder="Pendapatan Bulanan" class="form-control" />
									<input type="hidden" id="pendapatan_v" required name="pendapatan_v" />
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tipe Identitas </label>
								<div class="col-sm-9">
									<select class="form-control" name="tipe_identitas" id="tipe_identitas">
										<option value="0">-- Pilih --</option>
										<option value="KTP">KTP</option>
										<option value="PASPORT">PASPORT</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Mustahik </label>
								<div class="col-sm-9">
									<select class="form-control" name="jenis_mustahik" id="jenis_mustahik">
										<option value="0">-- Pilih --</option>
										<option value="Individu">Individu</option>
										<option value="Lembaga">Lembaga</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. Identitas </label>
								<div class="col-sm-9">
									<input type="text" id="idn" required name="idn" placeholder="No. Identitas" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tempat Lahir </label>
								<div class="col-sm-6">
									<input type="text" id="tempat_lahir" required name="tempat_lahir" placeholder="Tempat Lahir" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal lahir </label>
								<div class="col-sm-6">
									<input type="date" id="tgl_lhr" required name="tgl_lhr" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Kelamin </label>
								<div class="col-sm-9">
									<select class="form-control" name="jk" id="jk">
										<option value="">-- Pilih Kelamin --</option>
										<option value="L">Laki - Laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kewarganegaraan </label>
								<div class="col-sm-9">
									<select class="form-control" name="warganegara" id="warganegara">
										<option value="">-- Pilih --</option>
										<option value="WNA">WNA</option>
										<option value="WNI">WNI</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Usaha </label>
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Provinsi </label>
								<div class="col-sm-9">
									<select class="form-control" name="provinsi" id="provinsi">
										<option value="">--Pilih--</option>
										<?php foreach ($myprovinsi as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['proptbpro'] ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kabupaten / Kota </label>
								<div class="col-sm-9">
									<input type="text" id="kab_kot" required name="kab_kot" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kecamatan </label>
								<div class="col-sm-9">
									<input type="text" id="kec" required name="kec" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Desa / Kelurahan </label>
								<div class="col-sm-9">
									<input type="text" id="desa" required name="desa" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Pos </label>
								<div class="col-sm-9">
									<input type="text" id="kode_pos" required name="kode_pos" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. Telp </label>
								<div class="col-sm-6">
									<input type="number" id="telp_mustahik" required name="telp_mustahik" placeholder="No. Telp" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Fax </label>
								<div class="col-sm-6">
									<input type="number" id="fax_mustahik" required name="fax_mustahik" placeholder="FAX" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Hanphone </label>
								<div class="col-sm-6">
									<input type="number" id="hp_mustahik" required name="hp_mustahik" placeholder="Handphone" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> E-mail </label>
								<div class="col-sm-6">
									<input type="email" id="email" required name="email" placeholder="E-mail" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Website </label>
								<div class="col-sm-6">
									<input type="text" id="website" required name="website" placeholder="website" class="form-control" />
								</div>
							</div>
							<!-- 
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Level </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="level" id="level">
                                        <option value="">-- Pilih Program --</option>
                                        <option value="operator">Operator</option>
                                        <option value="kasir">Kasir</option>
                                        <option value="akunting">Akunting</option>
                                    </select>
                                </div>
                            </div> -->
							<!-- 
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Foto </label>
                                <div class="col-sm-9">
                                    <input type="file" id="file" required name="file" placeholder="" class="form-control" />
                                </div>
                            </div> -->

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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NIK </label>
								<div class="col-sm-6">
									<input type="hidden" id="e_id" required name="e_id" />
									<input type="text" id="e_npwp" required name="e_npwp" placeholder="NPWP" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>
								<div class="col-sm-9">
									<input type="text" id="e_nama" required name="e_nama" placeholder="Nama Karyawan" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tipe Identitas </label>
								<div class="col-sm-9">
									<select class="form-control" name="e_tipe_identitas" id="e_tipe_identitas">
										<option value="0">-- TIPE --</option>
										<option value="1">KTP</option>
										<option value="2">PASPOR</option>
										<?php //foreach ($myjabatan as $value) { 
										?>
										<!-- <option value=<?= $value['ID'] ?>><?= $value['NAMAJABATAN'] ?></option> -->
										<?php //} 
										?>
									</select>
								</div>
							</div>

							<!-- <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jabatan </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="jabatan" id="jabatan">
                                        <option value="0">-- Status --</option>
                                        <?php foreach ($myjabatan as $value) { ?>
                                            <option value=<?= $value['ID'] ?>><?= $value['NAMAJABATAN'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div> -->

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. Identitas </label>
								<div class="col-sm-9">
									<input type="text" id="e_idn" required name="e_idn" placeholder="No. Identitas" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kewarganegaraan </label>
								<div class="col-sm-9">
									<input type="text" id="e_warganegara" required name="e_warganegara" placeholder="No. Identitas" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tempat Lahir </label>
								<div class="col-sm-6">
									<input type="text" id="e_tempat_lahir" required name="e_tempat_lahir" placeholder="Tempat Lahir" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal lahir </label>
								<div class="col-sm-6">
									<input type="date" id="e_tanggal" required name="e_tanggal" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Kelamin </label>
								<div class="col-sm-9">
									<select class="form-control" name="e_jk" id="e_jk">
										<option value="">-- Pilih Kelamin --</option>
										<option value="1">Laki - Laki</option>
										<option value="2">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pekerjaan </label>
								<div class="col-sm-9">
									<select class="form-control" name="e_kerja" id="e_kerja">
										<option value="">-- Pilih Pekerjaan --</option>
										<option value="1">Pegawai Negri Sipil</option>
										<option value="2"></option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status Pernikahan </label>
								<div class="col-sm-9">
									<select class="form-control" name="e_status" id="e_status">
										<option value="">-- Pilih Status --</option>
										<option value="1">Lajang</option>
										<option value="2">Menikah</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status Pendidikan </label>
								<div class="col-sm-9">
									<select class="form-control" name="e_pendidikan" id="e_pendidikan">
										<option value="">-- Pilih Pendidikan --</option>
										<option value="1">SD</option>
										<option value="2">SMP</option>
										<option value="3">SMK</option>
										<option value="4">D3</option>
										<option value="6">S1</option>

									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat </label>
								<div class="col-sm-9">
									<input type="text" id="e_alamat" required name="e_alamat" placeholder="Alamat" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Provinsi </label>
								<div class="col-sm-9">
									<select class="form-control" name="e_provinsi" id="e_provinsi">
										<option value="">-- Pilih Pendidikan --</option>
										<option value="1">JABAR</option>
										<option value="2">JATENG</option>
										<option value="3">JATIM</option>
										<option value="4">BANTEN</option>
										<option value="6">JAKARTA</option>

									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kabupaten / Kota </label>
								<div class="col-sm-9">
									<input type="text" id="e_kab_kot" required name="e_kab_kot" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kecamatan </label>
								<div class="col-sm-9">
									<input type="text" id="e_kec" required name="e_kec" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Desa / Kelurahan </label>
								<div class="col-sm-9">
									<input type="text" id="e_desa" required name="e_desa" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Pos </label>
								<div class="col-sm-9">
									<input type="text" id="e_kode_pos" required name="e_kode_pos" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Staus Rumah </label>
								<div class="col-sm-9">
									<select class="form-control" name="e_rumah" id="e_rumah">
										<option value="">-- Pilih Status Rumah --</option>
										<option value="1">Milik Sendiri</option>
										<option value="2">.....</option>
										<option value="3">....</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. Telp </label>
								<div class="col-sm-6">
									<input type="number" id="e_telp_muzakki" required name="e_telp_mizakki" placeholder="No. Telp" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Fax </label>
								<div class="col-sm-6">
									<input type="number" id="e_fax_muzakki" required name="e_fax_muzakki" placeholder="FAX" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Hanphone </label>
								<div class="col-sm-6">
									<input type="number" id="e_hp_muzakki" required name="e_hp_muzakki" placeholder="Handphone" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> E-mail </label>
								<div class="col-sm-6">
									<input type="email" id="e_email" required name="e_email" placeholder="E-mail" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Website </label>
								<div class="col-sm-6">
									<input type="text" id="e_website" required name="e_website" placeholder="website" class="form-control" />
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
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('karyawan/update') ?>",
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
					url: "<?php echo base_url('karyawan/delete') ?>",
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
						'<td>' + data[i].jenis_mustahik + '</td>' +
						'<td>' + data[i].kategori_mustahik + '</td>' +
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
</script>
