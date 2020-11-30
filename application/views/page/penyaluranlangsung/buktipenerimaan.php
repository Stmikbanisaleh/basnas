<html>

<head>
    <style type="text/css">
        table {
            width: 50%;
            border-collapse: collapse;
            border: 1px solid black;
        }

        @page {
            size: 21cm 29.7cm;
            /* size: landscape; */
            margin-top: 1cm;
            margin-bottom: 0cm;
            margin-left: 1cm;
            margin-right: 1cm;
            border: 1px solid blue;
            padding: 20 px;
        }

        /* @media print{@page {size: landscape}} */

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
            font-size: 1.5em;
            font-style: normal;
            line-height: normal;
            font-weight: bold;
            color: #000000;
            font-family: Arial, Helvetica, sans-serif;
        }

        .style4 {
            font-size: medium;
        }

        .td {
            border: 1px solid black;
            border-collapse: collapse;
            }
    </style>
</head>
<?php
function penyebut($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
    }
    return $temp;
}

function terbilang($nilai)
{
    if ($nilai < 0) {
        $hasil = "minus " . trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return $hasil;
}

//echo ucwords(terbilang(1250000))." Rupiah";
?>
<?php
header("Content-type:application/x-msdownload");
header("content-disposition:attactment;filename=" . $filename . ".xls");
header("pragma:no-cache");
header("Expires:0");
?>

<body>
    <table class="style2" cellspacing="3">
        
        <tr>
            <td colspan="7" style="text-align: center">
                <b><h4>BUKTI PENGAJUAN PROPOSAL<h4><b>
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
            <td colspan="2">
                Telah Terima Dari
            </td>
            <td colspan="5">
                : BAZNAS KOTA BEKASI
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Pengajuan Proposal atas Nama
            </td>
            <td colspan="5">
                <?php echo ": " . ucwords($my_data[0]->pj); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Untuk Pengajuan
            </td>
            <td colspan="5">
                <?php echo ": " . $my_data[0]->deskripsi; ?>
            </td>
        </tr>
        <tr>
            <!-- Break Line -->
        </tr>
        <tr>
			<td colspan="2">
                Jumlah Dana Diajukan
            </td>
            <td class="td" colspan="3" style="font-style: italic; border-collapse: collapse; text-align: center;">
                Jumlah : <?php echo $my_data[0]->Nominal; ?>
            </td>
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
            <td align="right" colspan="3" style="text-align: left;">Penerbit</td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td align="right" colspan="3" style="text-align: left;"><?php echo 'Petugas Basnas Kota Bekasi'; ?>
            </td>
        </tr>
    </table>
</body>

</html>
