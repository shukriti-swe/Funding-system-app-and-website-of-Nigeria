<?= $this->extend('master') ?>
<?= $this->section('content') ?> 
<div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left"><?= lang('thrift.all_thrifts');?></h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a
                                        href="#"><?= lang('thrift.thrifts');?></a>
                            </li>
                            <li class="breadcrumb-item active"><?= lang('thrift.thrifts_list');?></li>
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

                            </h4>

                            <!-- Main content -->
                            <section class="">
                                <div class="">
                                    <div class="col-xs-12">
                                        <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="m-t-0 header-title"><?= lang('thrift.thrifts_list_c');?></h3>

                                                <div>
                                                    <table style="width: 67%; margin: 0 auto 2em auto;" cellspacing="1"
                                                           cellpadding="3"
                                                           border="0">
                                                        <tbody>
                                                        <tr id="filter_col0" data-column="0">
                                                            <td align="center">
                                                                <label><?= lang('thrift.group_id');?></label>
                                                            </td>
                                                            <td align="center">
                                                                <input class="column_filter form-control"
                                                                       id="col0_filter" type="text">
                                                            </td>
                                                        </tr>
                                                        <tr id="filter_col6" data-column="6">
                                                            <td align="center"><label
                                                                        for=""><?= lang('thrift.status');?> </label>
                                                            </td>
                                                            <td align="center">
                                                                <input class="column_filter form-control"
                                                                       id="col4_filter" type="hidden">
                                                                <select id="custom_open_status_filter"
                                                                        class="form-control">
                                                                    <option value=""><?= lang('thrift.select_one');?></option>
                                                                    <option value="running"><?= lang('thrift.running');?></option>
                                                                    <option value="future"><?= lang('thrift.future_start');?></option>
                                                                    <option value="complete"><?= lang('thrift.complete');?></option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="thrift-table"
                                                       class="table table-bordered table-hover table-responsive ">
                                                    <thead>
                                                    <tr>
                                                        <th><?= lang('thrift.thrift_group_id');?></th>
                                                        <th><?= lang('thrift.thrift_name');?></th>
                                                        <th><?= lang('thrift.thrift_group_term_duration');?></th>
                                                        <th><?= lang('thrift.thrift_group_product_price');?></th>
                                                        <!-- <th>Thrift Group Start Date</th>
                                                        <th>Thrift Group End Date</th>
                                                        <th>Created Member Name</th> -->
                                                        <th><?= lang('thrift.action');?></th>
                                                        <!-- <th>Created Member Avatar</th> -->
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


<style>
    table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before {
        right: unset;
    }
</style>

<!--this css style is holding datatable inside the box-->
<style>
    #thrift-table {
        table-layout: fixed;
        width: 100% !important;
    }

    #thrift-table td,
    #thrift-table th {
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
        var loading_text = "<div style='font-size:larger' >text</div>";


        $('#thrift-table').DataTable({
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
                {data: "id"},
                // {data: "thrift_group_number"},
                {data: "thrift_name"}, //0
                {data: "thrift_group_term_duration"},              //2
                {data: "thrift_group_product_price"}, 
                {data: "status"}, 
                // {data: "thrift_group_start_date"},    
                // {data: "thrift_group_end_date"}, 
                // {data: "created_member_name"},
                //{data: "created_member_name"},
                // {data: "created_member_avatar"},

            ],
            "columnDefs": [
        {
            "render": function ( data, type, row ) {
                return ' <a href="<?=base_url('/thriftdetails');?>/'+row['id']+'" class="btn btn-success edit" data-id="'+row['id']+'">Details</a> ';
            },
            "targets": 4
        },
       ],

            
            aaSorting: [[1, 'desc']],

            ajax: {
                url: "<?php echo base_url('getallthrifts')?>",   
                // json datasource
                type: "post",
                data: {},
                complete: function (res) {
                },
            }

        });
    });
</script>

<script>
    function getConfirm() {
        $('.confirmation').click(function (e) {

            e.preventDefault();

            var href = $(this).attr('href');

            swal({
                    title: "<?= lang('swal_title_text')?>",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "text",
                    cancelButtonText: "text",
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


        $('#thrift-table').DataTable().column(i).search(
            $('#col' + i + '_filter').val(),
            $('#col' + i + '_regex').prop('checked'),
            $('#col' + i + '_smart').prop('checked')
        ).draw();
    }
</script>

<script>
    /*cutom select searches through input searches*/
    $(function () {

        /*$('.custom_product_filter').select2({placeholder: "prod"});


         $('.custom_product_filter').on("select2:select", function (e) {
         e.preventDefault();

         var prod_id = $(e.currentTarget).find("option:selected").val();

         $('#col3_filter').val(prod_id);
         filterColumn(1);

         });*/


        //select2 is not working


        $('#custom_product_filter').on('change', function () {

            $('#col1_filter').val($('#custom_product_filter').val());
            filterColumn(1);

        });


        /*-----------------------------*/


        $('#custom_completion_filter').on('change', function () {

            if ($('#custom_completion_filter').val() == 'all') {
                $('#col3_filter').val('');
                filterColumn(3);
            } else {
                $('#col3_filter').val($('#custom_completion_filter').val());
                filterColumn(3);
            }

        });

       

        $('#custom_status_filter').on('change', function () {

            if ($('#custom_status_filter').val() == 'all') {
                $('#col5_filter').val('');
                filterColumn(5);
            } else {
                $('#col5_filter').val($('#custom_status_filter').val());
                filterColumn(5);
            }

        });

        $('#custom_open_status_filter').on('change', function () {

            if ($('#custom_open_status_filter').val() == 'all') {
                $('#col4_filter').val('');
                filterColumn(4);
            } else {
                $('#col4_filter').val($('#custom_open_status_filter').val());
                filterColumn(4);
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
                    title: "<?= lang('swal_title_text')?>",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "<?= lang('swal_confirm_button_text')?>",
                    cancelButtonText: "<?= lang('swal_cancel_button_text')?>",
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

<?= $this->endSection() ?>


