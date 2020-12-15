<div class="row">
	<form class="form-horizontal" method="POST" id="formSearch" action="<?php echo base_url() ?>rr_penggalangan_muzaki_penerimaan_manfaat/laporan" target="_blank">

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Periode Awal </label>
            <div class="col-sm-3">
                <input type="date" required name="periode_awal" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Periode Akhir </label>
            <div class="col-sm-3">
                <input type="date" required name="periode_akhir" class="form-control" />
            </div>
        </div>
		<td>

			<div class="col-xs-6">
				<button type="submit" id="btn_search" class="btn btn-sm btn-success pull-right">
					<a class="ace-icon fa fa-search bigger-120"></a>Periksa
				</button>
			</div>
			<br>
			<br>
	</form>
</div>