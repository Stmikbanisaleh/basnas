<html>

<head>
	<style type="text/css">
		table {
			font-size: 1em;
		}

		@page {
			size: 25.4cm 46cm;
			margin-top: 1cm;
			margin-bottom: 0cm;
			margin-left: 0cm;
			margin-right: 0cm;
			border: 1px solid blue;
		}

		#teks {
			font-size: 1em;
			font-style: normal;
			line-height: normal;
			color: #000000;
			font-family: Arial, Helvetica, sans-serif;

		}

		.style2 {
			font-size: 1em;
			font-style: normal;
			line-height: normal;
			color: #000000;
			font-family: Arial, Helvetica, sans-serif;
		}

		#teks2 {
			font-size: 1em;
			font-style: normal;
			line-height: normal;
			font-weight: bold;
			color: #000000;
			font-family: "Times New Roman", Times, serif;

		}

		#teks3 {
			font-size: 1em;
			font-style: normal;
			line-height: normal;
			font-weight: bold;
			color: #000000;
			font-family: Arial, Helvetica, sans-serif;
		}

		.style4 {
			font-size: medium;
		}
	</style>
</head>

<body>
	<table border="0" width="100%" class="style2" cellspacing="3">
		<?php foreach ($my_data as $a) {
		?>
			<tr>
				<td>
					<table border="0" width="100%" class="style2" cellpadding="1" cellspacing="3">
						<tr>
							<td colspan='5' align='center'><b>
									<div id="teks3">Badan Amil Zakat Nasional</div>
							</td>
						</tr>
						<tr>
							<td colspan='5' align='center'><b>
									<div id="teks3">Tanda Terima Infaq</div>
							</td>
						</tr>
						<tr>
							<td></td>

						</tr>
						<tr>
							<td>Telah terima dokumen berupa <?php echo $my_data[0]->deskripsi; ?> yang diserahkan pada :</td>
						</tr>
						<tr>
							<td>
							</td>
						</tr>
						<tr>
							<td>
							</td>
						</tr>
						<tr>
							<td colspan='5' class="style2">
								Tanggal Terima &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $my_data[0]->tgl_terima; ?><br>
								Nama Muzakki &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $my_data[0]->nama; ?><br>
								Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $my_data[0]->alamat; ?><br>
							</td>
						</tr>
						<tr>
							<td></td>
						</tr>
						<tr>
							<td>Demikian bukti penerimaan dokumen ini dibuat, dan atas perhatiannya diucapkan terima kasih.</td>
						</tr>
						<tr>
							<td></td>
						</tr>
						<tr>
							<td></td>
						</tr>
					</table>
					<br>
				</td>
			<tr>
				<td align="right">Bekasi, <?php echo date("d-F-Y"); ?> <tgl>
				</td>
			</tr>
			<tr>
				<td align="right">Petugas</td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td align="right"><?php echo $my_data[0]->nama_petugas; ?><petugasnya>
				</td>
			</tr>
			</tr>
		<?php
		}
		?>
	</table>
</body>

</html>