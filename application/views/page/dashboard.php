<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-industry fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">Rp_ <?php echo number_format($countfitrah) ?></div>
						<div>Zakat Fitrah Bulan Oktober 2020</div>
					</div>
				</div>
			</div>
			<a href="#">
				<div class="panel-footer">
					<span class="pull-left">Transaksi Masuk</span>
					<!-- <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> -->

					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-tasks fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">Rp_ <?php echo number_format($countmaal) ?></div>
						<div>Zakat Maal Bulan Oktober 2020</div>
					</div>
				</div>
			</div>
			<a href="#">
				<div class="panel-footer">
					<span class="pull-left">Transaksi Masuk</span>
					<!-- <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> -->

					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-yellow">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-indent fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">Rp_ <?php echo number_format($countinfaq) ?></div>
						<div>Infaq / Shodaqoh Bulan Oktober 2020</div>
					</div>
				</div>
			</div>
			<a href="#">
				<div class="panel-footer">
					<span class="pull-left">Transaksi Masuk</span>
					<!-- <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> -->

					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>
<!-- /.row -->
<!--begin::Row-->
<div class="row">
    <div class="col-lg-6 col-md-12">
        <!--begin::List Widget 3-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0">
                <h3 class="card-title font-weight-bolder text-dark">Transaksi Masuk</h3>

                <div class="card-toolbar">
                    <div class="dropdown dropdown-inline">
                        <!-- <a href="<?= site_url('Admin/Member') ?>" class="btn btn-light btn-sm font-size-sm font-weight-bolder text-dark-75" data-toggle="tooltip" title="See More Members" data-placement="top" aria-haspopup="true" aria-expanded="false">See More</a> -->
                        <!-- <input type="hidden" id="session_grafmember" name="session_grafmember" value="1"> -->
                        
                        <!-- <button type="button" onclick="grafikMember()" id="grafik_member" class="btn btn-outline-secondary">Tahunan</button> -->
                    </div>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-2">
                <!--begin::Item-->
                    <div class="d-flex align-items-center mb-10">
                        <canvas id="myChart"></canvas>
                    </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end::List Widget 3-->
    </div>

    <div class="col-lg-6 col-md-12">
        <!--begin::List Widget 4-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0">
                <h3 class="card-title font-weight-bolder text-dark">Transaksi Keluar</h3>
                        <input type="hidden" id="session_grafbooking" name="session_grafbooking" value="1">
                <!-- <div class="card-toolbar">
                    <div class="dropdown dropdown-inline">
                        <a href="<?= site_url('Admin/Booking') ?>" class="btn btn-light btn-sm font-size-sm font-weight-bolder text-dark-75" data-toggle="tooltip" title="See More Book Hall" data-placement="top" aria-haspopup="true" aria-expanded="false">See More</a>
                    </div>
                </div> -->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-2">
                <div class="card-body pt-2">
                    <!--begin::Item-->
                        <!-- <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1">
                            <option> -- Data Tahunan -- </option>
                            <option> -- Data Bulanan -- </option>
                            </select>
                        </div> -->
                        <div class="d-flex align-items-center mb-10">
                            <canvas id="myChartBooking"></canvas>
                        </div>
                </div>

            </div>
            <!--end::Body-->
        </div>
        <!--end:List Widget 4-->
    </div>
</div>
<!--end::Row-->
<!-- ChartJs must be here because cant load from main.php -->
<script src="<?= base_url() ?>assets/template/charjs_v280/Chart.js-2.8.0/dist/Chart.min.js"></script>
<!-- End ChartJs Versi 2.7.2 -->
<script>

//deklarasi chartjs untuk membuat grafik 2d di id mychart 
var asd = document.getElementById('myChart').getContext('2d');


var ctx = document.getElementById('myChartBooking').getContext('2d');

var myChart = new Chart(asd, {
    
    type: 'line',
    data: {
        labels: [
				<?php
					$hasilgrafikMasuk = count($grafikMasuk);
					$i = 1;
					foreach($grafikMasuk as $rows){
						if($i < $hasilgrafikMasuk){
							echo '"'.$rows['bulan_ind'].'",';
						}else{
							echo $rows['bulan_ind'];
						}
					}
				?>
		],
        datasets: [{
            label: 'Grafik Transaksi',
            data: [
				<?php
					$i = 1;
					foreach($grafikMasuk as $rows){
						if($i < $hasilgrafikMasuk){
							echo '"'.$rows['total_terima'].'",';
						}else{
							echo $rows['total_terima'];
						}
					}
				?>
			],
            backgroundColor: [
                'rgba(34, 139, 35, 0.2)',
            ],
            borderColor: [
                'rgba(34, 139, 35, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		tooltips: {
         callbacks: {
            label: function(t, d) {
               if (t.datasetIndex === 0) {
                  var xLabel = d.datasets[t.datasetIndex].label;
                  var yLabel = t.yLabel + '%';
                  return xLabel + ': ' + yLabel;
               } else if (t.datasetIndex === 1) {
                  var xLabel = d.datasets[t.datasetIndex].label;
                  var yLabel = t.yLabel >= 1000 ? '$' + t.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : '$' + t.yLabel;
                  return xLabel + ': ' + yLabel;
               }
            }
         }
      },
      scales: {
         yAxes: [{
            ticks: {
               beginAtZero: true,
               callback: function(value, index, values) {
                  if (parseInt(value) >= 1000) {
                     return 'Rp_ ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                  } else {
                     return 'Rp_ ' + value;
                  }
               }
            }
         }]
      }
    }
});

var myChart = new Chart(ctx, {
    
    type: 'line',
    data: {
        labels: [
				<?php
					$hasilgetGrafikKeluar = count($getGrafikKeluar);
					$i = 1;
					foreach($getGrafikKeluar as $rows){
						if($i < $hasilgetGrafikKeluar){
							echo '"'.$rows['bulan_ind'].'",';
						}else{
							echo $rows['bulan_ind'];
						}
					}
				?>
		],
        datasets: [{
            label: 'Grafik Transaksi',
            data: [
				<?php
					$i = 1;
					foreach($getGrafikKeluar as $rows){
						if($i < $hasilgetGrafikKeluar){
							echo '"'.$rows['total_terima'].'",';
						}else{
							echo $rows['total_terima'];
						}
					}
				?>
			],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		tooltips: {
         callbacks: {
            label: function(t, d) {
               if (t.datasetIndex === 0) {
                  var xLabel = d.datasets[t.datasetIndex].label;
                  var yLabel = t.yLabel + '%';
                  return xLabel + ': ' + yLabel;
               } else if (t.datasetIndex === 1) {
                  var xLabel = d.datasets[t.datasetIndex].label;
                  var yLabel = t.yLabel >= 1000 ? '$' + t.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : '$' + t.yLabel;
                  return xLabel + ': ' + yLabel;
               }
            }
         }
      },
      legend: {
         display: true,
         position: 'top',
      },
      scales: {
         yAxes: [{
            ticks: {
               beginAtZero: true,
               callback: function(value, index, values) {
                  if (parseInt(value) >= 1000) {
                     return 'Rp_ ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                  } else {
                     return 'Rp_ ' + value;
                  }
               }
            }
         }]
      }
    }
});
</script>