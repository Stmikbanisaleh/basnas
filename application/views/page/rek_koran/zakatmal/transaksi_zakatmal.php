<html>

<head>
	<style type="text/css">
		/* table {
			font-size: 1em;
            border-collapse: collapse;
            border: 1px solid black;
		} */

		@page {
			size: 25.4cm 46cm;
			margin-top: 1cm;
			margin-bottom: 0cm;
			margin-left: 1cm;
			margin-right: 0cm;
		}

		.text-center{
			text-align: center;
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
	<table>
		<tr>
			<td colspan="7" class="text-center">
				<b><h4>TANDA TERIMA DOKUMEN<h4><b>
			</td>
		</tr>
        <tr>
            <td style="width: 100px;"></td>
            <td style="width: 100px;"></td>
            <td style="width: 100px;"></td>
            <td style="width: 100px;"></td>
            <td style="width: 100px;"></td>
            <td style="width: 100px;"></td>
            <td style="width: 100px;"></td>
		</tr>
		<tr>
			<td colspan="7">Telah terima dokumen berupa Zakat Maal, yang diserahkan pada :</td>
		</tr>
		<tr>
            <!-- Break Line -->
		</tr>
        <tr>
            <td colspan="2">
                Tanggal
            </td>
            <td colspan="5">
				: <?php echo date('d F Y',strtotime($my_data[0]->tgl_terima)); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Atas Nama
            </td>
            <td colspan="5">
				: <?php echo $my_data[0]->nama; ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Alamat
            </td>
            <td colspan="5">
				: <?php echo $my_data[0]->alamat; ?>
            </td>
        </tr>
        <tr>
            <!-- Break Line -->
        </tr>
		<tr>
			<td colspan="7">Demikian bukti penerimaan dokumen ini dibuat, dan atas perhatiannya diucapkan terima kasih.</td>
		</tr>
        <tr>
            <!-- Break Line -->
        </tr>
		<tr>
            <td colspan="4"></td>
            <td align="right" colspan="3" style="text-align: left;">Bekasi, <?php echo date("d F Y"); ?> <tgl>
            </td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td align="right" colspan="3" style="text-align: left;">Petugas</td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td align="right" colspan="3" style="text-align: left;"><?php echo $my_data[0]->nama_petugas; ?>
            </td>
        </tr>
	</table>
</body>

</html>