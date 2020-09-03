<div class="row">
    <form class="form-horizontal" target="_blank" method="POST" role="form" id="formSearch" action="<?php echo base_url() ?>muzakki/laporan">
        Kriteria Pencarian Penerimaan Zakat
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Penerimaan </label>
            <div class="col-sm-6">
                <select class="form-control" name="penerimaan" id="penerimaan">
                    <option value="">-- Pilih Cara --</option>
                    <option value="1">Semua</option>
                    <option value="2">..</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>
            <div class="col-sm-3">
                <input type="text" id="nama" required name="nama" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NPWP </label>
            <div class="col-sm-3">
                <input type="text" id="npwz" required name="npwz" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Muzakki </label>
            <div class="col-sm-6">
                <select class="form-control" name="kat_muzakki" id="kat_muzakki">
                    <option value="">-- Pilih Muzakki --</option>
                    <option value="1">Semua</option>
                    <option value="2">..</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Cara Penerimaan </label>
            <div class="col-sm-6">
                <select class="form-control" name="cara_terima" id="cara_terima">
                    <option value="">-- Pilih Cara --</option>
                    <option value="1">Semua</option>
                    <option value="2">..</option>
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
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat </label>
            <div class="col-sm-6">
                <input type="text" id="alamat" required name="alamat" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kriteria Pencarian </label>
            <div class="col-sm-6">
                <select class="form-control" name="jk" id="jk">
                    <option value="">-- Pilih --</option>
                    <option value="1">Semua</option>
                    <option value="2">..</option>
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
                <h3 class="smaller lighter blue no-margin">Form Input Data Muzakki</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <form class="form-horizontal" enctype="multipart/form-data" role="form" id="formTambah">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Regist </label>
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
                                    <input type="text" id="idn" required name="idn" placeholder="No. Identitas" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kewarganegaraan </label>
                                <div class="col-sm-9">
                                    <input type="text" id="warganegara" required name="warganegara" placeholder="No. Identitas" class="form-control" />
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
                                    <input type="date" id="tanggal" required name="tanggal" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Kelamin </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="jk" id="jk">
                                        <option value="">-- Pilih Kelamin --</option>
                                        <option value="1">Laki - Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pekerjaan </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="kerja" id="kerja">
                                        <option value="">-- Pilih Pekerjaan --</option>
                                        <option value="1">Pegawai Negri Sipil</option>
                                        <option value="2"></option>
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
                                    <input type="text" id="alamat" required name="alamat" placeholder="Alamat" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Provinsi </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="provinsi" id="provinsi">
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
                                    <select class="form-control" name="rumah" id="rumah">
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
                                    <input type="date" id="e_tanggal" required name="e_tanggal" placeholder="" class="form-control" />
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
            Semua Data Penerimaan Zakat
        </div>
    </div>
</div>
<div class="table-responsive">
    <table id="datatable_tabletools" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Username</th>
                <th>Level</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="show_data">
        </tbody>
    </table>
</div>
<script type="text/javascript">
    if ($("#formImport").length > 0) {
        $("#formImport").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            submitHandler: function(form) {
                formdata = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('karyawan/import') ?>",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data) {
                        console.log(data);
                        $('#my-modal2').modal('hide');
                        if (data == 1 || data == true) {
                            document.getElementById("formImport").reset();
                            swalInputSuccess();
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
                    required: "Nama Guru harus diisi!"
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
                    url: "<?php echo base_url('karyawan/simpan') ?>",
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
            url: "<?php echo base_url('karyawan/tampil_byid') ?>",
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
            url: '<?php echo site_url('karyawan/tampil') ?>',
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i = 0;
                var no = 1;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td class="text-center">' + no + '</td>' +
                        '<td>' + data[i].nip + '</td>' +
                        '<td>' + data[i].nama + '</td>' +
                        '<td>' + data[i].nmjabatan + '</td>' +
                        '<td>' + data[i].username + '</td>' +
                        '<td>' + data[i].level + '</td>' +
                        '<td>' + data[i].statusv2 + '</td>' +
                        '<td class="text-center">' +
                        '<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].id_pengawas + '">' +
                        '<i class="ace-icon fa fa-pencil bigger-120"></i>' +
                        '</button> &nbsp' +
                        '<button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="' + data[i].id_pengawas + '">' +
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
