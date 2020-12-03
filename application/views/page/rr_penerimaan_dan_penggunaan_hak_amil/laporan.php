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
header("content-disposition:attactment;filename=Laporan penerimaan dan penggunaan hak amil ".$post_tgl_awal." sd ".$post_tgl_akhir.".xls");
header("pragma:no-cache");
header("Expires:0");
?>
<body>
<div>
    <center><font size="4"><b>BAZNAS KOTA BEKASI</b><font></center>
    <center><font size="3">Rencana & Realisasi Penerimaan dan Penggunaan Hak Amil<font></center>
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
    foreach($mytotal_penerimaan as $rows){
    ?>
        <tr>
            <td style="padding-left: 10px;"><b><?= '1'?><b></td>
            <td><b>Penerimaan Hak Amil<b></td> 
            <td></td> 
            <td><b><?= $rows['jumlah_dana']?><b></td>
            <td></td> 
        </tr>
    <?php
        $no++;
        }
    ?>
<?php
    $no=1;
    foreach($myzakat as $rows){
?>
    <tr>
        <td style="padding-left: 10px;"><?= '1.1'.$no ?></td>
        <td><?= "Penerimaan (alokasi) hak amil dari zakat asnaf amil (maksimal 12,5%)" ?></td> 
        <td></td> 
        <td><b><?= $rows['jumlah_dana']?><b></td>
        <td></td> 
    </tr>
<?php
    $no++;
    }
?>
<?php
    $no=1;
    foreach($myinfaq as $rows){
?>
    <tr>
        <td style="padding-left: 10px;"><?= '1.2'.$no ?></td>
        <td><?= "Penerimaan hak amil dari infaq/sedekah" ?></td> 
        <td></td> 
        <td><b><?= $rows['jumlah_dana']?><b></td>
        <td></td> 
    </tr>
<?php
    $no++;
    }
?>
</table>

</body>
</html>