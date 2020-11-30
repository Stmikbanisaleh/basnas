<html>
<head>
<style>
    .font_size{
        font-size : 12px;
    }
    table, th, td {
        /* border: 1px solid black; */
        border-collapse: collapse;
    }
    th, td {
        padding: 3px;
        text-align: left;
    }
    #t01 {
        width: 100%;
        background-color: #f1f1c1;
    }
</style>
</head>
<?php
header("Content-type:application/x-msdownload");
header("content-disposition:attactment;filename=" . $filename . ".xls");
header("pragma:no-cache");
header("Expires:0");
?>
<body>
    <div class="">
		<div>
			<center><font size="2"><b>BADAN AMIL ZAKAT NASIONAL</b><font></center>
            <center><font size="2"><b>Jl. Jend. Ahmad Yani Blok B No.11, RT.001/RW.005, Kayuringin Jaya, Kec. Bekasi Sel., <br>Kota Bks, Jawa Barat 17144</b></font></center>
			
			<hr>
            <center><font size="2"><b>LAPORAN PENERIMAAN ZAKAT<b><font></center>
		</div>
        <br>
		<div class="font_size">
            <table border='1'>
                <tr>
                    <td style="width: 25px; text-align: center">No</td>
                    <td style="width: 100px; text-align: center">NPWPZ</td>
                    <td style="width: 150px; text-align: center">Nama Muzaki</td>
                    <td style="width: 100px; text-align: center">Jenis Penerimaan</td>
                    <td style="width: 78px; text-align: center">VIA</td>
                    <td style="width: 90px; text-align: center">Tgl Terima</td>
                    <td style="width: 130px; text-align: center">Total</td>
                </tr>
                <?php
                    $no = 1;
                    foreach($mydata as $row){
                ?>
                    <tr>
                        <td style="text-align: center;"><?= $no ?></td>
                        <td><?= $row['npwp'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['via'] ?></td>
                        <td><?= $row['jenis_penerimaan'] ?></td>
                        <td><?= $row['tgl_terima'] ?></td>
                        <td style="text-align: right"><?php echo 'Rp_ '.number_format($row['total_terima']) ?></td>
                    </tr>
                <?php
                    $no++;
                    }
                ?>
            </table>
        </div>
</body>