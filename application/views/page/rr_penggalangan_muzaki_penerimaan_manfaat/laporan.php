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
// header("Content-type:application/x-msdownload");
// header("content-disposition:attactment;filename=laporan_honor_reguler.xls");
// header("pragma:no-cache");
// header("Expires:0");
?>
<body>
<div>
    <center><font size="4"><b>BAZNAS KOTA BEKASI</b><font></center>
    <center><font size="3">Rencana & Realisasi Penggalangan Muzaki dan Penerima Manfaat<font></center>
    <center><font size="3">Periode <?= $tgl_awal ?> s/d <?= $tgl_akhir ?><font></center>
</div>
<br><br>
<table style="width:100%">
    <tr>
        <th style="width: 5%;" rowspan="2">No</th>
        <th style="width: 35%;" rowspan="2">Keterangan</th> 
        <th style="width: 30%;" colspan="3">Orang</th> 
        <th style="width: 30%;" colspan="3">Badan</th> 
    </tr>
    <tr>
        <th style="width: 10%;">Rencana (Rp)</th> 
        <th style="width: 10%;">Realisasi (Rp) </th> 
        <th style="width: 10%;">Capaian (%) </th>
        <th style="width: 10%;">Rencana (Rp)</th> 
        <th style="width: 10%;">Realisasi (Rp) </th> 
        <th style="width: 10%;">Capaian (%) </th>
    </tr>
    <?php
    //====================== Start No 1 ========================//
        foreach($mysummuzaki as $rows){
    ?>
    <tr>
        <td style="padding-left: 0px;"><b>1<b></td>
        <td><b>Penggalangan Muzaki<b></td> 
        <td></td> 
        <td><b><?= $rows['nominal_individu']?><b></td>
        <td></td> 
        <td></td> 
        <td><b><?= $rows['nominal_lembaga']?><b></td>
        <td></td> 
        
    </tr>
    <?php
        }
    ?>
<?php
    $no=1;
    $total_penyaluran = 0;
    foreach($mymuzaki as $rows){
?>
    <tr>
        <td style="padding-left: 0px;"><?= '1.'.$no ?></td>
        <td><?= $rows['column_a'] ?></td> 
        <td></td> 
        <td><b><?= $rows['nominal_individu']?><b></td>
        <td></td> 
        <td></td> 
        <td><b><?= $rows['nominal_lembaga']?><b></td>
        <td></td> 
    </tr>
<?php
    $no++;
    }
    //====================== End No 1 ========================//
    //====================== Start No 2 ========================//
    foreach($mysumbidang as $rows){
    ?>
    <tr>
        <td style="padding-left: 0px;"><b>2<b></td>
        <td><b>Penerima Manfaat Berdasarkan Bidang<b></td> 
        <td></td> 
        <td><b><?= $rows['jml_mustahik_individu']?><b></td>
        <td></td> 
        <td></td> 
        <td><b><?= $rows['jml_mustahik_lembaga']?><b></td>
        <td></td> 
        
    </tr>
    <?php
        }
        $no=1;
        $total_penyaluran = 0;
        foreach($mybidang as $rows){
    ?>
        <tr>
            <td style="padding-left: 0px;"><?= '2.'.$no ?></td>
            <td><?= "Penerima Manfaat Bidang".$rows['bidang'] ?></td> 
            <td></td> 
            <td><b><?= $rows['jml_mustahik_individu']?><b></td>
            <td></td> 
            <td></td> 
            <td><b><?= $rows['jml_mustahik_individu']?><b></td>
            <td></td> 
        </tr>
    <?php
        $no++;
        }
        //====================== End No 2 ========================//
    ?>
    <!-- <tr>
        <td style="padding-left: 0px;" colspan="2"><b>TOTAL PENYALURAN<b></td>
        <td></td> 
        <td><b><?= $total_penyaluran?><b></td>
        <td></td> 
    </tr> -->
</table>

</body>
</html>