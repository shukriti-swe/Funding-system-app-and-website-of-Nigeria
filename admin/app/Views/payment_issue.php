<?= $this->extend('master') ?>
<?= $this->section('content') ?>
<div class="container">

    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">
                    <?php
                
                     All Payments
                    &nbsp;

                </h4>
                
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="text">Thrifts</a></li>
                    <li class="breadcrumb-item active">Payments</li>
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
                        <h4 class="header-title m-t-0">PAYMENT DETAILS</h4>
                        <p class="text-muted font-13 m-b-10">
                        </p>

                        <div class="box-header">


                            <div>
                                <table style="width: 67%; margin: 0 auto 2em auto;" cellspacing="1"
                                       cellpadding="3"
                                       border="0">
                                    <tbody>

                                    <tr id="filter_col8" data-column="8">

                                        <input class="column_filter form-control"
                                               id="col8_filter" type="hidden">

                                        <td align="center"><label
                                                for="">Choose Range</label>
                                        </td>
                                        <td align="center">
                                            <div id="issuerange" class="pull-right form-control">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                <span></span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr id="filter_col2" data-column="2">
                                        <td align="center">
                                            <label>Thrift Group ID</label>
                                        </td>
                                        <td align="center">
                                            <input class="column_filter form-control"
                                                   id="col2_filter" type="text">
                                        </td>
                                    </tr>

                                    

                                  
                                    

                     

                                    <tr id="filter_col9" data-column="9">
                                        <td align="center"><label
                                                    for="">Status</label>
                                        </td>
                                        <td align="center">
                                            <input class="column_filter form-control"
                                                   id="col9_filter" type="hidden">
                                            <select id="custom_status_filter" class="form-control">
                                                <option value="all">text</option>
                                                <option value="scheduled">text</option>
                                                <option value="waiting">text</option>
                                                <option value="unsuccessful">text</option>
                                                <option value="solved">text</option>
                                                <option value="successful">text</option>
                                                <option value="complete">text</option>
                                            </select>
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
                                        <th>Withdraw Amount</th>
                                        <th>Account Number</th>
                                        <th>Bank Code</th>
                                        <th>Bank Name</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Withdraw date</th>
                                        <th>Beneficiary</th>
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
                {data: "first_name"},                       //9
                {data: "last_name"}, 
                {data: "withdraw_date"}, 
                {data: "beneficiary"}, 

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

            $('#col8_filter').val(start.format('YYYY-MM-DD') + 'to' + end.format('YYYY-MM-DD'));
            filterColumn(8);
        });

    });
</script>


<?= $this->endSection() ?>








