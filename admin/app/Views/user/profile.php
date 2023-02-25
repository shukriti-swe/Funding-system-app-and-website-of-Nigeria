<?= $this->extend('master') ?>
<?= $this->section('content') ?>

<div class="container">

    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left"><?= lang('General.profile'); ?></h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() . '/dashboard'; ?>"><?= lang('General.home'); ?></a></li>
                    <li class="breadcrumb-item active"><?= lang('General.profile'); ?></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="box box-primary">
                            <div class="box-body box-profile box-widget widget-user-2">
                                <div class="widget-user-header  custom-user-background">
                                     
                                    <img class="profile-user-img img-responsive img-circle"
                                         style="max-width:100%;"
                                         src="<?= ($user['user_profile_image']) ? $user['user_profile_image'] : base_url().'/assets/backend_assets/images/users/avatar-1.jpg' ?>"
                                         alt="User profile picture">
                                    
                                </div>
                                <ul><h5 class="text-muted text-center"><strong><?= $user['first_name'].' '.$user['last_name']; ?></strong></h5></ul>
                            </div>
                            

                            
                        </div>
                    </div>


                    <div class="col-lg-8 col-md-6">
                        
                        <div class="box-header with-border">
                            <div class="text-center">
                                <h3 class="box-title"><?= lang('General.personal_info'); ?></h3>
                            </div> 
                        </div>

                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="card">

                                    <div class="card-header">
                                        <div class="col-md-12 m-b-30">
                                            <div class="col-md-4 pull-left">
                                                <strong><i class="fa fa-info-circle margin-r-5"></i><span class="m-l-5"><?= lang('General.basic_info'); ?></span></strong>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="col-md-12 m-b-30">
                                                <div class="col-md-4 pull-left">
                                                    <strong><i class="fa fa-user margin-r-5"></i><span class="m-l-5"><?= lang('General.name'); ?></span></strong>
                                                </div>
                                                <div class="col-md-8 pull-right"><?= $user['first_name'].' '.$user['last_name']; ?></div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="col-md-12 m-b-30">
                                                <div class="col-md-4 pull-left">
                                                    <strong><i class="fa fa-briefcase margin-r-5"></i><span class="m-l-5"><?= lang('General.member_id'); ?></span></strong>
                                                </div>
                                                <div class="col-md-8 pull-right"><?= $user['mem_id_num']; ?></div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="col-md-12 m-b-30">
                                                <div class="col-md-4 pull-left">
                                                    <strong><i class="fa fa-clock-o margin-r-5"></i><span class="m-l-5"><?= lang('General.dob'); ?></span></strong>
                                                </div>
                                                <div class="col-md-8 pull-right"><?= date('d-m-Y', strtotime($user['user_dob'])); ?></div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="col-md-12 m-b-30">
                                                <div class="col-md-4 pull-left">
                                                    <strong><i class="fa fa-envelope-square margin-r-5"></i><span class="m-l-5"><?= lang('General.email'); ?></span></strong>
                                                </div>
                                                <div class="col-md-8 pull-right"><?= $user['email']; ?></div>
                                            </div>
                                        </li> 
                                        <li class="list-group-item">
                                            <div class="col-md-12 m-b-30">
                                                <div class="col-md-4 pull-left">
                                                    <strong><i class="fa fa-mobile-phone margin-r-5"></i><span class="m-l-5"><?= lang('General.phone'); ?></span></strong>
                                                </div>
                                                <div class="col-md-8 pull-right"><?= $user['phone']; ?></div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>

                                <br>


                                <div class="card">

                                    <div class="card-header">
                                        <div class="col-md-12 m-b-30">
                                            <div class="col-md-4 pull-left">
                                                <strong><i class="fa fa-info-circle margin-r-5"></i><span class="m-l-5"><?= lang('General.other_info'); ?></span></strong>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="col-md-12 m-b-30">
                                                <div class="col-md-4 pull-left">
                                                    <strong><i class="fa fa-user margin-r-5"></i><span class="m-l-5"><?= lang('General.running_thrifts'); ?></span></strong>
                                                </div>
                                                <div class="col-md-8 pull-right"><?= $running_thrift; ?></div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="col-md-12 m-b-30">
                                                <div class="col-md-4 pull-left">
                                                    <strong><i class="fa fa-briefcase margin-r-5"></i><span class="m-l-5"><?= lang('General.completed_thrifts'); ?></span></strong>
                                                </div>
                                                <div class="col-md-8 pull-right"><?= $complete_thrift; ?></div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="col-md-12 m-b-30">
                                                <div class="col-md-4 pull-left">
                                                    <strong><i class="fa fa-clock-o margin-r-5"></i><span class="m-l-5"><?= lang('General.current_balance'); ?></span></strong>
                                                </div>
                                                <div class="col-md-8 pull-right"><?= $available_balance; ?></div>
                                            </div>
                                        </li>
                                        <!-- <li class="list-group-item">
                                            <div class="col-md-12 m-b-30">
                                                <div class="col-md-4 pull-left">
                                                    <strong><i class="fa fa-envelope-square margin-r-5"></i><span class="m-l-5"><?//= lang('General.email'); ?></span></strong>
                                                </div>
                                                <div class="col-md-8 pull-right"><?//= $user['email']; ?></div>
                                            </div>
                                        </li> 
                                        <li class="list-group-item">
                                            <div class="col-md-12 m-b-30">
                                                <div class="col-md-4 pull-left">
                                                    <strong><i class="fa fa-mobile-phone margin-r-5"></i><span class="m-l-5"><?//= lang('General.phone'); ?></span></strong>
                                                </div>
                                                <div class="col-md-8 pull-right"><?//= $user['phone']; ?></div>
                                            </div>
                                        </li> -->
                                    </ul>
                                </div>

                            </div>
                          
                            <!-- /.box-body -->
                        </div>
                        
                        <!-- /.box -->
                    </div>
                    <h4 class="page-title float-left m-b-10"><?= lang('General.current_thrifts'); ?></h4>
                    <table id="thrift-table" class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th><?= lang('General.thrift_id'); ?></th>
                                <th><?= lang('General.thrift_name'); ?></th>
                                <th><?= lang('General.start_date'); ?></th>
                                <th><?= lang('General.end_date'); ?></th>
                                <th><?= lang('General.user_name'); ?></th>
                                <th><?= lang('General.email'); ?></th>
                            </tr>
                        </thead>
                    </table>

                    <!-- /.col -->
                </div>
            </div>
        </div>
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

    #faq-table {
        table-layout: fixed;
        width: 100% !important;
    }

    #faq-table td,
    #faq-table th {
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
                {data: "thrift_name"},
                {data: "thrift_group_start_date"}, //0
                {data: "thrift_group_end_date"}, //0
                {data: "user_name"}, //0
                {data: "email"}, //0

            ],
            
            

            "columnDefs": [

               
            ],
                
            
            aaSorting: [[1, 'desc']],

            ajax: {
                url: "<?php echo base_url('getThriftsByAjax/'.$user['id'])?>",   
                // json datasource
                type: "post",
                data: {},
                complete: function (res) {
                 

                },


            }

        });
    });
</script>

<?= $this->endSection() ?>