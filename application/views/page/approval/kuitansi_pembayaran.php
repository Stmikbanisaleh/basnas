<html>

<head>
    <style type="text/css">
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
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
<?php
function penyebut($nilai) {
	$nilai = abs($nilai);
	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " ". $huruf[$nilai];
	} else if ($nilai <20) {
		$temp = penyebut($nilai - 10). " belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
	}     
	return $temp;
}

function terbilang($nilai) {
	if($nilai<0) {
		$hasil = "minus ". trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai));
	}     		
	return $hasil;
}

//echo ucwords(terbilang(1250000))." Rupiah";
?>
<body>
    <table class="style2" cellspacing="3">
            <tr>
                <td>
                    <table border="0" width="100%" class="style2" cellpadding="1" cellspacing="3">
                        <tr>
                            <td colspan='5' align='center'><b>
                                    <div id="teks3">KUITANSI PEMBAYARAN</div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan='5' align='center'><b>
                                    <div id="teks3"></div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>

                        </tr>
                        <tr>
                            <td></td>
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
                                No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                                                                                            echo date("Ym"); echo $no;?><br>
                                Telah Terima Dari &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: BAZNAS KOTA BEKASI<br>
                                Uang Sejumlah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo ucwords(terbilang($my_data[0]->jumlah_dana_disetujui))." Rupiah";?><br>
                                Untuk Pembayaran &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $my_data[0]->deskripsi; ?><br>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>

                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                    </table>
                </td>
            <tr>
                <td border="1">
                    Jumlah : <?php echo $my_data[0]->Nominal2; ?>
                </td>
            </tr>
            <tr>
                <td align="right">Bekasi, <?php echo date("d-F-Y"); ?> <tgl>
                </td>
            </tr>
            <tr>
                <td align="right">Penerima</td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td align="right"><?php echo $my_data[0]->mustahik; ?>
                </td>
            </tr>

            </tr>
    </table>
</body>

</html>