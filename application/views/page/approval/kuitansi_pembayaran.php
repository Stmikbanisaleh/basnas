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
                                Uang Sejumlah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $my_data[0]->jumlah_dana; ?><br>
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
                <td>
                    Jumlah <?php echo $my_data[0]->jumlah_dana_disetujui; ?>
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