<html>
<head>
<style>
    @page { size: 21cm 29.7cm portait; }

    .forpage{
        width : 21cm;
        height : 29.7cm;
    }

    .font_size{
        font-size : 11px;
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
            <center><font size="2"><b>REKENING KORAN<b><font></center>
		</div>
        <br>
        <div class="font_size">
            <table>
                <tr>
                    <td style="width: 70px;">Nama</td>
                    <td style="width: 300px;">: <?php echo $mymuzaki->nama; ?></td>
                </tr>
                <tr>
                    <td style="width: 70px;">NPWPZ</td>
                    <td style="width: 300px;">: <?php echo $mymuzaki->npwp; ?></td>
                </tr>
                <tr>
                    <td style="width: 70px;">Alamat</td>
                    <td style="width: 300px;">: <?php echo $mymuzaki->alamat; ?></td>
                </tr>
                <tr>
                    <td style="width: 70px;">Provinsi</td>
                    <td style="width: 300px;">: <?php echo $mymuzaki->provinsi; ?></td>
                </tr>
            </table>
        <div>
        <br>
        <br>
		<div class="font_size">
            <table border='1'>
                <tr>
                    <td style="width: 25px; text-align: center">No</td>
                    <td style="width: 140px; text-align: center">Tanggal</td>
                    <td style="width: 370px; text-align: center">Transaksi</td>
                    <td style="width: 130px; text-align: center">Jumlah</td>
                </tr>
                <?php
                    $no = 1;
                    foreach($mydata as $row){
                ?>
                    <tr>
                        <td style="text-align: center;"><?= $no ?></td>
                        <td><?= $row['tgl_terima'] ?></td>
                        <td><?= $row['jenis_penerimaan'] ?></td>
                        <td style="text-align: right"><?php echo 'Rp_ '.number_format($row['total_terima']) ?></td>
                    </tr>
                <?php
                    $no++;
                    }
                ?>
            </table>
        </div>
</body>