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
    <center><font size="3">Rencana & Realisasi Penerima Manfaat Per Asnaf<font></center>
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
    foreach($mysumasnaf as $rows){
    ?>
        <tr>
            <td style="padding-left: 10px;"><b><?= '1'?><b></td>
            <td><b>Penerima Manfaat Berdasarkan Asnaf<b></td> 
            <td></td> 
            <td><b><?= $rows['jumlah_mustahik']?><b></td>
            <td></td> 
        </tr>
    <?php
        $no++;
        }
    ?>
<?php
    $no=1;
    foreach($myasnaf as $rows){
?>
    <tr>
        <td style="padding-left: 10px;"><?= '1.'.$no ?></td>
        <td><?= $rows['nama'] ?></td> 
        <td></td> 
        <td><?= $rows['jumlah_mustahik']?></td>
        <td></td> 
    </tr>
<?php
    $no++;
    }
?>
</table>

</body>
</html>