<?php
header("Content-type:application/x-msdownload");
header("content-disposition:attactment;filename=laporan_honor_reguler.xls");
header("pragma:no-cache");
header("Expires:0");

?>
<html>
<head>
<style type="text/css">
table{
	font-size: 1em;
}
@page {
   size: 33cm 21cm;
   margin-top: 1cm;
   margin-bottom: 0cm;
   margin-left: 0cm;
   margin-right: 0cm;
   /* border: 1px solid blue; */
}
#teks {
	font-size: 1em;
	font-style: normal;
	line-height: normal;
	color: #000000;
	font-family:Arial, Helvetica, sans-serif;
	
}
.style2 {
	font-size: 1em;
	font-style: normal;
	line-height: normal;
	color: #000000;
	font-family:Arial, Helvetica, sans-serif;	
}
#teks2 {
	font-size: 1em;
	font-style: normal;
	line-height: normal;
	font-weight: bold;
	color: #000000;
font-family:"Times New Roman", Times, serif;
	
}
#teks3 {
	font-size: 1em;
	font-style: normal;
	line-height: normal;
	font-weight: bold;
	color: #000000;
font-family:Arial, Helvetica, sans-serif;	
}
.style4 {font-size: medium; }

</style>
</head>
<body>
<table style="width:100%;">
    <tr>
        <td style="width: 100%; text-align:center;" colspan="10"><b>REKAPITULASI KEHADIRAN GURU SEKOLAH ISLAM TERPADU GEMA NURANI</b></td>
    </tr>
    <tr>
        <td style="width: 100%; text-align:center;" colspan="10"><b>TAHUN AJARAN 2020/2021 SEMESTER GENAP</b></td>
    </tr>
    <tr>
        <td style="width: 100%; text-align:center;" colspan="10"><b>Dari Tanggal 01 Januari 2020 s/d 01 Desember 2020</b></td>
    </tr>
</table>
<br>
<table style="width:100%;">
    <tr>
        <td style="width:4%; border:1px solid #000000;">No</td>
        <td style="width:14%; border:1px solid #000000;">Nama Dosen</td>
        <td style="width:23%; border:1px solid #000000;">Mata Kuliah</td>
        <td style="width:8%; border:1px solid #000000;">Hari</td>
        <td style="width:4%; border:1px solid #000000;">Jam</td>
        <td style="width:11%; border:1px solid #000000;">Kelas</td>
        <td style="width:8%; border:1px solid #000000;">Ruang</td>
        <td style="width:8%; border:1px solid #000000;">Hadir</td>
        <td style="width:10%; border:1px solid #000000;">Tambahan</td>
        <td style="width:10%; border:1px solid #000000;">Jumlah</td>
    </tr>
    <?php
    $no = 1;
    foreach($mydata as $row){
    ?>
    <tr>
        <td style="width:4%; border:1px solid #000000;"><?= $no ?></td>
        <td style="width:14%; border:1px solid #000000; background-color: #C0C0C0;" colspan="9"><?= $row['GuruNama'] ?></td>
    </tr>
        <?php
        $this->load->model('model_rekapkehadiranguru');
        $dataku = $this->model_rekapkehadiranguru->view_kehadiranguru($tahun, $blnawal, $blnakhir, $row['IdGuru'])->result_array();

        $jumlah_sks = 0;
        foreach($dataku as $myrow){
        ?>
            <tr>
                <td style="width:4%; border:1px solid #000000;"> </td>
                <td style="width:14%; border:1px solid #000000;"> </td>
                <td style="width:23%; border:1px solid #000000;"><?= $myrow['nama'] ?></td>
                <td style="width:8%; border:1px solid #000000;"><?= $myrow['hari'] ?></td>
                <td style="width:4%; border:1px solid #000000;"><?= $myrow['jam'] ?></td>
                <td style="width:11%; border:1px solid #000000;"><?= $myrow['kelas'] ?></td>
                <td style="width:8%; border:1px solid #000000;"><?= $myrow['RUANG'] ?></td>
                <td style="width:8%; border:1px solid #000000;"><?= $myrow['hadir'] ?></td>
                <td style="width:10%; border:1px solid #000000;"><?= $myrow['TAMBAHAN'] ?></td>
                <td style="width:10%; border:1px solid #000000;"><?= $myrow['jml_jam'] ?></td>
            </tr>
        <?php
        $jumlah_sks = $myrow['jml_jam']+$myrow['jml_jam'];
        }
        ?>
    <tr>
        <td style="width:8%; border:1px solid #000000; text-align:right;" colspan="7">Total Jam</td>
        <td style="width:10%; border:1px solid #000000;" colspan="3"><?= $jumlah_sks ?></td>
    </tr>
    <?php
    $no++;
    }
    ?>
</table>
</body>
</html>
