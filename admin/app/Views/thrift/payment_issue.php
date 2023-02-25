<?= $this->extend('master') ?>
<?= $this->section('content') ?>
<div class="container">

    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">
                   
              
                   <?= lang('thrift.all_payments');?>
             
                    &nbsp;

                </h4>
                
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="text"><?= lang('thrift.thrifts');?></a></li>
                    <li class="breadcrumb-item active"><?= lang('thrift.payments');?></li>
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
                        <h4 class="header-title m-t-0"><?= lang('thrift.payment_details_c');?></h4>
                        <p class="text-muted font-13 m-b-10">
                        </p>

                        <div class="box-header">


                            <div>
                                <table style="width: 67%; margin: 0 auto 2em auto;" cellspacing="1"
                                       cellpadding="3"
                                       border="0">
                                    <tbody>

                                    <tr id="filter_col9" data-column="9">

                                        <input class="column_filter form-control"
                                               id="col9_filter" type="hidden">

                                        <td align="center"><label
                                                for=""><?= lang('thrift.choose_range');?></label>
                                        </td>
                                        <td align="center">
                                            <div id="issuerange" class="pull-right form-control">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                <span></span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr id="filter_col8" data-column="8">
                                        <td align="center">
                                            <label><?= lang('thrift.email');?></label>
                                        </td>
                                        <td align="center">
                                            <input class="column_filter form-control"
                                                   id="col8_filter" type="text">
                                        </td>
                                    </tr>

                                    </tbody>

                                </table>
                            </div>
                        </div>

                    
                            <section class="content mt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <p>
                                               
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>
                     

                        <div class="p-20">
                            <div class="">
                                <table class="table table-bordered table-responsive" id="payment-table">
                                    <thead>
                                    <tr>
                                        <th><?= lang('thrift.withdraw_amount');?></th>
                                        <th><?= lang('thrift.account_number');?></th>
                                        <th><?= lang('thrift.bank_code');?></th>
                                        <th><?= lang('thrift.bank_name');?></th>
                                        <th><?= lang('thrift.name');?></th>
                                        <th><?= lang('thrift.withdraw_date');?></th>
                                        <th><?= lang('thrift.beneficiary');?></th>
                                        <th><?= lang('thrift.email');?></th>
                                        <th><?= lang('thrift.status');?></th>
                                    </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->


            </div>
        </div><!-- end col-->

    </div>

    <!-- end row -->


</div> <!-- container -->

<!--  Modal content for the above example -->
<div id="paymentStatusModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="myExtraLargeModalLabel">Payment Status</h5>
            <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">

            <table class="table">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody id="payment">
                   
                </tbody>
               
            </table>

         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


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
                // {data: "id"},
                {data: "withdraw_amount"},
                {data: "account_number"}, //0
                {data: "bank_code"},              //2
                {data: "bank_name"}, 
                {data: "member_name"},                       //9
                // {data: "last_name"}, 
                {data: "withdraw_date"}, 
                {data: "beneficiary"}, 
                {data: "email"},
                {data: "status"},
                {data: "date_range"},
                
                

            ],
            "columnDefs": [
                {
                    "render": function ( data, type, row ) {
                        return 'Date';
                    },
                    "targets": 9
                },
                
              
                {
                    "render": function ( data, type, row ) {
                        if(row['status'] != 1){
                            var icon = '<i class="zmdi zmdi-info openPaymentStatus" data-id="'+row['id']+'" style="color:#e1970f; font-size:24px"</i>';
                        }else{
                            var icon = '';
                        }
                        return '<a href="<?=base_url('/withdrawstatus');?>/'+row['id']+'/'+row['status']+'" class="btn btn-success edit" data-id="'+row['id']+'">Action</a> '+icon;
                    },
                    "targets": 8
                },
                {orderable: false, targets: [9,5]}, {visible: false, targets: [9,5]}
            ],

            
            aaSorting: [[1, 'desc']],

            ajax: {
                url: "<?php echo base_url('getwithdrawsdata')?>",   
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
    $(function () {

        //$('#issuerange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

        $('#issuerange').daterangepicker({
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

            $('#issuerange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

            $('#col9_filter').val(start.format('YYYY-MM-DD') + 'to' + end.format('YYYY-MM-DD'));
            filterColumn(9);
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
    //cutom select searches through input searches
    $(function () {

        $('#custom_status_filter').on('change', function () {

            if ($('#custom_status_filter').val() == 'all') {
                $('#col9_filter').val('');
                filterColumn(9);
            } else {
                $('#col9_filter').val($('#custom_status_filter').val());
                filterColumn(9);
            }

        });

    })
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

        //$('#issuerange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

        $('#issuerange').daterangepicker({
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

            $('#issuerange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

            $('#col9_filter').val(start.format('YYYY-MM-DD') + 'to' + end.format('YYYY-MM-DD'));
            filterColumn(9);
        });

        $(document).on("click",".openPaymentStatus",function () {
            // alert('hello');
            $('#paymentStatusModal').modal('show');

            var Id = $(this).attr('data-id');
            $.ajax({
                url : "<?= base_url() ?>/paymentstatus",
                type : "post",
                data : {
                    Id : Id
                },
                dataType : "json",
                success : function(response){

                    $('#payment').html('');

                    var status = '';
                    if(response.status == 2){
                        status = '<span class="badge badge-warning text-white">Processed</span>';
                    }else if(response.status == 3){
                        status = '<span class="badge badge-info">Denied</span>';
                    }else if(response.status == 4){
                        status = '<span class="badge badge-danger">Cancelled</span>';
                    }

                    $('#payment').html('<tr><td>'+status+'</td><td>'+response.status_details+'</td></tr>');
                }
            });

        });



    });
</script>



<?= $this->endSection() ?>








