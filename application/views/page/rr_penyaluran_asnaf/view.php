<div class="row">
	<form class="form-horizontal" method="POST" id="formSearch" action="<?php echo base_url() ?>rr_penyaluran_asnaf/laporan" target="_blank">

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
        <!-- <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tipe </label>
            <div class="col-sm-3">
                <select class="form-control" required name="is_approve">
                    <option value="0">--Pilih Tipe--</option>
                    <?php
                        foreach($mytype as $row){
                    ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['nama']?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
        </div> -->
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