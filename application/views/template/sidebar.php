<script type="text/javascript">
	try {
		ace.settings.loadState('sidebar')
	} catch (e) {}
</script>

<div class="sidebar-shortcuts" id="sidebar-shortcuts">

</div><!-- /.sidebar-shortcuts -->
<?php
$jabatan = $this->session->userdata('jabatan');
if ($jabatan == 19) { ?>
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
				<i class="menu-icon glyphicon glyphicon-user"></i>
				<span class="menu-text">
					Penerimaan Siswa Baru
				</span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?= base_url() . 'pengambilanformulir'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Pengambilan Formulir
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'pengembalianformulir'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Pengembalian Formulir
					</a>
				</li>

				<li class="">
					<a href="<?= base_url() . 'impbayar'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Import Pembayaran Formulir
					</a>
				</li>
			</ul>
		</li>
	</ul>
<?php } else { ?>
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
					<a href="<?= base_url() . 'muzakki'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Jenis Usaha
					</a>
				</li>
				<li class="">
					<a href="<?= base_url() . 'muzakki'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Pekerjaan
					</a>
				</li>
				<li class="">
					<a href="<?= base_url() . 'mustahik'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Kategori Mustahik
					</a>
				</li>
				<li class="">
					<a href="<?= base_url() . 'zakat'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Kepemilikan
					</a>
				</li>
				<li class="">
					<a href="<?= base_url() . 'zakat'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Pendidikan
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
				<li class="">
					<a href="<?= base_url() . 'zakat'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Kategori Zakat
					</a>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="menu-icon fa fa-calendar"></i>
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
				<i class="menu-icon glyphicon glyphicon-user"></i>
				<span class="menu-text">
					Transaksi Keluar
				</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?= base_url() . 'penerimaanzakat'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Transaksi Penerimaan Zakat
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?= base_url() . 'penyaluranlangsung'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Transaksi Penyaluran Langsung
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
					<a href="<?= base_url() . 'penghapusannilai'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Laporan Penyalur
					</a>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="menu-icon fa fa-calendar"></i>
				<span class="menu-text">
					Program
				</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?= base_url() . 'jadwal'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Program
					</a>
				</li>

			</ul>
		</li>
		<li class="">
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="menu-icon fa fa-calendar"></i>
				<span class="menu-text">
					Akun
				</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?= base_url() . 'jadwal'; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Master Account
					</a>
				</li>

			</ul>
		</li>
<?php } ?>
<!-- /.nav-list -->

<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
	<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>
