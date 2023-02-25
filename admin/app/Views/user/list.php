<?= $this->extend('master') ?>
<?= $this->section('content') ?> 

<div class="container">

    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left"><?= lang('General.users'); ?></h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="/"><?= lang('General.home'); ?></a></li>
                    <li class="breadcrumb-item active"><?= lang('General.users'); ?></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <?php if (session()->getFlashdata('error')) { ?> 
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong><?php echo session()->getFlashdata('success'); ?></strong>
        </div>
    <?php } ?>

    <?php if (session()->getFlashdata('success')) { ?> 
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong><?php echo session()->getFlashdata('success'); ?></strong>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-12">
            <h4 class="header-title m-t-0 m-b-30"></h4>
            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left m-b-10"><small><?= lang('User.manage_users'); ?></small></h4>
                    <a class="btn btn-primary float-right"href="<?= base_url('admin/user/create'); ?>"><?= lang('master.create_user'); ?>&nbsp;<span class="icon"><i class="fa fa-plus"></i></span></a>

                    <!-- Main content -->

                    <div class="col-xs-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <div>
                                    <table style="width: 67%; margin: 5em auto 2em auto;" cellspacing="1" cellpadding="3" border="0">
                                        <tbody>

                                                                                        
                                            <tr id="filter_col0" data-column="0">
                                                <td align="center"><label><?= lang('User.first_name'); ?></label></td>
                                                <td align="center"><input class="column_filter form-control" id="col0_filter" type="text"></td>
                                            </tr>
                                            
                                            <tr id="filter_col1" data-column="1">
                                                <td align="center"><label for=""><?= lang('User.last_name'); ?></label></td>
                                                <td align="center"><input class="column_filter form-control" id="col1_filter" type="text"></td>
                                            </tr>
                                             
                                            <tr id="filter_col2" data-column="2">
                                                <td align="center"><label for=""><?= lang('General.email'); ?></label></td>
                                                <td align="center"><input class="column_filter form-control" id="col2_filter" type="text"></td>
                                            </tr>

                                            <tr id="filter_col3" data-column="3">
                                                <td align="center"><label for=""><?= lang('General.role'); ?></label></td>
                                                <td align="center">
                                                    <input class="column_filter form-control" id="col3_filter" type="hidden">
                                                    <select id="custom_group_filter" class="form-control">
                                                        <option value=""><?= lang('General.all'); ?></option>
                                                        <?php foreach ($groups as $group) : ?>
                                                            <option value="<?=  $group['id'] ?>"><?=  $group['name'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr id="filter_col4" data-column="4">
                                                <td align="center"><label for=""><?= lang('General.status'); ?></label></td>
                                                <td align="center">
                                                    <input class="column_filter form-control" id="col4_filter" type="hidden">
                                                    <select id="custom_status_filter" class="form-control">
                                                        <option value=""><?= lang('General.all'); ?></option>
                                                        <option value="1"><?= lang('General.active'); ?></option>
                                                        <option value="10"><?= lang('General.inactive'); ?></option>
                                                    </select>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="box-body">
                                <table id="user-table" class="table table-bordered table-hover table-responsive">
                                    <thead>
                                        <tr>
                                            <th><?= lang('User.first_name'); ?></th>
                                            <th><?= lang('User.last_name'); ?></th>
                                            <th><?= lang('General.email'); ?></th>
                                            <th><?= lang('General.role'); ?></th>
                                            <th><?= lang('General.status'); ?></th>
                                            <th><?= lang('General.created_at'); ?></th>
                                            <th><?= lang('General.last_login'); ?></th>
                                            <th><?= lang('General.actions'); ?></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->

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

    #user-table {
        table-layout: fixed;
        width: 100% !important;
    }

    #user-table td,
    #user-table th {
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


        $('#user-table').DataTable({

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

            columns: [
                {data: "first_name"},
                {data: "last_name"},
                {data: "email"},
                {data: "groups"},
                {data: "active"},
                {data: "created_at"},
                {data: "last_login"},
                {data: "actions"}

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

                {orderable: false, targets: [3, 7]} , { visible: false, targets: [6] }
            ],

            aaSorting: [[5, 'desc']],

            ajax: {
                url: "<?php echo base_url() . '/admin/getUsersByAjax' ?>", // json datasource
                type: "post",
                complete: function (res) {
                    getConfirm();
                }

  
            }

        });
    });
</script>


<script>
    /*column toggle*/
    $(function () {

        var table = $('#user-table').DataTable();

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

        $('#user-table').DataTable().column(i).search(
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
        $('#custom_group_filter').on('change', function () {
            $('#col3_filter').val($('#custom_group_filter').val());
            filterColumn(3);

        });
        /*-----------------------------*/
        /*-----------------------------*/
        $('#custom_status_filter').on('change', function () {

            if ($('#custom_status_filter').val() == 'all') {
                $('#col4_filter').val('');
                filterColumn(4);
            } else {
                $('#col4_filter').val($('#custom_status_filter').val());
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
                title: "<?= lang('swal_title_text') ?>",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "<?= lang('swal_confirm_button_text') ?>",
                cancelButtonText: "<?= lang('swal_cancel_button_text') ?>",
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

        $('.password_confirmation').click(function (e) {

            e.preventDefault();

            var href = $(this).attr('href');

            swal({
                title: "<?= lang('swal_password_title_text') ?>",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "<?= lang('swal_password_confirm_button_text') ?>",
                cancelButtonText: "<?= lang('swal_password_cancel_button_text') ?>",
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