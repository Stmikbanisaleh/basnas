<form target="_blank" method="POST" role="form" id="formreport" action="<?php echo base_url().'/lap_penerimaan/laporan' ?>">
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
        <div class="form-group">
            <label for="exampleInputEmail1">Jenis Penerimaan</label>
            <select class="form-control" required name="jenis_penerimaan" id="blnawal">
                <option value="0">--Pilih Jenis Penerimaan--</option>
                <option value="1">Zakat Fitrah</option>
                <option value="2">Zakat Mall</option>
                <option value="3">Infaq</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">Jenis penerimaan zakat (Boleh tidak diisi).</small>
        </div>
        <button type="submit" id="btn_search" class="btn btn-sm btn-success pull-left">
            <a class="ace-icon fa fa-search bigger-120"></a>Periksa
        </button>
    </div>
</form>
<script>
    if ($("#formreport").length > 0) {
        $("#formreport").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            rules: {
                periode_awal: {
                    required: true,
                },
                periode_akhir: {
                    required: true,
                },
            },
            messages: {
                periode_awal: {
                    required: "Harap isi periode!"
                },
                periode_akhir: {
                    required: "Harap isi periode!"
                },
            },

        });
    }
    </script>