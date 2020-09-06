<html>
<head>
<style>
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
<body>
    <div class="">
		<div>
			<center><font size="2"><b>BADAN AMIL ZAKAT NASIONAL</b><font></center>
            <center><font size="2"><b>Jl. Jend. Ahmad Yani Blok B No.11, RT.001/RW.005, Kayuringin Jaya, Kec. Bekasi Sel., <br>Kota Bks, Jawa Barat 17144</b></font></center>
			
			<hr>
            <center><font size="2"><b>LAPORAN PENYALURAN ZAKAT<b><font></center>
		</div>
        <br>
		<div class="font_size">
            <table border='1'>
                <tr>
                    <td style="width: 25px; text-align: center">No</td>
                    <td style="width: 100px; text-align: center">Tipe</td>
                    <td style="width: 90px; text-align: center">Sub Program</td>
                    <td style="width: 60px; text-align: center">Jenis Dana</td>
                    <td style="width: 35px; text-align: center">Asnaf</td>
                    <td style="width: 95px; text-align: center">Deskripsi</td>
                    <td style="width: 60px; text-align: center">Tanggal</td>
                    <td style="width: 65px; text-align: center">Status</td>
                    <td style="width: 130px; text-align: center">Jumlah Dana</td>
                </tr>
                <?php
                    $no = 1;
                    foreach($mydata as $row){
                        if($row['is_approve'] == 1){
                            $approve = 'UNAPPROVE';
                        }else{
                            $approve = 'APPROVE';
                        }
                ?>
                    <tr>
                        <td style="text-align: center;"><?= $no ?></td>
                        <td><?= $row['program'] ?></td>
                        <td><?= $row['deskripsi'] ?></td>
                        <td><?= $row['jenis_data'] ?></td>
                        <td><?= $row['asnaf'] ?></td>
                        <td><?= $row['deskripsi'] ?></td>
                        <td><?= $row['createdAt'] ?></td>
                        <td><?= $approve ?></td>
                        <td style="text-align: right"><?php echo 'Rp_ '.number_format($row['jumlah_dana']) ?></td>
                    </tr>
                <?php
                    $no++;
                    }
                ?>
            </table>
        </div>
</body>