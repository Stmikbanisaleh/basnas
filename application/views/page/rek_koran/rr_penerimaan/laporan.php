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
header("content-disposition:attactment;filename=Laporan realisasi penerimaan ".$post_tgl_awal." sd ".$post_tgl_akhir.".xls");
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
    //mysumzakat
    $no=1;
    foreach($mysumzakat as $row){
?>
    <tr>
        <td style="padding-left: 10px;"><b>1.1</b></td>
        <td><b>Penerimaan dana zakat</b></td> 
        <td></td> 
        <td><?= $row['total_terima']?></td>
        <td></td> 
    </tr>
<?php
    $no++;
    }
     //mysumzakat
?>

<?php
    //myzakatmallindividu
    $no=1;
    foreach($myzakatmallindividu as $row){
?>
    <tr>
        <td style="padding-left: 10px;"><b>1.1.1</b></td>
        <td>Penerimaan dana zakat maal perorangan</td> 
        <td></td> 
        <td><?= $row['total_terima']?></td>
        <td></td> 
    </tr>
<?php
    $no++;
    }
     //myzakatmallindividu
?>

<?php
    //myzakatmallbadan
    $no=1;
    foreach($myzakatmallbadan as $row){
?>
    <tr>
        <td style="padding-left: 10px;"><b>1.1.2</b></td>
        <td>Penerimaan dana zakat maal badan</td> 
        <td></td> 
        <td><?= $row['total_terima']?></td>
        <td></td> 
    </tr>
<?php
    $no++;
    }
     //myzakatmallbadan
?>

<?php
    //myzakatmallfitrah
    $no=1;
    foreach($myzakatmallfitrah as $row){
?>
    <tr>
        <td style="padding-left: 10px;"><b>1.1.3</b></td>
        <td>Penerimaan dana zakat Fitrah</td> 
        <td></td> 
        <td><?= $row['total_terima']?></td>
        <td></td> 
    </tr>
<?php
    $no++;
    }
     //myzakatmallfitrah
?>

<?php
    //mysuminfaq
    $no=1;
    foreach($mysuminfaq as $row){
?>
    <tr>
        <td style="padding-left: 10px;"><b>1.2</b></td>
        <td><b>Penerimaan Infaq/Sedekah<b></td> 
        <td></td> 
        <td><?= $row['total_terima']?></td>
        <td></td> 
    </tr>
<?php
    $no++;
    }
     //mysuminfaq
?>

<?php
    //myinfaqindividu
    $no=1;
    foreach($myinfaqindividu as $row){
?>
    <tr>
        <td style="padding-left: 10px;"><b>1.2.1</b></td>
        <td>Penerimaan dana infaq/sedekah tidak terikat</td> 
        <td></td> 
        <td><?= $row['total_terima']?></td>
        <td></td> 
    </tr>
<?php
    $no++;
    }
     //myinfaqindividu
?>

<?php
    //myinfaqbadan
    $no=1;
    foreach($myinfaqbadan as $row){
?>
    <tr>
        <td style="padding-left: 10px;"><b>1.2.1</b></td>
        <td>Penerimaan dana infaq/sedekah terikat</td> 
        <td></td> 
        <td><?= $row['total_terima']?></td>
        <td></td> 
    </tr>
<?php
    $no++;
    }
     //myinfaqbadan
?>
</table>

</body>
</html>