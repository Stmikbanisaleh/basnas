<style>
    .page {
        width: 50mm;
        margin: 1mm;
    }

    .text-center {
        text-align: center;
    }

    .font-size07 {
        font-size: 0.7em;
    }

    .font-size2{
        font-size: 2em;
    }

    .margin-5 {
        margin: 5px;
    }
</style>

<div class="page">
    <div class="text-center font-size07">
        <b>BAZNAS KOTA BEKASI</b>
    </div>
    <div class="text-center font-size07">
        Jl. Jend. Ahmad Yani Blok B No.11 Kayuringin Jaya (021) 8896 4877
    </div>
    <hr>
    <div class="font-size07">
        <?php echo date("Y-m-d H:i:s") ?>
    </div>
    <hr>
    <div class="font-size07">
        No Antrian Baznas:
    </div>
    <div class="text-center font-size2 margin-5">
        <b><?= $id ?></b>
    </div>
    <hr>
    <div class="text-center font-size07">
        "<?= $subprogram ?>"
    </div>
    <div class="text-center font-size07 margin-5">
        <b>Terimakasih atas kunjungannya :) </b>
    </div>
</div>
