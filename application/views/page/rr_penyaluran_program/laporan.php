<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

body {
   width:1000px;
   margin:0 auto;
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
    <tr>
        <td style="text-align: center;">1</td>
        <td style="text-align: center;">2</td> 
        <td style="text-align: center;">3</td> 
        <td style="text-align: center;">4</td>
        <td style="text-align: center;">5=4/3</td> 
    </tr>
<?php
    $no=1;
    $total_penyaluran = 0;
    foreach($myprogram as $rows){
?>
    <tr>
        <td style="padding-left: 0px;"><b><?= '1.'.$no ?><b></td>
        <td><b><?= $rows['nama'] ?><b></td> 
        <td></td> 
        <td><b><?= $rows['jumlah_dana']?><b></td>
        <td></td> 
    </tr>
<?php

        $mysubprogram = $this->model_rr_penyaluran_program->view_sub_program($post_tgl_awal, $post_tgl_akhir, $rows['id'])->result_array();
        $no_sub = 1;
        foreach($mysubprogram as $row){
        ?>
        <tr>
            <td style="padding-left: 10px;"><?= '1.'.$no.'.'.$no_sub ?></td>
            <td><?= $row['deskripsi'] ?></td> 
            <td></td> 
            <td><?= $row['jumlah_dana']?></td>
            <td></td> 
        </tr>

        <?php
        $no_sub++;
        }
    $total_penyaluran = $total_penyaluran+$rows['jumlah_dana'];
    $no++;
    }
?>
    <tr>
        <td style="padding-left: 0px;" colspan="2"><b>TOTAL PENYALURAN<b></td>
        <td></td> 
        <td><b><?= $total_penyaluran?><b></td>
        <td></td> 
    </tr>
</table>

</body>
</html>