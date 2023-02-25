<?= $this->extend('master') ?>
<?= $this->section('content') ?> 
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">

                        <h4 class="page-title float-left">
                        <?= lang('report.referrals');?>
                        </h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a
                                        href="/"><?= lang('report.home');?></a>
                            </li>
                            <li class="breadcrumb-item active"><?= lang('report.referral_ids');?></li>
                        </ol>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-12">
                    <h4 class="header-title m-t-0 m-b-30"></h4>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                        <div class="page-title-box">
                            <h4 class="page-title float-left">
                                <small></small>
                            </h4>

                            <!-- Main content -->
                            <section class="">
                                <div class="">
                                    <div class="col-xs-12">
                                        <div class="box box-primary">
                                        <div class="box-header">


                                            <div>
                                                <table style="width: 67%; margin: 0 auto 2em auto;" cellspacing="1"
                                                    cellpadding="3"
                                                    border="0">
                                                    <tbody>

                                                    <tr id="filter_col6" data-column="6"
                                                    
                                                    >

                                                        <input class="column_filter form-control"
                                                            id="col6_filter" type="hidden">

                                                        <td align="center"><label
                                                                    for=""><?= lang('report.choose_range');?></label>
                                                        </td>
                                                        <td align="center">
                                                            <div id="reportrange" class="pull-right form-control">
                                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                                <span></span>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    

                                                    <tr id="filter_col4" data-column="4">
                                                        <td align="center">
                                                            <label><?= lang('report.email');?></label>
                                                        </td>
                                                        <td align="center">
                                                            <input class="column_filter form-control"
                                                                id="col4_filter" type="text">
                                                        </td>
                                                    </tr>

                                                    </tbody>

                                                </table>
                                            </div>
                                            </div>

                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="referral-table"
                                                       class="table table-bordered table-hover table-responsive ">
                                                    <thead>
                                                    <tr>
                                                        <!-- <th>Thrift Group ID</th> -->
                                                        <th><?= lang('report.name');?></th>
                                                        <th><?= lang('report.email');?></th>
                                                        <th><?= lang('report.referral_amount');?></th>
                                                        <th><?= lang('report.purpose');?></th>
                                                        <th><?= lang('report.date');?></th>
                                                        <th><?= lang('report.thrift_name');?></th>
                                                        
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </section>
                            <!-- /.content -->
                            <div class="clearfix"></div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container -->



<!-- <script>
    $(function () {
        $(document).tooltip();
    })
</script> -->

<!--clearing the extra arrow-->
<style>
    table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before {
        right: unset;
    }
</style>

<!--this css style is holding datatable inside the box-->
<style>

    #referral-table {
        table-layout: fixed;
        width: 100% !important;
    }

    #referral-table td,
    #referral-table th {
        width: auto !important;
        white-space: normal;
        text-overflow: ellipsis;
        overflow: hidden;
    }
</style>

<script>
    $(document).ready(function () {

        var loading_image_src = '<?php echo base_url() ?>' + 'base_demo_images/loading.gif';
        var loading_image = '<img src="' + loading_image_src + ' ">';
        var loading_span = '<span><i class="fa fa-refresh fa-spin fa-4x" aria-hidden="true"></i></span> ';
        var loading_text = "<div style='font-size:larger' ><?php echo lang('loading_text')?></div>";


        $('#referral-table').DataTable({

            processing: true,
            serverSide: true,
            paging: true,
            pagingType: "full_numbers",
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: true,
            searchDelay: 3000,
            infoEmpty: 'Text',
            zeroRecords: 'Text',
            language: {
                processing: loading_image + '<br>' + loading_text
            },

            lengthMenu: [[10, 25, 50, 18446744073709551615], [10, 25, 50, "All"]],
            dom: 'lfrtip',

            columns: [
                
                // {data: "thrift_group_id"}, //1
                {data: "user_name"}, //2
                {data: "email"},    //3
                {data: "referral_amount"},    //4
                {data: "purpose"},    //5
                {data: "created_at"},
                {data: "thrift_name"},    //5
                {data: "date_range"}
                // {data: "action"} //7

            ],

            "columnDefs": [
                {
                    "render": function ( data, type, row ) {
                        return 'Date';
                    },
                    "targets": 6
                },
                {orderable: false, targets: [6]}, {visible: false, targets: [6]}
            ],

            aaSorting: [[0, 'asc']],

            ajax: {
                url: "<?php echo base_url('getallreferralids') ?>",                   // json datasource
                type: "post",
                data:{},
                complete: function (res) {
                
                //    if(res.responseJSON.statuss=='Running'){
                //     $('.statuss').text(res.responseJSON.statuss);
                //    }else if(res.responseJSON.statuss=='Future'){
                //     $('.statuss').text(res.responseJSON.statuss);
                //    }else if(res.responseJSON.statuss=='Complete'){
                //     $('.statuss').text(res.responseJSON.statuss);
                //    }

                }
            }

        });
    });
