<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Dashboard - <?php
$jabatan = $this->session->userdata('jabatan');
if ($jabatan == 5) {
	echo "Administrator";
} elseif ($jabatan == 4) {
	echo "Staff";
} elseif ($jabatan == 3) {
	echo "Bendahara";
} elseif ($jabatan == 2) {
	echo "Pimpinan";
} else {
	echo "Amil";
}
?></title>
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>global/images/logo.png">
    <link rel="shortcut icon" href="<?php echo base_url() ?>global/images/logo.png">
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<!-- bootstrap & fontawesome -->
<link rel="stylesheet" href="<?= base_url() ?>assets/template/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>assets/template/font-awesome/4.5.0/css/font-awesome.min.css" />

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

<!-- page specific plugin styles -->

<!-- text fonts -->
<link rel="stylesheet" href="<?= base_url() ?>assets/template/css/fonts.googleapis.com.css" />

<!-- ace styles -->
<link rel="stylesheet" href="<?= base_url() ?>assets/template/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

<!--[if lte IE 9]>
	<link rel="stylesheet" href="<?= base_url() ?>assets/template/css/ace-part2.min.css" class="ace-main-stylesheet" />
<![endif]-->
<link rel="stylesheet" href="<?= base_url() ?>assets/template/css/ace-skins.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>assets/template/css/ace-rtl.min.css" />


<!-- Custom CSS -->
<link href="<?= base_url() ?>assets/template/css/my-custom.css" rel="stylesheet">

<!-- ChartJs Versi 2.7.2 -->
<link href="<?= base_url() ?>assets/template/charjs_v280/Chart.js-2.8.0/dist/Chartjs/Chart.min.css" rel="stylesheet" type="text/css" />
<!-- End ChartJs Versi 2.7.2 -->

<style type="text/css">
	.my-error-class {
    color:#FF0000;  /* red */
}
.my-valid-class {
    color:#00CC00; /* green */
}
</style>

<!--[if lte IE 9]>
  <link rel="stylesheet" href="<?= base_url() ?>assets/template/css/ace-ie.min.css" />
<![endif]-->

<!-- inline styles related to this page -->

<!-- ace settings handler -->
<script src="<?= base_url() ?>assets/template/js/ace-extra.min.js"></script>

<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

<!--[if lte IE 8]>
<script src="<?= base_url() ?>assets/template/js/html5shiv.min.js"></script>
<script src="<?= base_url() ?>assets/template/js/respond.min.js"></script>
<![endif]-->