<div class="container">

    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">
                    
                    <?php if($which_issue == 'all_issue') {
                        echo lang('all_disbursement_text');
                     } ?>
                    <?php if($which_issue == 'employee_issue_as_employee' && $this->ion_auth->in_group('employee')) {
                        echo lang('my_disbursement_text').' - ' . $employee->first_name . ' ' . $employee->last_name ;;
                    } ?>
                    &nbsp;<?php if ($employer) {
                        echo ' - ' . $employer->company ;
                    } ?>

                </h4>

                <?php
                $thrift_anchor = "#";
                if($which_issue == 'all_issue') {
                    $thrift_anchor  = 'thrift_module/show_thrifts/all';
                }
                if($which_issue == 'employee_issue_as_employee' && $this->ion_auth->in_group('employee')){
                    $thrift_anchor = 'thrift_module/show_thrifts/my';
                }
                ?>

                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="<?=$thrift_anchor?>">Thrifts</a></li>
                    <li class="breadcrumb-item active">Disbursements</li>
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
                        <h4 class="header-title m-t-0"><?= lang('payment_recieve_details_text') ?></h4>
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
                                                for=""><?php echo lang('choose_range_text') ?></label>
                                        </td>
                                        <td align="center">
                                            <div id="issuerange" class="pull-right form-control">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                <span></span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr id="filter_col0" data-column="0">
                                        <td align="center">
                                            <label><?php echo lang('thrift_group_number_text') ?></label>
                                        </td>
                                        <td align="center">
                                            <input class="column_filter form-control"
                                                   id="col0_filter" type="text">
                                        </td>
                                    </tr>

                                    <tr id="filter_col4" data-column="4">
                                        <td align="center">
                                            <label><?php echo lang('thrift_group_payment_recieve_number_text') ?></label>
                                        </td>
                                        <td align="center">
                                            <input class="column_filter form-control"
                                                   id="col4_filter" type="text">
                                        </td>
                                    </tr>

                                    <?php if ($this->ion_auth->is_admin() ) { ?>
                                        <tr id="filter_col7" data-column="7">
                                            <td align="center">
                                                <label><?php echo lang('email_text') ?></label>
                                            </td>
                                            <td align="center">
                                                <input class="column_filter form-control"
                                                       id="col7_filter" type="text">
                                            </td>
                                        </tr>

                                        <tr id="filter_col3" data-column="3">
                                            <td align="center">
                                                <label><?php echo lang('thrift_group_member_text') ?></label>
                                            </td>
                                            <td align="center">
                                                <input class="column_filter form-control"
                                                       id="col3_filter" type="text">
                                            </td>
                                        </tr>
                                    <?php }?>

                                    <tr id="filter_col9" data-column="9">
                                        <td align="center"><label
                                                    for=""><?php echo lang('column_status_text') ?></label>
                                        </td>
                                        <td align="center">
                                            <input class="column_filter form-control"
                                                   id="col9_filter" type="hidden">
                                            <select id="custom_status_filter" class="form-control">
                                                <option value="all"><?php echo lang('all_text') ?></option>
                                                <option value="scheduled"><?php echo lang('scheduled_text') ?></option>
                                                <option value="waiting"><?php echo lang('waiting_text') ?></option>
                                                <option value="unsuccessful"><?php echo lang('transfer_unsuccessful_text') ?></option>
                                                <option value="solved"><?php echo lang('solved_text') ?></option>
                                                <option value="successful"><?php echo lang('transfer_successful_text') ?></option>
                                                <option value="complete"><?php echo lang('complete_text') ?></option>
                                            </select>
                                        </td>
                                    </tr>

                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <?php if ($this->session->flashdata('success')) { ?>
                            <section class="content mt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <p>
                                                <?php
                                                if ($this->session->flashdata('solve_success')) {
                                                    echo lang('solve_success_text');
                                                }
                                                if ($this->session->flashdata('unsolve_success')) {
                                                    echo lang('unsolve_success_text');
                                                }

                                                if ($this->session->flashdata('transfer_success')) {
                                                    echo lang('transfer_success_text');
                                                }

                                                if ($this->session->flashdata('flash_payment_recieve_number')) {
                                                    echo "<br>";
                                                    echo lang('thrift_group_payment_recieve_number_text').': '. $this->session->flashdata('flash_payment_recieve_number');
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php } ?>
                        <div class="p-20">
                            <div class="">
                                <table class="table table-bordered table-responsive" id="payment-recieve-table">
                                    <thead>
                                    <tr>
                                        <th><?= lang('thrift_group_employer_text') ?></th>
                                        <th><?= lang('thrift_group_payment_date_text') ?></th>
                                        <th><?= lang('thrift_group_number_text') ?></th>
                                        <th><?= lang('thrift_group_member_text') ?></th>
                                        <th><?= lang('thrift_group_payment_recieve_amount_text') ?></th>
                                        <th><?= lang('thrift_group_payment_recieve_number_text') ?></th>
                                        <th><?= lang('status_actions_text') ?></th>
                                        <th><?= lang('email_text') ?></th>
                                        <th>Date range</th>
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

    #payment-recieve-table {
        table-layout: fixed;
        width: 100% !important;
    }

    #payment-recieve-table td,
    #payment-recieve-table th {
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
        var loading_text = "<div style='font-size:larger' ><?php echo lang('loading_text')?></div>";


        $('#payment-recieve-table').DataTable({
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
            infoEmpty: '<?php echo lang("not_found_text")?>',
            zeroRecords: '<?php echo lang("no_matching_found_text")?>',
            language: {
                processing: loading_image + '<br>' + loading_text
            },
            dom: 'lfrtip',

            columns: [
                {data: "thrift_group_member_employer_name"},    //0
                {                                               //1
                    data: {
                        _: "tp_p_dt.display",
                        sort: "tp_p_dt.timestamp"
                    }
                },
                {data: "thrift_group_number"},                  //2
                {data: "name"},                                 //3
                {                                               //4
                    data: {
                        _: "p_amt.display",
                        sort: "p_amt.val"
                    }
                },
                {data: "thrift_group_payment_recieve_number"},  //5
                {data: "st_act"},                               //6
                {data: "email"},                                //7
                {data: "date_range"} ,                          //8
                {data: "status"}                                //9
            ],

            columnDefs: [

                {
                    'targets': 0,
                    'createdCell': function (td, cellData, rowData, row, col) {
                        $(td).attr('title', cellData);
                    }
                },
                {
                    'targets': 1,
                    'createdCell': function (td, cellData, rowData, row, col) {
                        $(td).attr('title', cellData);
                    }
                },

                {
                    'targets': 2,
                    'createdCell': function (td, cellData, rowData, row, col) {
                        $(td).attr('title', cellData);
                    }
                },
                {
                    'targets': 3,
                    'createdCell': function (td, cellData, rowData, row, col) {
                        $(td).attr('title', cellData);
                    }
                },
                {
                    'targets': 4,
                    'createdCell': function (td, cellData, rowData, row, col) {
                        $(td).attr('title', cellData);
                    }
                },

                {
                    'targets': 4,
                    'createdCell': function (td, cellData, rowData, row, col) {
                        $(td).attr('title', cellData);
                    }
                },
                {
                    'targets': 5,
                    'createdCell': function (td, cellData, rowData, row, col) {
                        $(td).attr('title', cellData);
                    }
                },


                {orderable: false, targets: [0,6,7,8,9]}, {visible: false, targets: [0,7,8,9]}
            ],

            aaSorting: [[1, 'desc']],

            ajax: {
                url: "<?php echo base_url() . 'thrift_module/get_payment_recieve_issue_by_ajax' ?>",                   // json datasource
                type: "post",
                data: {
                    employee_id: '<?= $employee_id ? $employee_id : '' ?>',
                    employer_id: '<?= $employer_id ? $employer_id : '' ?>',
                    which_issue: '<?= $which_issue ?>'
                },
                complete: function (res) {
                    //do somthing on complete

                }

            }

        });
    });
</script>


<script>
    /*column toggle*/
    $(function () {

        var table = $('#payment-recieve-table').DataTable();

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

        $('#payment-recieve-table').DataTable().column(i).search(
            $('#col' + i + '_filter').val(),
            $('#col' + i + '_regex').prop('checked'),
            $('#col' + i + '_smart').prop('checked')
        ).draw();
    }
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

            $('#col8_filter').val(start.format('YYYY-MM-DD') + 'to' + end.format('YYYY-MM-DD'));
            filterColumn(8);
        });

    });
</script>







