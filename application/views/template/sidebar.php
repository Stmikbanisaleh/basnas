<script type="text/javascript">
	try {
		ace.settings.loadState('sidebar')
	} catch (e) {}
</script>

<div class="sidebar-shortcuts" id="sidebar-shortcuts">

</div><!-- /.sidebar-shortcuts -->
<?php
$jabatan = $this->session->userdata('jabatan');
if ($jabatan == 5) { ?>
	<ul class="nav nav-list">
		<li class="">
			<a href="<?= base_url(); ?>dashboard">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Dashboard </span>
			</a>
			<b class="arrow"></b>
		</li>
		<!-- Menu Selain PSB -->
		<li class="">
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="menu-icon glyphicon glyphicon-cog"></i>
				<span class="menu-text">
					Master
				</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?= base_url() . 'akun'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Akun
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'jenisusaha'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Jenis Bantuan
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'kat_mustahik'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Kategori Mustahik
					</a>
				</li>
				<li class="">
					<a href="<?= base_url() . 'zakat'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Kategori Zakat
					</a>
				</li>
				<li class="">
					<a href="<?= base_url() . 'kepemilikan'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Kepemilikan
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'jeniszakat'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Jenis Zakat
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'pekerjaan'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Pekerjaan
					</a>
				</li>
				<li class="">
					<a href="<?= base_url() . 'pendidikan'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Pendidikan
					</a>
				</li>
				<li class="">
					<a href="<?= base_url() . 'jabatan'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master jabatan
					</a>
				</li>
				<li class="">
					<a href="<?= base_url() . 'program'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Program
					</a>
				</li>
				<li class="">
					<a href="<?= base_url() . 'sub_program'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Sub Program
					</a>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="menu-icon glyphicon glyphicon-user"></i>
				<span class="menu-text">
					Administrasi
				</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?= base_url() . 'muzakki'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Muzakki
					</a>
				</li>
				<li class="">
					<a href="<?= base_url() . 'mustahik'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Mustahik
					</a>
				</li>

			</ul>
		</li>

		<li class="">
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="menu-icon fa fa-download"></i>
				<span class="menu-text">
					Transaksi Masuk
				</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?= base_url() . 'zakatfitrah'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Zakat Fitrah
					</a>
				</li>
				<li class="">
					<a href="<?= base_url() . 'zakatmal'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Zakat Mal
					</a>
				</li>
				<li class="">
					<a href="<?= base_url() . 'infaq'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Infaq
					</a>
				</li>
			</ul>
		</li>
		<li class="">
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="menu-icon glyphicon glyphicon-upload"></i>
				<span class="menu-text">
					Transaksi Keluar
				</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?= base_url() . 'penyaluranlangsung'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Penyaluran Langsung
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?= base_url() . 'penyaluranprogram'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Penyaluran Program
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li class="">
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="menu-icon glyphicon glyphicon-pencil"></i>
				<span class="menu-text">
					Laporan
				</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?= base_url() . 'lap_penerimaan'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Laporan Penerimaan
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'rek_koran'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Rekening Koran
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'laporan_penyaluran'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Laporan Penyaluran
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'rr_penerimaan'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Rencana dan Realisasi Penerimaan
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'rr_penyaluran_asnaf'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Rencana dan Realisasi Penyaluran Asnaf
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'rr_penyaluran_program'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Rencana dan Realisasi Penyaluran Program
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'rr_penggalangan_muzaki_penerimaan_manfaat'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Rencana dan Realisasi Penggalangan Muzaki dan Penerimaan Manfaat
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'rr_penerimaan_dan_penggunaan_hak_amil'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Rencana dan Realisasi Penerimaan dan Penggunaan Hak Amil
					</a>
				</li>

				<!-- <li class="">
					<a href="<?= base_url() . 'rr_biaya_operasional_fungsi'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Rencana dan Realisasi Biaya Operasional Berdasarkan Fungsi
					</a>
				</li> -->

				<!-- <li class="">
					<a href="<?= base_url() . 'rr_penggunaan_dana_apbn_apbd'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Rencana dan Realisasi Penggunaan Dana APBN/APBD
					</a>
				</li> -->

				<!-- <li class="">
					<a href="<?= base_url() . 'rr_pengumpulan_dan_penyaluran_ramadhan'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Rencana dan Realisasi Pengumpulan dan Penyaluran Ramadhan
					</a>
				</li> -->

				<li class="">
					<a href="<?= base_url() . 'rr_penerimaan_manfaat_asnaf'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Rencana dan Realisasi Penerima Manfaat per Asnaf
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'pp_zakat_kabupaten_kota'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Pelaksanaan Pengelolaan Zakat Kabupaten / Kota
					</a>
				</li>
			</ul>
		</li>
		<li class="">
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="menu-icon glyphicon glyphicon-check"></i>
				<span class="menu-text">
					Approval
				</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?= base_url() . 'approval'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Approval Penyaluran
					</a>
				</li>
			</ul>
		</li>
	<?php } elseif ($jabatan == 4) { ?>
		<ul class="nav nav-list">
			<li class="">
				<a href="<?= base_url(); ?>dashboard">
					<i class="menu-icon fa fa-tachometer"></i>
					<span class="menu-text"> Dashboard </span>
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="javascript:void(0);" class="dropdown-toggle">
					<i class="menu-icon fa fa-download"></i>
					<span class="menu-text">
						Transaksi Masuk
					</span>
					<b class="arrow fa fa-angle-down"></b>
				</a>
				<b class="arrow"></b>
				<ul class="submenu">
					<li class="">
						<a href="<?= base_url() . 'zakatfitrah'; ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Zakat Fitrah
						</a>
					</li>
					<li class="">
						<a href="<?= base_url() . 'zakatmal'; ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Zakat Mal
						</a>
					</li>
					<li class="">
						<a href="<?= base_url() . 'infaq'; ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Infaq
						</a>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="javascript:void(0);" class="dropdown-toggle">
					<i class="menu-icon glyphicon glyphicon-upload"></i>
					<span class="menu-text">
						Transaksi Keluar
					</span>
					<b class="arrow fa fa-angle-down"></b>
				</a>
				<b class="arrow"></b>
				<ul class="submenu">
					<li class="">
						<a href="<?= base_url() . 'penyaluranlangsung'; ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Penyaluran Langsung
						</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?= base_url() . 'penyaluranprogram'; ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Penyaluran Program
						</a>
						<b class="arrow"></b>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="javascript:void(0);" class="dropdown-toggle">
					<i class="menu-icon glyphicon glyphicon-pencil"></i>
					<span class="menu-text">
						Laporan
					</span>
					<b class="arrow fa fa-angle-down"></b>
				</a>
				<b class="arrow"></b>
				<ul class="submenu">
					<li class="">
						<a href="<?= base_url() . 'lap_penerimaan'; ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Laporan Penerimaan
						</a>
					</li>

					<li class="">
						<a href="<?= base_url() . 'rek_koran'; ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Rekening Koran
						</a>
					</li>

					<li class="">
						<a href="<?= base_url() . 'laporan_penyaluran'; ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Laporan Penyaluran
						</a>
					</li>

					<li class="">
						<a href="<?= base_url() . 'laporan_penyaluran'; ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Rencana dan Realisasi Penerimaan
						</a>
					</li>

					<li class="">
						<a href="<?= base_url() . 'laporan_penyaluran'; ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Rencana dan Realisasi Penyaluran Asnaf
						</a>
					</li>

					<li class="">
						<a href="<?= base_url() . 'laporan_penyaluran'; ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Rencana dan Realisasi Penyaluran Program
						</a>
					</li>

					<li class="">
						<a href="<?= base_url() . 'laporan_penyaluran'; ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Rencana dan Realisasi Penggalangan Muzaki dan Penerimaan Manfaat
						</a>
					</li>

					<li class="">
						<a href="<?= base_url() . 'laporan_penyaluran'; ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Rencana dan Realisasi Penerimaan dan Penggunaan Hak Amil
						</a>
					</li>

					<!-- <li class="">
						<a href="<?= base_url() . 'laporan_penyaluran'; ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Rencana dan Realisasi Biaya Operasional Berdasarkan Fungsi
						</a>
					</li> -->

					<!-- <li class="">
						<a href="<?= base_url() . 'laporan_penyaluran'; ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Rencana dan Realisasi Penggunaan Dana APBN/APBD
						</a>
					</li> -->

					<!-- <li class="">
						<a href="<?= base_url() . 'laporan_penyaluran'; ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Rencana dan Realisasi Pengumpulan dan Penyaluran Ramadhan
						</a>
					</li> -->

					<li class="">
						<a href="<?= base_url() . 'laporan_penyaluran'; ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Rencana dan Realisasi Penerima Manfaat per Asnaf
						</a>
					</li>

					<li class="">
						<a href="<?= base_url() . 'laporan_penyaluran'; ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Pelaksanaan Pengelolaan Zakat Kabupaten / Kota
						</a>
					</li>
				</ul>
			</li>
		</ul>
	<?php } elseif ($jabatan == 3) { ?>
		<ul class="nav nav-list">
			<li class="">
				<a href="<?= base_url(); ?>dashboard">
					<i class="menu-icon fa fa-tachometer"></i>
					<span class="menu-text"> Dashboard </span>
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="javascript:void(0);" class="dropdown-toggle">
					<i class="menu-icon glyphicon glyphicon-check"></i>
					<span class="menu-text">
						Approval
					</span>
					<b class="arrow fa fa-angle-down"></b>
				</a>
				<b class="arrow"></b>
				<ul class="submenu">
					<li class="">
						<a href="<?= base_url() . 'approval'; ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							Approval Penyaluran
						</a>
					</li>
				</ul>
			</li>
		<?php } elseif ($jabatan == 2) { ?>
			<ul class="nav nav-list">
				<li class="">
					<a href="javascript:void(0);" class="dropdown-toggle">
						<i class="menu-icon glyphicon glyphicon-check"></i>
						<span class="menu-text">
							Approval
						</span>
						<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>
					<ul class="submenu">
						<li class="">
							<a href="<?= base_url() . 'approval'; ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								Approval Penyaluran
							</a>
						</li>
					</ul>
				</li>
			<?php } elseif ($jabatan == 1) { ?>
				<ul class="nav nav-list">
					<li class="">
						<a href="<?= base_url(); ?>dashboard">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
						<b class="arrow"></b>
					</li>
				<?php } else {
				echo "#";
			} ?>
				<!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>