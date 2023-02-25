<?= $this->extend('master') ?>
<?= $this->section('content') ?>

<div class="container">

    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">
                    Administrative Dashboard </h4>

                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                    <li class="breadcrumb-item active">Dashboard View</li>
                </ol>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="ion-social-buffer float-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">Active Running Thrifts</h6>
                <h4 class="m-b-20" data-plugin=""><?= $runningThrifts; ?></h4>
                <!-- <span class="label  label-success ">100.00 % </span> <span class="text-muted">From Previous Month</span> -->
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="zmdi zmdi-paypal-alt float-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">Active Thrifts Volume</h6>
                <h4 class="m-b-20"><?php echo currency($thriftVol['thrift_volume']); ?></h4>
                <!-- <span class="label  label-success "> 100.00 % </span> <span class="text-muted">From Previous Month</span> -->
            </div>

        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="ion-stats-bars float-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">Average Thrifts Volume</h6>
                <h4 class="m-b-20"><?php echo currency($avgThriftsVol['avg_thrift_volume']); ?></h4>
                <!-- <span class="label label-success ">100.00 % </span> <span class="text-muted">From Previous Month</span> -->
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="fa fa-paper-plane float-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">Members in Active Thrift</h6>
                <h4 class="m-b-20" data-plugin="">
                    <?= $activeThrift['active_thrift']; ?>
                </h4>
                <!-- <span class="label  label-success ">100.00 % </span> <span class="text-muted">From Previous Month</span> -->
            </div>
        </div>
    </div>


    <hr>
    <div class="row">
        <div class="col-xs-12 col-lg-12 col-xl-8">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">Performance Statistics</h4>
                <!--<div class="text-center">
                <ul class="list-inline chart-detail-list m-b-0">
                    <li class="list-inline-item">
                        <h6 style="color: #3db9dc;"><i class="zmdi zmdi-circle-o m-r-5"></i>Series A</h6>
                    </li>
                    <li class="list-inline-item">
                        <h6 style="color: #1bb99a;"><i class="zmdi zmdi-triangle-up m-r-5"></i>Series B</h6>
                    </li>
                    <li class="list-inline-item">
                        <h6 style="color: #818a91;"><i class="zmdi zmdi-square-o m-r-5"></i>Series C</h6>
                    </li>
                </ul>
            </div>-->
                <div id="products-per-month" style="height: 320px;"></div>
            </div>
        </div><!-- end col-->

        <div class="col-xs-12 col-lg-12 col-xl-4">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Recent Withdrawal Request</h4>
                <div class="text-center m-b-20">
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($recentWithdrawal)) {
                            foreach ($recentWithdrawal as $withdrawal) : ?>
                                <tr>
                                <td class="text-left"  style="word-break: break-all;"><?php echo $withdrawal['email']; ?></td>
                                    <td><?php echo currency($withdrawal['withdraw_amount']); ?></td>
                                    <td>
                                        <?php if($withdrawal['status'] == 1) { ?>
                                            <span class="badge bg-warning">Pending</span>
                                        <?php } elseif($withdrawal['status'] == 2) { ?>
                                            <span class="badge bg-success">Paid</span>
                                        <?php } else { ?>
                                            <span class="badge bg-danger">Cancelled</span>
                                        <?php } ?></td>
                                </tr>
                            <?php endforeach;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">Inbox</h4>
                <a href="message_module/inbox" type="button" class="btn btn-info btn-rounded waves-effect waves-light">View All</a>

                <div class="inbox-widget nicescroll" style="height: 250px; overflow: hidden; outline: none;" 5000="" tabindex="5000">
                    <?php foreach($getMessages as $getMessage) : ?>
                        <div class="inbox-item">
                            <p class="inbox-item-author"> </p>
                            <p class="inbox-item-text"><?= strip_tags($getMessage['message']) ?></p>
                            <p class="inbox-item-date"><?= date('d M, h:i A', strtotime($getMessage['created_at'])) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>


            </div>
        </div><!-- end col-->

    </div>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<!-- Chart JS -->
<script src="assets/backend_assets/plugins/chart.js/chart.min.js"></script>

<!--Morris Chart-->
<script src="assets/backend_assets/plugins/morris/morris.min.js"></script>
<script src="assets/backend_assets/plugins/raphael/raphael-min.js"></script>

<script src="assets/backend_assets/chart/Chart.min.js"></script>
<script src="assets/backend_assets/chart/Chart.extension.js"></script>
<script src="assets/backend_assets/chart/apexcharts.min.js"></script>

<script>
    
    var options = {
         series: [{
            <?php
            $series = '';
            if (isset($chartValues)) {
               foreach ($chartValues as $values) {
                  $series .=  $values['deposits_amount'] . ",";
               }
            }
            ?>

            name: "Total Amount",
            data: [<?php echo rtrim($series, ',') ?>]
         }],
         chart: {
            type: "area",
            // width: 130,
            stacked: true,
            height: 280,
            toolbar: {
               show: !1
            },
            zoom: {
               enabled: !1
            },
            dropShadow: {
               enabled: 0,
               top: 3,
               left: 14,
               blur: 4,
               opacity: .12,
               color: "#3461ff"
            },
            sparkline: {
               enabled: !1
            }
         },
         markers: {
            size: 0,
            colors: ["#3461ff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
               size: 7
            }
         },
         grid: {
            row: {
               colors: ["transparent", "transparent"],
               opacity: .2
            },
            borderColor: "#f1f1f1"
         },
         plotOptions: {
            bar: {
               horizontal: !1,
               columnWidth: "20%",
               //endingShape: "rounded"
            }
         },
         dataLabels: {
            enabled: !1
         },
         stroke: {
            show: !0,
            width: [2.5],
            //colors: ["#3461ff"],
            curve: "smooth"
         },
         fill: {
            type: 'gradient',
            gradient: {
               shade: 'light',
               type: 'vertical',
               shadeIntensity: 0.5,
               gradientToColors: ['#3461ff'],
               inverseColors: false,
               opacityFrom: 0.5,
               opacityTo: 0.1,
               // stops: [0, 100]
            }
         },
         colors: ["#3461ff"],
         xaxis: {
            <?php
            $cate = '';

            if (isset($chartValues)) {
               foreach ($chartValues as $date) {
                  $cate .=  "'" . date('M', strtotime($date['deposits_date'])) . "',";
               }
            }
        
            ?>
            
            categories: [<?php echo rtrim($cate, ','); ?>],
         },
         responsive: [{
            breakpoint: 1000,
            options: {
               chart: {
                  type: "area",
                  // width: 130,
                  stacked: true,
               }
            }
         }],
         legend: {
            show: false
         },
         tooltip: {
            theme: "dark"
         }
      };

      var chart = new ApexCharts(document.querySelector("#products-per-month"), options);
      chart.render();

</script>

<?= $this->endSection() ?>