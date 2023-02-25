<?= $this->extend('master') ?>
<?= $this->section('content') ?> 
<div class="container">

    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">
                <?= lang('report.all_pay_re_de_page');?>
                </h4>

                <ol class="breadcrumb float-right">
                 

                    <li class="breadcrumb-item"><a href="#"><?= lang('report.payment_report');?></a></li>
                    <li class="breadcrumb-item active"><?= lang('report.details');?></li>
                </ol>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card-box">


                <div class="row m-t-0">

                    <div class="col-12 m-t-20">
                        <h4 class="header-title m-t-0"><?= lang('report.payment_details_c');?></h4>
                        <p class="text-muted font-13 m-b-10">
                        </p>

                        <div class="box-header">


                            <div>
                                <table style="width: 67%; margin: 0 auto 2em auto;" cellspacing="1"
                                       cellpadding="3"
                                       border="0">
                                    <tbody>

                                    <tr id="filter_col8" data-column="8"
                                       
                                    >

                                        <input class="column_filter form-control"
                                               id="col8_filter" type="hidden">

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

                                    <tr id="filter_col0" data-column="0">
                                        <td align="center">
                                            <label><?= lang('report.thrift_group_id');?></label>
                                        </td>
                                        <td align="center">
                                            <input class="column_filter form-control"
                                                   id="col0_filter" type="text">
                                        </td>
                                    </tr>

                                    <tr id="filter_col4" data-column="4">
                                        <td align="center">
                                            <label><?= lang('report.paystack_id');?></label>
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

                     

                        <div class="p-20">
                            <div >
                                <table class="table table-bordered table-responsive" id="payment-table">
                                    <thead>
                                    <tr>
                                        <th><?= lang('report.thrift_group_id');?></th>
                                        <th><?= lang('report.amount');?></th>
                                        <th><?= lang('report.payer');?></th>
                                        <th><?= lang('report.paystack_id');?></th>
                                        <th><?= lang('report.payee');?></th>
                                        <th><?= lang('report.payment_date');?></th>
                                        <th><?= lang('report.thrift_start');?></th>
                                        <th><?= lang('report.thrift_end');?></th>
                                        <th><?= lang('report.date_range');?></th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <th></th>
                                    </tfoot>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
               

            </div>
        </div><!-- end col-->

    </div>

    <!-- end row -->


</div> <!-- container -->


<style>
    table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before {
        right: unset;
    }
</style>

<!--this css style is holding datatable inside the box-->
<style>

    #payment-table {
        table-layout: fixed;
        width: 100% !important;
    }

    #payment-table td,
    #payment-table th {
        width: auto !important;
        white-space: normal;
        text-overflow: ellipsis; /*ellipsis*/
        overflow: hidden;
    }
</style>

<script>
    $(document).ready(function () {
        

        var loading_image_src = '<?php echo base_url() ?>' + 'base_demo_images/loading.gif';
        var loading_image = '<img src="' + loading_image_src + ' ">';
        var loading_span = '<span><i class="fa fa-refresh fa-spin fa-4x" aria-hidden="true"></i></span> ';
        var loading_text = "<div style='font-size:larger' >text</div>";


        $('#payment-table').DataTable({
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
            infoEmpty: 'text',
            zeroRecords: 'text',
            language: {
                processing: loading_image + '<br>' + loading_text
            },
            dom: 'lfrtip',

            columns: [
                {data: "thrift_group_id"},  //0
                {data: "deposits_amount"}, //1
                {data: "member_name"},    //2
                {data: "paystack_id"},  //3
                {data: "payment_info"},  //4
                {data: "deposits_date"},      //5
                {data: "thrift_group_start_date"},  //6
                {data: "thrift_group_end_date"},      //7
                {data: "date_range"} 

            ],
            "columnDefs": [
                {
                    "render": function ( data, type, row ) {
                        var url= '/admin/user/profile/'+row['user_id'];
                            return '<a href="<?=base_url()?>/'+url+'">'+row['member_name']+'</a>';
                    },
                    "targets": 2
                },
                {
                    "render": function ( data, type, row ) {
                        return 'Date';
                    },
                    "targets": 8
                },
                {orderable: false, targets: [4,8]}, {visible: false, targets: [4,8]}
            ],

            
            aaSorting: [[1, 'desc']],

            ajax: {
                url: "<?php echo base_url('getallpayments')?>",   
                // json datasource
                type: "post",
                data: {},
                complete: function (res) {
                    //do somthing on complete

                },


            }

        });
    });
</script>


<script>
    /*column toggle*/
    $(function () {

        var table = $('#payment-table').DataTable();

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
            delay(function () {
               
                filterColumn($(var_this).parents('tr').attr('data-column'));
            }, 3000);
        });
    });
</script>

<script>
    function filterColumn(i) {

        $('#payment-table').DataTable().column(i).search(
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
             
            
            $('#col8_filter').val(start.format('YYYY-MM-DD') + 'to' + end.format('YYYY-MM-DD'));
            filterColumn(8);
        });

    });
</script>
<?= $this->endSection() ?>