</script>


<script>
    /*column toggle*/
    $(function () {

        var table = $('#referral-table').DataTable();

        $('a.toggle-vis').on('click', function (e) {
            e.preventDefault();

            // Get the column API object
            var column = table.column($(this).attr('data-column'));

            // Toggle the visibility
            column.visible(!column.visible());
        });

    });
</script>

<script>
    /*input searches*/
    $(document).ready(function () {
        //customized delay_func starts
        var delay = (function () {
            var timer = 0;
            return function (callback, ms) {
                clearTimeout(timer);
                timer = setTimeout(callback, ms);
            };
        })();
        //customized delay_func ends

        $('input.column_filter').on('keyup', function () {
            var var_this = $(this);
            // alert($(var_this).parents('tr').attr('data-column'));
            delay(function () {
                filterColumn($(var_this).parents('tr').attr('data-column'));
            }, 3000);
        });
    });
</script>

<script>
    function filterColumn(i) {

        $('#referral-table').DataTable().column(i).search(
            $('#col' + i + '_filter').val(),
            $('#col' + i + '_regex').prop('checked'),
            $('#col' + i + '_smart').prop('checked')
        ).draw();
    }
</script>

<script>
    /*cutom select searches through input searches*/
    $(function () {

        /*-----------------------------*/
        $('#custom_status_filter').on('change', function () {
         
            if ($('#custom_status_filter').val() == 'all') {
                $('#col5_filter').val('');
                filterColumn(5);
            } else {
               
                $('#col5_filter').val($('#custom_status_filter').val());
                filterColumn(5);
            }

        });
        /*-----------------------------*/
    })
</script>

<script>
    function getConfirm() {
        $('.confirmation').click(function (e) {

            e.preventDefault();

            var href = $(this).attr('href');

            swal({
                    title: "Text",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Text",
                    cancelButtonText: "Text",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function (isConfirm) {
                    if (isConfirm) {
                        window.location.href = href;
                    }
                });

            return false;
        });
    }

</script>
<script>
    /*input searches*/
    $(document).ready(function () {
        //customized delay_func starts
        var delay = (function () {
            var timer = 0;
            return function (callback, ms) {
                clearTimeout(timer);
                timer = setTimeout(callback, ms);
            };
        })();
        //customized delay_func ends

        $('input.column_filter').on('keyup', function () {
            var var_this = $(this);
            delay(function () {
               
                filterColumn($(var_this).parents('tr').attr('data-column'));
            }, 3000);
        });
    });
</script>

<script>
    function filterColumn(i) {

        $('#referral-table').DataTable().column(i).search(
            $('#col' + i + '_filter').val(),
            $('#col' + i + '_regex').prop('checked'),
            $('#col' + i + '_smart').prop('checked')
        ).draw();
    }
</script>


<script>
    $(function () {

        //$('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

        $('#reportrange').daterangepicker({
            format: 'MM/DD/YYYY',
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            minDate: '01/01/2015',
            maxDate: '12/31/2025',
            dateLimit: {
                days: 60
            },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'left',
            drops: 'down',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-custom',
            cancelClass: 'btn-secondary',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Cancel',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        }, function (start, end, label) {

            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
             
            
            $('#col6_filter').val(start.format('YYYY-MM-DD') + 'to' + end.format('YYYY-MM-DD'));
            filterColumn(6);
        });

    });
</script>
<?= $this->endSection() ?>


