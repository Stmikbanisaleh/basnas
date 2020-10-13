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
    $total_penyaluran = 0;
    $no=1;
    foreach($myprogram as $rows){
?>
    <tr>
        <td style="padding-left: 10px;"><b><?= '1.'.$no ?><b></td>
        <td><b><?= "Penyaluran dana ".$rows['nama'] ?><b></td> 
        <td></td> 
        <td><b><?= $rows['jumlah_dana']?><b></td>
        <td></td> 
    </tr>
<?php

        $myansaf = $this->model_rr_penyaluran_asnaf->view_by_ansaf($post_tgl_awal, $post_tgl_akhir, $rows['type'])->result_array();
        // print_r($this->db->last_query());exit;
        $no_sub = 1;
        foreach($myansaf as $row){
        ?>
        <tr>
            <td style="padding-left: 0px;"><?= '1.'.$no.'.'.$no_sub ?></td>
            <td><?= "Penyaluran Dana".$rows['nama']." Untuk ".$row['nama'] ?></td> 
            <td></td> 
            <td><?= $row['total']?></td>
            <td></td> 
        </tr>

        <?php
        $total_penyaluran = $total_penyaluran+$row['total'];
        $no_sub++;
        }
    $no++;
    }
?>
    <tr>
        <td style="text-align: center;" colspan="2"><b>TOTAL PENYALURAN<b></td>
        <td></td> 
        <td><b><?= $total_penyaluran?><b></td>
        <td></td> 
    </tr>
</table>

</body>
</html>