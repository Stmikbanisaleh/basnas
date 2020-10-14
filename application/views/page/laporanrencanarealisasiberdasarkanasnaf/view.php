<form method="POST" role="form" action="<?php echo base_url('laporan_laporanrencanarealisasiberdasarkanasnaf/laporanrencanarealisasiberdasarkanasnaf') ?>" id="formreport">
	<div class="col-xs-3">
		<div class="form-group">
			<label for="exampleInputEmail1">Periode Awal</label>
			<input type="date" id="periode_awal" required name="periode_awal" placeholder="Periode Awal" class="form-control" />
			<small id="emailHelp" class="form-text text-muted">Tanggal awal laporan.</small>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Periode Akhir</label>
			<input type="date" id="periode_akhir" required name="periode_akhir" placeholder="Periode Akhir" class="form-control" />
			<small id="emailHelp" class="form-text text-muted">Tanggal akhir laporan.</small>
		</div>
		<button type="submit" id="btn_search" class="btn btn-sm btn-success pull-left">
			<a class="ace-icon fa fa-search bigger-120"></a>Periksa
		</button>
	</div>
</form>
