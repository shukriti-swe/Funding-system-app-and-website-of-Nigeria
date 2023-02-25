<?= $this->extend('master') ?>
<?= $this->section('content') ?> 
<style>
    .table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid white !important;
    text-align: left;
    font-size: 16px;
}
.table td, .table th {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid white !important;
}
</style>
<div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">

                                <small><?= lang('report.thrift2win');?> - </small>
                                <small><?=$thrift['mem_id_num']?></small>
                                
                        </h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a
                                        href="#"><?= lang('report.thrift');?></a>
                            </li>
                            <li class="breadcrumb-item active"><?= lang('report.thrift_details');?></li>
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
                                                <h3 class="m-t-0 header-title">Thrifter Details</h3>
                                                 
                                            </div>
                                            <div class="box-body">
                                                <table class="table  table-hover table-responsive" style="    width: 100%;">
                                                    <thead>
                                                        <th><?= lang('report.thrifter_name');?> :</th>
                                                        <th><?=$thrift['first_name']." ".$thrift['last_name']?></th>
                                                    </thead>
                                                    <thead>
                                                        <th><?= lang('report.phone_number');?> :</th>
                                                        <th><?=$thrift['phone']?></th>
                                                    </thead>
                                                    <thead>
                                                        <th><?= lang('report.age');?>:</th>
                                                        <th><?=$thrift['user_age']?></th>
                                                    </thead>
                                                    <thead>
                                                        <th><?= lang('report.gender');?>:</th>
                                                        <th><?=$thrift['user_gender']?></th>
                                                    </thead>
                                                    
                                                    <thead>
                                                        <th><?= lang('report.email');?> :</th>
                                                        <th><?=$thrift['email']?></th>
                                                           
                                                    </thead>
                                                    
                                                  
                                                </table>
                                            </div>
                                             <br>
                                             <br>
                                            <div class="box-body">
                                            <h3 class="m-t-0 header-title"><?= lang('report.thrift_list');?> </h3>
                                                <table id="thrift-members"
                                                       class="table table-bordered table-hover table-responsive ">
                                                    <thead>
                                                    <tr>
                                                        <th><?= lang('report.thrift_group_number');?></th>
                                                        <th><?= lang('report.status');?></th>
                                                        <th><?= lang('report.thrift_name');?></th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                            
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
        <script>
    $(document).ready(function () {
        

        var loading_image_src = '<?php echo base_url() ?>' + 'base_demo_images/loading.gif';
       var loading_image = '<img src="' + loading_image_src + ' ">';
        var loading_span = '<span><i class="fa fa-refresh fa-spin fa-4x" aria-hidden="true"></i></span> ';
        var loading_text = "<div style='font-size:larger' >text</div>";


        $('#thrift-members').DataTable({
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
                {data: "thrift_group_number"},
                {data: "status"},
                {data: "thrift_name"}, //0

            ],
            

            "columnDefs": [
                {
                    "render": function ( data, type, row ) {
                          var start_date= row.thrift_group_start_date;
                         var end_date= row.thrift_group_end_date;
                         let today = new Date().toISOString().slice(0, 10)

                        if((today>=start_date) && (today<=end_date) ){
                            return '<span class="label label-primary statuss">Running</span>';
                        }else if(start_date>today){
                            return '<span class="label label-primary statuss">Not Started</span>';
                        }else if(end_date<today){
                            return '<span class="label label-primary statuss">Complete</span>';
                        }
                        
                    },
                    "targets": 1
                },
               
            ],
                
            
            aaSorting: [[1, 'desc']],

            ajax: {
                url: "<?php echo base_url('getthriftlistinfo/'.$thrift['id'])?>",   
                // json datasource
                type: "post",
                data: {},
                complete: function (res) {
                    
                    if(res.responseJSON.statuss=='Running'){
                    $('.statuss').text(res.responseJSON.statuss);
                    }else if(res.responseJSON.statuss=='Future'){
                    $('.statuss').text(res.responseJSON.statuss);
                    }else if(res.responseJSON.statuss=='Complete'){
                    $('.statuss').text(res.responseJSON.statuss);
                    }

                },


            }

        });
    });
</script>
<?= $this->endSection() ?>