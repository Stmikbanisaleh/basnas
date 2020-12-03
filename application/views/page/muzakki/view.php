<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<div class="row">
	<form class="form-horizontal" role="form" id="formSearch">
		Kriteria Pencarian Muzakki
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Muzakki </label>
			<div class="col-sm-6">
				<select class="form-control" name="kat_muzakki" id="kat_muzakki">
					<option value="">-- Pilih Muzakki --</option>
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
</div>
<br>
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
									<a href="<?php echo base_url() . 'muzakki/downloadsample' ?>" class="col-sm-3" for="form-field-1"> Download Sample Format</a>
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

<div id="my-modal" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Input Data Muzakki</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" enctype="multipart/form-data" role="form" id="formTambah">
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Registrasi </label>
								<div class="col-sm-6">
									<input type="date" id="tanggal" required name="tanggal" class="form-control" />
								</div>
							</div>


							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>
								<div class="col-sm-9">
									<input type="text" id="nama" required name="nama" placeholder="Nama Muzakki" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NPWP </label>
								<div class="col-sm-6">
									<input type="text" id="npwp" required name="npwp" placeholder="NPWP" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tipe Identitas </label>
								<div class="col-sm-9">
									<select class="form-control" name="tipe_identitas" id="tipe_identitas">
										<option value="0">-- TIPE --</option>
										<option value="KTP">KTP</option>
										<option value="PASPORT">PASPORT</option>
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
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Foto </label>
                                <div class="col-sm-9">
                                    <input type="file" id="file" required name="file" placeholder="" class="form-control" />
                                </div>
                            </div> 
							<div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Proposal </label>
                                <div class="col-sm-9">
                                    <input type="file" id="proposal" name="proposal" placeholder="" class="form-control" />
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Muzaki </label>
								<div class="col-sm-9">
									<select class="form-control" name="jenis_m" id="jenis_m">
										<option value="0">-- Pilih --</option>
										<option value="Individu">Individu</option>
										<option value="Lembaga">Lembaga</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pekerjaan </label>
								<div class="col-sm-9">
									<select class="form-control" name="kerja" id="kerja">
										<option value="">--Pilih--</option>
										<?php foreach ($mypekerjaan as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status Pernikahan </label>
								<div class="col-sm-9">
									<select class="form-control" name="status" id="status">
										<option value="">-- Pilih Status --</option>
										<option value="1">Lajang</option>
										<option value="2">Menikah</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status Pendidikan </label>
								<div class="col-sm-9">
									<select class="form-control" name="pendidikan" id="pendidikan">
										<option value="">--Pilih--</option>
										<?php foreach ($mypendidikan as $value) { ?>
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Staus Rumah </label>
								<div class="col-sm-9">
									<select class="form-control" name="kepemilikan" id="kepemilikan">
										<option value="">--Pilih--</option>
										<?php foreach ($mykepemilikan as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. Telp </label>
								<div class="col-sm-6">
									<input type="number" id="telp_muzakki" required name="telp_mizakki" placeholder="No. Telp" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Fax </label>
								<div class="col-sm-6">
									<input type="number" id="fax_muzakki" required name="fax_muzakki" placeholder="FAX" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Hanphone </label>
								<div class="col-sm-6">
									<input type="number" id="hp_muzakki" required name="hp_muzakki" placeholder="Handphone" class="form-control" />
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
									<input type="hidden" id="er_id" name="er_id" class="form-control" />
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
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Registrasi </label>
								<div class="col-sm-6">
									<input type="hidden" id="e_id" required name="e_id" class="form-control" />
									<input type="date" id="e_tanggal" required name="e_tanggal" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>
								<div class="col-sm-9">
									<input type="text" id="e_nama" required name="e_nama" placeholder="Nama Muzakki" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NPWP </label>
								<div class="col-sm-6">
									<input type="text" id="e_npwp" required name="e_npwp" placeholder="NPWP" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tipe Identitas </label>
								<div class="col-sm-9">
									<select class="form-control" name="e_tipe_identitas" id="e_tipe_identitas">
										<option value="0">-- Pilih --</option>
										<option value="KTP">KTP</option>
										<option value="PASPORT">PASPORT</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. Identitas </label>
								<div class="col-sm-9">
									<input type="text" id="e_idn" required name="e_idn" placeholder="No. Identitas" class="form-control" />
								</div>
							</div>
							<div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Foto </label>
                                <div class="col-sm-9">
                                    <input type="file" id="e_file" required name="e_file" placeholder="" class="form-control" />
                                </div>
                            </div> 
							<div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Proposal </label>
                                <div class="col-sm-9">
                                    <input type="file" id="e_proposal" required name="e_proposal" placeholder="" class="form-control" />
                                </div>
                            </div> 
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kewarganegaraan </label>
								<div class="col-sm-9">
									<select class="form-control" name="e_warganegara" id="e_warganegara">
										<option value="">-- Pilih --</option>
										<option value="WNA">WNA</option>
										<option value="WNI">WNI</option>
									</select>
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
									<input type="date" id="e_tgl_lhr" required name="e_tgl_lhr" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Kelamin </label>
								<div class="col-sm-9">
									<select class="form-control" name="e_jk" id="e_jk">
										<option value="">-- Pilih Kelamin --</option>
										<option value="L">Laki - Laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Muzaki </label>
								<div class="col-sm-9">
									<select class="form-control" name="e_jenis_m" id="e_jenis_m">
										<option value="0">-- Pilih --</option>
										<option value="Individu">Individu</option>
										<option value="Lembaga">Lembaga</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pekerjaan </label>
								<div class="col-sm-9">
									<select class="form-control" name="e_kerja" id="e_kerja">
										<option value="">--Pilih--</option>
										<?php foreach ($mypekerjaan as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php }
										?>
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
										<option value="">--Pilih--</option>
										<?php foreach ($mypendidikan as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php }
										?>
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
									<select class="form-control" name="e_kepemilikan" id="e_kepemilikan">
										<option value="">--Pilih--</option>
										<?php foreach ($mykepemilikan as $value) { ?>
											<option value=<?= $value['id'] ?>><?= $value['nama'] ?></option>
										<?php }
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. Telp </label>
								<div class="col-sm-6">
									<input type="number" id="e_telp_mizakki" required name="e_telp_mizakki" placeholder="No. Telp" class="form-control" />
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
			Semua Data Muzakki
		</div>
	</div>
</div>
<div class="table-responsive">
	<table id="datatable_tabletools" class="display">
		<thead>
			<tr>
				<th>No</th>
				<th>NPWP</th>
				<th>Tanggal Registrasi</th>
				<th>Jenis Muzaki</th>
				<th>Nama Muzaki</th>
				<th>Foto</th>
				<th>Alamat</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="show_data">
		</tbody>
	</table>
</div>
<script type="text/javascript">
	// $('select').select2({
	// 	width: '100%',
	// 	placeholder: "Pilih",
	// 	allowClear: true
	// });
	$('#tipe_identitas').select2({
		width: '100%',
		placeholder: "Pilih",
		allowClear: true
	});

	$('#warganegara').select2({
		width: '100%',
		placeholder: "Pilih",
		allowClear: true
	});
	
	$('#jk').select2({
		width: '100%',
		placeholder: "Pilih",
		allowClear: true
	});

	$('#jenis_m').select2({
		width: '100%',
		placeholder: "Pilih",
		allowClear: true
	});
	
	$('#jenis_m').select2({
		width: '100%',
		placeholder: "Pilih",
		allowClear: true
	});

	$('#kerja').select2({
		width: '100%',
		placeholder: "Pilih",
		allowClear: true
	});

	$('#pendidikan').select2({
		width: '100%',
		placeholder: "Pilih",
		allowClear: true
	});

	$('#provinsi').select2({
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
					url: "<?php echo base_url('muzakki/import') ?>",
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

	if ($("#formTambah").length > 0) {
		$("#formTambah").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				file: {
					required: false,
				},
				tempat_lahir: {
					required: false,
				},
				tgl_lhr: {
					required: false,
				},
				kode_pos: {
					required: false,
				},
				fax_muzakki: {
					required: false,
				},
				telp_mizakki: {
					required: false,
				},
				hp_muzakki: {
					required: false,
				},
				email: {
					required: false,
				},
				website: {
					required: false,
				},
				proposal: {
					required: false,
				},
			},
			submitHandler: function(form) {
				formdata = new FormData(form);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('muzakki/simpan') ?>",
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
			rules: {
				e_file: {
					required: false,
				},
				e_tempat_lahir: {
					required: false,
				},
				e_tgl_lhr: {
					required: false,
				},
				e_kode_pos: {
					required: false,
				},
				e_fax_muzakki: {
					required: false,
				},
				e_telp_mizakki: {
					required: false,
				},
				e_hp_muzakki: {
					required: false,
				},
				e_email: {
					required: false,
				},
				e_website: {
					required: false,
				},
				e_porposal: {
					required: false,
				},
			},
			submitHandler: function(form) {
				formdata = new FormData(form);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('muzakki/update') ?>",
					processData: false,
					contentType: false,
					cache: false,
					async: false,
					data: formdata,
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
					url: "<?php echo base_url('muzakki/delete') ?>",
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
				$('#er_id').val(data[0].id_muzakki);
				$('#nama3').val(data[0].nama);
				$('#alamat3').val(data[0].alamat);
				$('#no_kartu').val(data[0].nokartu);
				$('#nama_bank').val(data[0].namabank);

			}
		});
	});

	$('#show_data').on('click', '.item_edit', function() {
		var id = $(this).data('id');
		$('#modalEdit').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('muzakki/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_tanggal').val(data[0].tgl_reg);
				$('#e_nama').val(data[0].nama);
				$('#e_npwp').val(data[0].npwp);
				$('#e_tipe_identitas').val(data[0].tipe_identitas);
				$('#e_idn').val(data[0].no_identitas);
				$('#e_warganegara').val(data[0].kewarganegaraan);
				$('#e_tempat_lahir').val(data[0].tmp_lhr);
				$('#e_tgl_lhr').val(data[0].tgl_lhr);
				$('#e_jk').val(data[0].jenis_kelamin);
				$('#e_jenis_m').val(data[0].jenis_muzakki);
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
				$('#e_telp_mizakki').val(data[0].telp);
				$('#e_fax_muzakki').val(data[0].fax);
				$('#e_hp_muzakki').val(data[0].handphone);
				$('#e_email').val(data[0].email);
				$('#e_website').val(data[0].website);
			}
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
					url: '<?php echo site_url('muzakki/search') ?>',
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
								'<td>' + data[i].npwp + '</td>' +
								'<td>' + data[i].createdAt + '</td>' +
								'<td>' + data[i].jenis_muzakki + '</td>' +
								'<td>' + data[i].nama + '</td>' +
								'<td>' + data[i].alamat + '</td>' +
								'<td class="text-center">' +
								'<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].id + '">' +
								'<i class="ace-icon fa fa-pencil bigger-120"></i>' +
								'</button> &nbsp' +
								'<button  href="#my-modal-rekening" class="btn btn-xs btn-success item_rekening" title="Rekening" data-id="' + data[i].id + '">' +
								'<i class="ace-icon fa fa-book bigger-120"></i>' +
								'</button> &nbsp' +
								'<button class="btn btn-xs btn-danger alt="Hapus" item_hapus" title="Delete" data-id="' + data[i].id + '">' +
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

	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('muzakki/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-center">' + no + '</td>' +
						'<td>' + data[i].npwp + '</td>' +
						'<td>' + data[i].createdAt + '</td>' +
						'<td>' + data[i].jenis_muzakki + '</td>' +
						'<td>' + data[i].nama + '</td>' +
						'<td ><a href="<?php echo site_url('/assets/image/muzakki/') ?>'+data[i].foto+'"> <img style="width:80px; height: 60px;" src="<?php echo site_url('/assets/image/muzakki/') ?>'+data[i].foto+'""></a></td>' +
						'<td>' + data[i].alamat + '</td>' +
						'<td class="text-center">' +
						'<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-pencil bigger-120"></i>' +
						'</button> &nbsp' +
						'<button  href="#my-modal-rekening" class="btn btn-xs btn-success item_rekening" title="Rekening" data-id="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-book bigger-120"></i>' +
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
