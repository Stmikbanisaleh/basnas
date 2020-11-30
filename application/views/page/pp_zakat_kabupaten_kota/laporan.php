<!DOCTYPE html>
<html>
<head>
<style>
/* td {
  border: 1px solid black; border-collapse: collapse;
} */

body{
    width:1000px;
}

.margin_left1{
    margin-left:20px;
}

.padding_bottom1{
    padding-bottom:10px;
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
<div class="padding_bottom1">
I. Badan/Lembaga Pengelola Zakat
    <div class="margin_left1">
    A. Laz Berskala Kabupaten/Kota dan Perwakilan Laz Berskala Provinsi
        <div class="margin_left1">
            <table style="width:75%">
                <tr>
                    <th style="width: 40px;"> </th>
                    <th style="width: 20px; border: 1px solid black; border-collapse: collapse;">No</th>
                    <th style="width: 350px; border: 1px solid black; border-collapse: collapse;">Nama LAZ</th> 
                    <th style="width: 150px; border: 1px solid black; border-collapse: collapse;">Nomor Izin Pembentukan Laz</th> 
                    <th style="width: 115px; border: 1px solid black; border-collapse: collapse;">Tanggal Izin Pembentukan Laz</th>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">Jumlah</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<br>
<br>
<div class="padding_bottom1">
II. Perbandingan Realisasi Dengan Target Pengumpulan
    <div class="margin_left1">
    A. Perbandingan Realisasi Dengan Target Pengumpulan Zakat Maal
        <div class="margin_left1">
            <table style="width:75%">
                <tr>
                    <th style="width: 40px;" rowspan="2"> </th>
                    <th style="width: 50px; border: 1px solid black; border-collapse: collapse;" rowspan="2">No</th>
                    <th style="width: 350px; border: 1px solid black; border-collapse: collapse;">Badan/Lembaga Amil Zakat</th> 
                    <th style="width: 150px; border: 1px solid black; border-collapse: collapse;">Target</th> 
                    <th style="width: 115px; border: 1px solid black; border-collapse: collapse;">Realisasi (Rp)</th>
                </tr>
                <tr>
                    <th style="width: 350px; border: 1px solid black; border-collapse: collapse;">1</th> 
                    <th style="width: 150px; border: 1px solid black; border-collapse: collapse;">2</th> 
                    <th style="width: 115px; border: 1px solid black; border-collapse: collapse;">3</th>
                </tr>
                <?php
                foreach($myzakatmaal as $row){
                ?>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">1</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">BAZNAS Kota Bekasi</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"><?= $row['total_terima'] ?></td>
                </tr>
                <?php
                }
                ?>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">2</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">3</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">4</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">5</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">5</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                
                <?php
                foreach($myzakatmaal as $row){
                ?>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;"></td>
                    <td style="border: 1px solid black; border-collapse: collapse;">Jumlah Pengumpulan Zakat Maal</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"><?= $row['total_terima'] ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <br>
            <table style="width:75%">
                <tr>
                    <td style="width: 40px;" rowspan="2"> </td>
                    <td colspan="3">Keterangan tabel II. A</td>
                </tr>
                <tr>
                    <td colspan="3">Kolom "Target" di isi dengan target 1 (satu) tahun.</td>
                </tr>
            </table>
            
        </div>
    </div>
    <br>
    <div class="margin_left1">
    B. Perbandingan Realisasi Dengan Target Pengumpulan Zakat Fitrah
        <div class="margin_left1">
            <table style="width:75%">
                <tr>
                    <th style="width: 40px;" rowspan="2"> </th>
                    <th style="width: 50px; border: 1px solid black; border-collapse: collapse;" rowspan="2">No</th>
                    <th style="width: 350px; border: 1px solid black; border-collapse: collapse;">Badan/Lembaga Amil Zakat</th> 
                    <th style="width: 150px; border: 1px solid black; border-collapse: collapse;">Target</th> 
                    <th style="width: 115px; border: 1px solid black; border-collapse: collapse;">Realisasi (Rp)</th>
                </tr>
                <tr>
                    <th style="width: 350px; border: 1px solid black; border-collapse: collapse;">1</th> 
                    <th style="width: 150px; border: 1px solid black; border-collapse: collapse;">2</th> 
                    <th style="width: 115px; border: 1px solid black; border-collapse: collapse;">3</th>
                </tr>
                <?php
                foreach($myzakatfitrah as $row){
                ?>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">1</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">BAZNAS Kota Bekasi</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"><?= $row['total_terima'] ?></td>
                </tr>
                <?php
                }
                ?>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">2</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">3</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">4</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">5</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">5</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <?php
                foreach($myzakatfitrah as $row){
                ?>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;"></td>
                    <td style="border: 1px solid black; border-collapse: collapse;">Jumlah Pengumpulan Zakat Fitrah</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"><?= $row['total_terima'] ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <br>
            <table style="width:75%">
                <tr>
                    <td style="width: 40px;" rowspan="2"> </td>
                    <td colspan="3">Keterangan tabel II. B</td>
                </tr>
                <tr>
                    <td colspan="3">Kolom "Target" di isi dengan target 1 (satu) tahun.</td>
                </tr>
            </table>
            
        </div>
    </div>
    <br>
    <div class="margin_left1">
    C. Perbandingan Realisasi Dengan Target Pengumpulan Infaq/Sedekah
        <div class="margin_left1">
            <table style="width:75%">
                <tr>
                    <th style="width: 40px;" rowspan="2"> </th>
                    <th style="width: 50px; border: 1px solid black; border-collapse: collapse;" rowspan="2">No</th>
                    <th style="width: 350px; border: 1px solid black; border-collapse: collapse;">Badan/Lembaga Amil Zakat</th> 
                    <th style="width: 150px; border: 1px solid black; border-collapse: collapse;">Target</th> 
                    <th style="width: 115px; border: 1px solid black; border-collapse: collapse;">Realisasi (Rp)</th>
                </tr>
                <tr>
                    <th style="width: 350px; border: 1px solid black; border-collapse: collapse;">1</th> 
                    <th style="width: 150px; border: 1px solid black; border-collapse: collapse;">2</th> 
                    <th style="width: 115px; border: 1px solid black; border-collapse: collapse;">3</th>
                </tr>
                <?php
                foreach($myinfaq as $row){
                ?>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">1</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">BAZNAS Kota Bekasi</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"><?= $row['total_terima'] ?></td>
                </tr>
                <?php
                }
                ?>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">2</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">3</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">4</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">5</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">5</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <?php
                foreach($myinfaq as $row){
                ?>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;"></td>
                    <td style="border: 1px solid black; border-collapse: collapse;">Jumlah Pengumpulan Infaq/Sedekah</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"><?= $row['total_terima'] ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <br>
            <table style="width:75%">
                <tr>
                    <td style="width: 40px;" rowspan="2"> </td>
                    <td colspan="3">Keterangan tabel II. C</td>
                </tr>
                <tr>
                    <td colspan="3">Kolom "Target" di isi dengan target 1 (satu) tahun.</td>
                </tr>
            </table>
            
        </div>
    </div>
    <br>


    <div class="margin_left1">
    D. Perbandingan Realisasi Dengan Target Pengumpulan Dana Sosial Keagamaan Lainnya
        <div class="margin_left1">
            <table style="width:75%">
                <tr>
                    <th style="width: 40px;" rowspan="2"> </th>
                    <th style="width: 50px; border: 1px solid black; border-collapse: collapse;" rowspan="2">No</th>
                    <th style="width: 350px; border: 1px solid black; border-collapse: collapse;">Badan/Lembaga Amil Zakat</th> 
                    <th style="width: 150px; border: 1px solid black; border-collapse: collapse;">Target</th> 
                    <th style="width: 115px; border: 1px solid black; border-collapse: collapse;">Realisasi (Rp)</th>
                </tr>
                <tr>
                    <th style="width: 350px; border: 1px solid black; border-collapse: collapse;">1</th> 
                    <th style="width: 150px; border: 1px solid black; border-collapse: collapse;">2</th> 
                    <th style="width: 115px; border: 1px solid black; border-collapse: collapse;">3</th>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">1</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">BAZNAS Kota Bekasi</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">2</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">3</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">4</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">5</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;">5</td>
                    <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
                <tr>
                    <td style=""> </td>
                    <td style="border: 1px solid black; border-collapse: collapse;"></td>
                    <td style="border: 1px solid black; border-collapse: collapse;">Jumlah Pengumpulan DSKL</td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                    <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                </tr>
            </table>
            <br>
            <table style="width:75%">
                <tr>
                    <td style="width: 40px;" rowspan="2"> </td>
                    <td colspan="3">Keterangan tabel II. D</td>
                </tr>
                <tr>
                    <td colspan="3">Kolom "Target" di isi dengan target 1 (satu) tahun.</td>
                </tr>
            </table>
            
        </div>
    </div>
</div>
<br>
<br>

<div class="padding_bottom1">
III. Realisasi Pengumpulan
    <div class="margin_left1">
        <table style="width:75%">
            <tr>
                <th style="width: 15px;"> </th>
                <th style="width: 50px; border: 1px solid black; border-collapse: collapse;">No</th>
                <th style="width: 350px; border: 1px solid black; border-collapse: collapse;">Badan/Lembaga Amil Zakat</th> 
                <th style="width: 115px; border: 1px solid black; border-collapse: collapse;">Zakat Maal</th> 
                <th style="width: 115px; border: 1px solid black; border-collapse: collapse;">Zakat Fitrah</th>
                <th style="width: 115px; border: 1px solid black; border-collapse: collapse;">DSKL</th>
                <th style="width: 115px; border: 1px solid black; border-collapse: collapse;">Jasa Giro</th>
                <th style="width: 115px; border: 1px solid black; border-collapse: collapse;">Jumlah</th>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">1</td>
                <td style="border: 1px solid black; border-collapse: collapse;">BAZNAS Kota Bekasi</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">2</td>
                <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">3</td>
                <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">4</td>
                <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">5</td>
                <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">6</td>
                <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">Jumlah Pengumpulan</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
        </table>
    </div>
</div>
<br>
<br>

<div class="padding_bottom1">
IV. Data Muzakki
    <div class="margin_left1">
        <table style="width:75%">
            <tr>
                <th style="width: 15px;"> </th>
                <th style="width: 50px; border: 1px solid black; border-collapse: collapse;">No</th>
                <th style="width: 350px; border: 1px solid black; border-collapse: collapse;">Badan/Lembaga Amil Zakat</th> 
                <th style="width: 150px; border: 1px solid black; border-collapse: collapse;">Muzakki Perorangan (Orang)</th> 
                <th style="width: 115px; border: 1px solid black; border-collapse: collapse;">Muzakki Badan (Badan)</th>
            </tr>
            
            <?php
            foreach($mymuzaki as $row){
            ?>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">1</td>
                <td style="border: 1px solid black; border-collapse: collapse;">BAZNAS Kota Bekasi</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"><?= $row['jumlah_muzaki_perorangan'] ?></td> 
                <td style="border: 1px solid black; border-collapse: collapse;"><?= $row['jumlah_muzaki_lembaga'] ?></td>
            </tr>
            <?php
            }
            ?>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">2</td>
                <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">3</td>
                <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">4</td>
                <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">5</td>
                <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">5</td>
                <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <?php
            foreach($mymuzaki as $row){
            ?>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;"></td>
                <td style="border: 1px solid black; border-collapse: collapse;">Jumlah</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"><?= $row['jumlah_muzaki_perorangan'] ?></td> 
                <td style="border: 1px solid black; border-collapse: collapse;"><?= $row['jumlah_muzaki_lembaga'] ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>
<br>
<br>

<div class="padding_bottom1">
V. Perbandingan Realisasi Dengan Anggaran Pendistribusian dan Pendayagunaan
    <div class="margin_left1">
        <table style="width:75%">
            <tr>
                <th style="width: 15px;"> </th>
                <th style="width: 50px; border: 1px solid black; border-collapse: collapse;">No</th>
                <th style="width: 350px; border: 1px solid black; border-collapse: collapse;">Badan/Lembaga Amil Zakat</th> 
                <th style="width: 150px; border: 1px solid black; border-collapse: collapse;">Anggaran</th> 
                <th style="width: 115px; border: 1px solid black; border-collapse: collapse;">Realisasi (Rp)</th>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">2</td>
                <td style="border: 1px solid black; border-collapse: collapse;">BAZNAS Kota Bekasi</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">2</td>
                <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">3</td>
                <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">4</td>
                <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">5</td>
                <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">6</td>
                <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">Jumlah Pendistribusian dan Pendayagunaan</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
        </table>
    </div>
</div>
<br>
<br>

<div class="padding_bottom1">
VI. Realisasi Penyaluran Per Asnaf
    <div class="margin_left1">
        <table style="width:75%">
            <tr>
                <th style="width: 15px;"> </th>
                <th style="width: 50px; border: 1px solid black; border-collapse: collapse;">No</th>
                <th style="width: 350px; border: 1px solid black; border-collapse: collapse;">Badan/Lembaga Amil Zakat</th> 
                <?php
                    foreach($myasnaf as $row){
                        echo '<th style="width: 150px; border: 1px solid black; border-collapse: collapse;">'.$row['nama'].'</th>';
                    }
                ?>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">1</td>
                <td style="border: 1px solid black; border-collapse: collapse;">BAZNAS Kota Bekasi</td> 
                <?php
                    foreach($myasnaf as $row){
                        echo '<td style="border: 1px solid black; border-collapse: collapse;">'.$row['jumlah_dana'].'</td>';
                    }
                ?>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">2</td>
                <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                <?php
                    foreach($myasnaf as $row){
                        echo '<td style="border: 1px solid black; border-collapse: collapse;"> </td>';
                    }
                ?>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">3</td>
                <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                <?php
                    foreach($myasnaf as $row){
                        echo '<td style="border: 1px solid black; border-collapse: collapse;"> </td>';
                    }
                ?>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">4</td>
                <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                <?php
                    foreach($myasnaf as $row){
                        echo '<td style="border: 1px solid black; border-collapse: collapse;"> </td>';
                    }
                ?>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">5</td>
                <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td> 
                <?php
                    foreach($myasnaf as $row){
                        echo '<td style="border: 1px solid black; border-collapse: collapse;"> </td>';
                    }
                ?>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">6</td>
                <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td> 
                <?php
                    foreach($myasnaf as $row){
                        echo '<td style="border: 1px solid black; border-collapse: collapse;"> </td>';
                    }
                ?>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">Jumlah</td> 
                <?php
                    foreach($myasnaf as $row){
                        echo '<td style="border: 1px solid black; border-collapse: collapse;">'.$row['jumlah_dana'].'</td>';
                    }
                ?>
            </tr>
        </table>
    </div>
</div>
<br>
<br>

<div class="padding_bottom1">
VII. Realisasi Penyaluran Per Bidang
    <div class="margin_left1">
        <table style="width:75%">
            <tr>
                <th style="width: 15px;"> </th>
                <th style="width: 50px; border: 1px solid black; border-collapse: collapse;">No</th>
                <th style="width: 350px; border: 1px solid black; border-collapse: collapse;">Badan/Lembaga Amil Zakat</th> 
                <?php
                    foreach($mybidang as $row){
                        echo '<th style="width: 150px; border: 1px solid black; border-collapse: collapse;">'.$row['bidang'].'</th>';
                    }
                ?>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">1</td>
                <td style="border: 1px solid black; border-collapse: collapse;">BAZNAS Kota Bekasi</td> 
                <?php
                    foreach($mybidang as $row){
                        echo '<td style="border: 1px solid black; border-collapse: collapse;">'.$row['jumlah_dana'].'</td>';
                    }
                ?>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">2</td>
                <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                <?php
                    foreach($mybidang as $row){
                        echo '<td style="border: 1px solid black; border-collapse: collapse;"> </td>';
                    }
                ?>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">3</td>
                <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                <?php
                    foreach($mybidang as $row){
                        echo '<td style="border: 1px solid black; border-collapse: collapse;"> </td>';
                    }
                ?>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">4</td>
                <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                <?php
                    foreach($mybidang as $row){
                        echo '<td style="border: 1px solid black; border-collapse: collapse;"> </td>';
                    }
                ?>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">5</td>
                <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td> 
                <?php
                    foreach($mybidang as $row){
                        echo '<td style="border: 1px solid black; border-collapse: collapse;"> </td>';
                    }
                ?>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">6</td>
                <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td>
                <?php
                    foreach($mybidang as $row){
                        echo '<td style="border: 1px solid black; border-collapse: collapse;"> </td>';
                    }
                ?>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;"></td>
                <td style="border: 1px solid black; border-collapse: collapse;">Jumlah</td>
                <?php
                    foreach($mybidang as $row){
                        echo '<td style="border: 1px solid black; border-collapse: collapse;">'.$row['jumlah_dana'].'</td>';
                    }
                ?>
            </tr>
        </table>
    </div>
</div>
<br>
<br>

<div class="padding_bottom1">
VIII. RPenerima Manfaat
    <div class="margin_left1">
        <table style="width:75%">
            <tr>
                <th style="width: 15px;"> </th>
                <th style="width: 50px; border: 1px solid black; border-collapse: collapse;">No</th>
                <th style="width: 350px; border: 1px solid black; border-collapse: collapse;">Badan/Lembaga Amil Zakat</th> 
                <th style="width: 150px; border: 1px solid black; border-collapse: collapse;">Jumlah KK</th> 
                <th style="width: 115px; border: 1px solid black; border-collapse: collapse;">Jumlah Jiwa</th>
            </tr>
            <?php
            foreach($mymuzaki as $row){
            ?>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">1</td>
                <td style="border: 1px solid black; border-collapse: collapse;">BAZNAS Kota Bekasi</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"></td> 
                <td style="border: 1px solid black; border-collapse: collapse;"></td>
            </tr>
            <?php
            }
            ?>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">2</td>
                <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">3</td>
                <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">4</td>
                <td style="border: 1px solid black; border-collapse: collapse;">LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">5</td>
                <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;">5</td>
                <td style="border: 1px solid black; border-collapse: collapse;">Perwakilan LAZ Kab/Kota/.....</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td> 
                <td style="border: 1px solid black; border-collapse: collapse;"> </td>
            </tr>
            <?php
            foreach($mymuzaki as $row){
            ?>
            <tr>
                <td style=""> </td>
                <td style="border: 1px solid black; border-collapse: collapse;"></td>
                <td style="border: 1px solid black; border-collapse: collapse;">Jumlah</td> 
                <td style="border: 1px solid black; border-collapse: collapse;"></td> 
                <td style="border: 1px solid black; border-collapse: collapse;"></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>
<br>
<br>

<!-- <table style="width:100%">
    <tr>
        <th style="width: 5%;">No</th>
        <th style="width: 45%;">Keterangan</th> 
        <th style="width: 15%;">Rencana (Rp)</th> 
        <th style="width: 15%;">Realisasi (Rp) </th> 
        <th style="width: 15%;">Capaian (%) </th>
    </tr> -->

<?php
    //mysumzakat
    // $no=1;
    // foreach($mysumzakat as $row){
?>
    <!-- <tr>
        <td style="padding-left: 10px;"><b>1.1</b></td>
        <td><b>Penerimaan dana zakat</b></td> 
        <td></td> 
        <td><?= $row['total_terima']?></td>
        <td></td> 
    </tr> -->
<?php
    // $no++;
    // }
     //mysumzakat
?>

<?php
    //myzakatmallindividu
    // $no=1;
    // foreach($myzakatmallindividu as $row){
?>
    <!-- <tr>
        <td style="padding-left: 10px;"><b>1.1.1</b></td>
        <td>Penerimaan dana zakat maal perorangan</td> 
        <td></td> 
        <td><?= $row['total_terima']?></td>
        <td></td> 
    </tr> -->
<?php
    // $no++;
    // }
     //myzakatmallindividu
?>
<!-- </table> -->

</body>
</html>