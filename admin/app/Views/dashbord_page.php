<?= $this->extend('master') ?>
<?= $this->section('content') ?> 
<section class="content mt-0">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="alert-heading">text</h4>


                <p>
                    text
                </p>

                <p>
                    text
                </p>


            </div>
        </div>
    </div>
</section>


<!-- Start content -->
<!--    <div class="content">-->
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">

                </h4>

                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="">text</a></li>
                    <li class="breadcrumb-item active">text</li>
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
                <h6 class="text-muted text-uppercase m-b-20">text</h6>
                <h4 class="m-b-20" data-plugin="">text</h4>
                <span class="label">text
                </span> <span class="text-muted">text</span>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="zmdi zmdi-paypal-alt float-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">text</h6>
                <h4 class="m-b-20">text</h4>
                <span class="label">text</span> <span class="text-muted">text</span>
            </div>

        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="ion-stats-bars float-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">text</h6>
                <h4 class="m-b-20">text</h4>
                <span class="label ">
                    text </span> <span class="text-muted">text</span>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="fa fa-paper-plane float-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">text</h6>
                <h4 class="m-b-20" data-plugin="">text</h4>
                <span class="label ">text</span> <span class="text-muted">text</span>
            </div>
        </div>
    </div>



    <hr>
    <div class="row">
        <div class="col-xs-12 col-lg-12 col-xl-8">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">text</h4>
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

                <h4 class="header-title m-t-0 m-b-30">text</h4>

                <!-- <div class="text-center m-b-20">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-sm btn-secondary">Today</button>
                        <button type="button" class="btn btn-sm btn-secondary">This Week</button>
                        <button type="button" class="btn btn-sm btn-secondary">Last Week</button>
                    </div>
                </div> -->
                <div id="organization-trending" style="height: 269px;"></div>
                <div class="text-center">
                    <ul class="list-inline chart-detail-list mb-0 m-t-10">

                        <li class="list-inline-item">
                            <h6><i class="zmdi zmdi-circle-o m-r-5"></i>text</h6>
                            <h6><i class="zmdi zmdi-circle-o m-r-5"></i>text</h6>
                            <h6><i class="zmdi zmdi-circle-o m-r-5"></i>text</h6>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="row">

        <div class="col-xs-12 col-md-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">text</h4>
                <a href="message_module/inbox" type="button" class="btn btn-info btn-rounded waves-effect waves-light">text</a>


                <div class="inbox-widget nicescroll" style="height: 250px;">


                    <a href="">
                        <div class="inbox-item">
                            <!--<div class="inbox-item-img"><img src="assets/images/users/avatar-1.jpg"
                                                                         class="rounded-circle" alt=""></div>-->
                            <p class="inbox-item-author">text</p>
                            <p class="inbox-item-text">text</p>
                            <p class="inbox-item-date">text</p>
                        </div>
                    </a>

                </div>



                <p>text</p>


            </div>
        </div><!-- end col-->

    </div>



  
</div>


<!-- Chart JS -->
<script src="assets/backend_assets/plugins/chart.js/chart.min.js"></script>

<!--Morris Chart-->
<script src="assets/backend_assets/plugins/morris/morris.min.js"></script>
<script src="assets/backend_assets/plugins/raphael/raphael-min.js"></script>


<script type="text/javascript">
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    Morris.Bar({
        element: 'products-per-month',
        stacked: true,
        data: 'm',
        barColors: 'm',
        barSizeRatio: 0.3,
        gridTextSize: '10px',
        hideHover: "true",
        xkey: 'm',
        ykeys: 'm',
        labels: 'm',

        xLabelFormat: function(x) {
            var month = months[x.x];
            var year = new Date(x.src.m).getFullYear();
            return month + ' ' + year;
        },
    });


</script>
<?= $this->endSection() ?>