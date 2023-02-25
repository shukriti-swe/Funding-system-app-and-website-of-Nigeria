<?= $this->extend('master') ?>
<?= $this->section('content') ?> 
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">

                        <h4 class="page-title float-left">
                        <?= lang('report.thrifters');?>
                        </h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a
                                        href="/"><?= lang('report.home');?></a>
                            </li>
                            <li class="breadcrumb-item active"><?= lang('report.thrifter_list');?></li>
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
                                                <h3 class="m-t-0 header-title"><?= lang('report.thrifter_list_c');?></h3>

                                                <div>
                                                    <table style="width: 67%; margin: 0 auto 2em auto;" cellspacing="1"
                                                           cellpadding="3"
                                                           border="0">
                                                        <tbody>

                                                        <tr id="filter_col3" data-column="3">
                                                            <td align="center"><label
                                                                        for=""><?= lang('report.email');?></label>
                                                            </td>
                                                            <td align="center">
                                                                <input class="column_filter form-control"
                                                                       id="col3_filter" type="text">
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr id="filter_col5" data-column="5">
                                                            <td align="center"><label
                                                                        for=""><?= lang('report.status');?></label>
                                                            </td>
                                                            <td align="center">
                                                                <input class="column_filter form-control"
                                                                       id="col5_filter" type="hidden">
                                                                <select id="custom_status_filter" class="form-control">
                                                                <option value="">-<?= lang('report.select_one');?>-</option>
                                                                    <option value="running"><?= lang('report.running');?></option>
                                                                    <option value="future"><?= lang('report.future_start');?></option>
                                                                    <option value="complete"><?= lang('report.complete');?></option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>

                                            

                                            <!-- <div class="text-center">
                                                <div class="btn-group m-b-20">
                                                  
                                                    <a href="<?=base_url('joinedthriferspdf');?>" class="btn btn-secondary waves-effect">PDF</a>
                                                   
                                               

                                                 
                                                    <a href="" class="btn btn-secondary waves-effect">EXCEL</a>
                                              
                                                    
                                             
                                                </div>
                                            </div> -->

                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="employee-table"
                                                       class="table table-bordered table-hover table-responsive ">
                                                    <thead>
                                                    <tr>
                                                        <!-- <th>Thrift Group ID</th> -->
                                                        <th><?= lang('report.enrollment_date');?></th>
                                                        <th><?= lang('report.name');?></th>
                                                        <th><?= lang('report.member_id');?></th>
                                                        <th><?= lang('report.email');?></th>
                                                        <th><?= lang('report.balance');?></th>
                                                        <th><?= lang('report.action');?></th>
                                                        
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

    #employee-table {
        table-layout: fixed;
        width: 100% !important;
    }

    #employee-table td,
    #employee-table th {
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


        $('#employee-table').DataTable({

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
                {data: "thrift_group_member_join_date"}, //2
                {data: "created_member_name"},    //3
                {data: "mem_id_num"},    //4
                {data: "email"},    //5
                {data: "balance"},
                {data: "status"},    //5
                // {data: "action"} //7

            ],

            "columnDefs": [
                {
                    "render": function ( data, type, row ) {
                        var url= '/admin/user/profile/'+row['id'];
                            return '<a href="<?=base_url()?>/'+url+'">'+row['created_member_name']+'</a>';
                    },
                    "targets": 1
                },
                {
                    "render": function ( data, type, row ) {
                        var url= '/admin/user/profile/'+row['id'];
                            return '<a href="<?=base_url()?>/'+url+'">'+row['email']+'</a>';
                    },
                    "targets": 3
                },
                {
                    "render": function ( data, type, row ) {

                        return '<a href="<?=base_url('thriftinfo')?>/'+row["id"]+'"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>';

                     
                    },
                    "targets": 5
                },
               
            ],

            aaSorting: [[0, 'asc']],

            ajax: {
                url: "<?php echo base_url('getalljoinedthrifers') ?>",                   // json datasource
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

        var table = $('#employee-table').DataTable();

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

        $('#employee-table').DataTable().column(i).search(
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
<?= $this->endSection() ?>


