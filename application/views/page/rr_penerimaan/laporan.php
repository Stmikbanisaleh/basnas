<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<?php
header("Content-type:application/x-msdownload");
header("content-disposition:attactment;filename=laporan_honor_reguler.xls");
header("pragma:no-cache");
header("Expires:0");
?>
<body>
<div>
    <center><font size="4"><b>BAZNAS KOTA BEKASI</b><font></center>
    <center><font size="3">Rencana & Realisasi Penerimaan<font></center>
    <center><font size="3">Periode <?= $tgl_awal ?> s/d <?= $tgl_akhir ?><font></center>
</div>
<br><br>
<table style="width:100%">
    <tr>
        <th style="width: 5%;">No</th>
        <th style="width: 45%;">Keterangan</th> 
        <th style="width: 15%;">Rencana (Rp)</th> 
        <th style="width: 15%;">Realisasi (Rp) </th> 
        <th style="width: 15%;">Capaian (%) </th>
    </tr>
<?php
    $no=1;
    foreach($myprogram as $row){
?>
    <tr>
        <td style="padding-left: 10px;"><?= '1.'.$no ?></td>
        <td><?= $row['nama'] ?></td> 
        <td></td> 
        <td><?= $row['jumlah_dana']?></td>
        <td></td> 
    </tr>
<?php

        $mysubprogram = $this->model_rr_penerimaan->view_sub_program($post_tgl_awal, $post_tgl_akhir, $row['id'])->result_array();
        $no_sub = 1;
        foreach($mysubprogram as $row){
        ?>
        <tr>
            <td style="padding-left: 20px;"><?= '1.'.$no.'.'.$no_sub ?></td>
            <td><?= $row['deskripsi'] ?></td> 
            <td></td> 
            <td><?= $row['jumlah_dana']?></td>
            <td></td> 
        </tr>

        <?php
        $no_sub++;
        }
    $no++;
    }
?>
</table>

</body>
</html>