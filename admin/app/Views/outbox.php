<?= $this->extend('master') ?>
<?= $this->section('content') ?>

<div class="container">

    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">text</h4>

                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="/">text</a></li>
                    <li class="breadcrumb-item active">text</li>
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

                                        <h3 class="m-t-0 m-b-10 header-title">text</h3>

                                        <a class="btn btn-primary" href="message_module/send_message/">text
                                            &nbsp;<span class="icon"><i class="fa fa-plus"></i></span>
                                        </a>


                                        <div class="m-t-10 i alert alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <strong>text</strong>



                                            <a href="">
                                                text
                                            </a>

                                        </div>



                                        <!-- Main content -->
                                        <section class="">
                                            <div class="">
                                                <div class="col-xs-12">
                                                    <div class="box box-primary">
                                                        <div class="box-header">
                                                            <div>
                                                                <table style="width: 67%; margin: 0 auto 2em auto;" cellspacing="1" cellpadding="3" border="0">
                                                                    <tbody>
                                                                        <tr id="filter_col1" data-column="1">
                                                                            <td align="center"><label for="">text</label>
                                                                            </td>
                                                                            <td align="center">
                                                                                <input class="column_filter form-control" id="col1_filter" type="text">
                                                                            </td>
                                                                        </tr>
                                                                        <tr id="filter_col2" data-column="2">
                                                                            <td align="center"><label for="">text</label>
                                                                            </td>
                                                                            <td align="center">
                                                                                <input class="column_filter form-control" id="col2_filter" type="hidden">
                                                                                <select id="custom_status_filter" class="form-control">
                                                                                    <option value="all">text</option>
                                                                                    <option value="yes">text</option>
                                                                                    <option value="no">text</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>

                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- /.box-header -->
                                                        <div class="box-body">
                                                            <table id="inbox-table" class="table table-bordered table-hover table-responsive ">
                                                                <thead>
                                                                    <tr>
                                                                        <th>text</th>
                                                                        <th>text</th>
                                                                        <th>text</th>
                                                                        <th>text</th>
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
                                    </div>
                                    <!-- /.box-header -->

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



    <!-- /.content -->


</div> <!-- container -->




<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<!--clearing the extra arrow-->
<style>
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc_disabled:before {
        right: unset;
    }
</style>

<!--this css style is holding datatable inside the box-->
<style>
    #inbox-table {
        table-layout: fixed;
        width: 100% !important;
    }

    #inbox-table td,
    #inbox-table th {
        width: auto !important;
        white-space: normal;
        text-overflow: ellipsis;
        overflow: hidden;
    }
</style>

<script>
    $(document).ready(function() {

        var loading_image_src = '<?php echo base_url() ?>' + 'base_demo_images/loading.gif';
        var loading_image = '<img src="' + loading_image_src + ' ">';
        var loading_span = '<span><i class="fa fa-refresh fa-spin fa-4x" aria-hidden="true"></i></span> ';
        var loading_text = "<div style='font-size:larger' ><?php echo lang('loading_text') ?></div>";


        $('#inbox-table').DataTable({

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
            infoEmpty: '<?php echo lang("no_message_text") ?>',
            zeroRecords: '<?php echo lang("no_matching_message_found_text") ?>',
            language: {
                processing: loading_image + '<br>' + loading_text
            },

            columns: [{
                    data: { //0
                        _: "cr_on.display",
                        sort: "cr_on.timestamp"
                    }
                },
                {
                    data: "message"
                }, //1
                {
                    data: { //2
                        _: "arc.html",
                        sort: "arc.int"
                    }
                },

                {
                    data: "action"
                } //3

            ],

            columnDefs: [

                {
                    'targets': 0,
                    'createdCell': function(td, cellData, rowData, row, col) {
                        $(td).attr('title', cellData);
                    }
                },
                {
                    'targets': 1,
                    'createdCell': function(td, cellData, rowData, row, col) {
                        $(td).attr('title', cellData);
                    }
                },

                {
                    orderable: false,
                    targets: [3]
                } 
            ],

            aaSorting: [
                [0, 'desc']
            ],

            ajax: {
                url: "<?php echo base_url() . 'message_module/get_outbox_message_list_by_ajax' ?>", // json datasource
                type: "post",
                complete: function(res) {
                    getConfirm();
                }

            }

        });
    });
</script>


<script>
    /*column toggle*/
    $(function() {

        var table = $('#inbox-table').DataTable();

        $('a.toggle-vis').on('click', function(e) {
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
    $(document).ready(function() {
        //customized delay_func starts
        var delay = (function() {
            var timer = 0;
            return function(callback, ms) {
                clearTimeout(timer);
                timer = setTimeout(callback, ms);
            };
        })();
        //customized delay_func ends

        $('input.column_filter').on('keyup', function() {
            var var_this = $(this);
            delay(function() {
                filterColumn($(var_this).parents('tr').attr('data-column'));
            }, 3000);
        });
    });
</script>

<script>
    function filterColumn(i) {

        $('#inbox-table').DataTable().column(i).search(
            $('#col' + i + '_filter').val(),
            $('#col' + i + '_regex').prop('checked'),
            $('#col' + i + '_smart').prop('checked')
        ).draw();
    }
</script>

<script>
    /*cutom select searches through input searches*/
    $(function() {

        /*-----------------------------*/
        $('#custom_status_filter').on('change', function() {

            if ($('#custom_status_filter').val() == 'all') {
                $('#col2_filter').val('');
                filterColumn(2);
            } else {
                $('#col2_filter').val($('#custom_status_filter').val());
                filterColumn(2);
            }

        });
        /*-----------------------------*/
    })
</script>

<script>
    function getConfirm() {
        $('.confirmation').click(function(e) {

            e.preventDefault();

            var href = $(this).attr('href');

            swal({
                    title: "<?= lang('swal_title_text') ?>",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "<?= lang('swal_confirm_button_text') ?>",
                    cancelButtonText: "<?= lang('swal_cancel_button_text') ?>",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm) {
                    if (isConfirm) {
                        window.location.href = href;
                    }
                });

            return false;
        });
    }
</script>

<?= $this->endSection() ?>