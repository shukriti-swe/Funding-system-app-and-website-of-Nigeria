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

                                <small>Thrift2Win - </small>
                                <small><?=$thrift['thrift_group_number']?></small>
                                
                        </h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a
                                        href="#">Thrift</a>
                            </li>
                            <li class="breadcrumb-item active">Thrift Details</li>
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
                                                <h3 class="m-t-0 header-title">Thrift Deatails</h3>
                                                 
                                            </div>
                                            <div class="box-body">
                                                <table class="table  table-hover table-responsive" style="    width: 100%;">
                                                    <thead>
                                                        <th>Thrift Name :</th>
                                                        <th><?=$thrift['thrift_name']?></th>
                                                    </thead>
                                                    <thead>
                                                        <th>Thrift Group Number :</th>
                                                        <th><?=$thrift['thrift_group_number']?></th>
                                                    </thead>
                                                    <thead>
                                                        <th>Thrift Description :</th>
                                                        <th><?=$thrift['thrift_description']?></th>
                                                    </thead>
                                                    <thead>
                                                        <th>Thrift Group Term Duration :</th>
                                                        <th><?=$thrift['thrift_group_term_duration']?></th>
                                                    </thead>
                                                    
                                                    <thead>
                                                        <th>Thrift Group Product Price :</th>
                                                        <th><?php echo currency($thrift['thrift_group_product_price']); ?></th>
                                                           
                                                    </thead>
                                                    <thead>
                                                        <th>Thrift Group Start Date:</th>
                                                        <th><?php
                                                            $date=date_create($thrift['thrift_group_start_date']);
                                                            echo date_format($date,"d/m/Y");
                                                            ?>
                                                        </th>
                                                    </thead>
                                                    <thead>
                                                        <th>Created Member Name:</th>
                                                       <th><?=$thrift['created_member_name']?></th>
                                                    </thead>
                                                    <thead>
                                                        <th>Potential Winnings:</th>
                                                        <?php if (isset($potential_winnings)){?>
                                                       <th><?php echo currency($potential_winnings); ?></th>
                                                       <?php } else{?>
                                                        <th><?php echo currency(0); ?></th>
                                                        <?php } ?>
                                                    </thead>
                                                  
                                                </table>
                                            </div>
                                             <br>
                                             <br>
                                            <div class="box-body">
                                            <h3 class="m-t-0 header-title">Thrift Members</h3>
                                                <table id="thrift-members"
                                                       class="table table-bordered table-hover table-responsive ">
                                                    <thead>
                                                    <tr>
                                                        <th>Thrift Group Member Join Date</th>
                                                        <th>member Id Number</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>User Gender</th>
                                                        <th>created Member Name</th>
                                                        <!-- <th>Created Member Avatar</th> -->
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
                            <br>
                            <br><br>
                            <section class="">
                        <div class="">
                            <div class="col-xs-12">
                                <div class="box box-primary">
                                    
                                    <div class="box-body">
                                        <h3 class="m-t-0 header-title">Invatation Users</h3>
                                        <table id="invatationUsers" class="table table-bordered table-hover table-responsive ">
                                            <thead>
                                                <tr>
                                                    <th>Invited email</th>
                                                    <th>Invited date</th>
                                                    <th>Join status</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>

                                </div>
                                
                            </div>
                            
                        </div>
                       
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
                // {data: "id"},
                {data: "thrift_group_member_join_date"},
                {data: "mem_id_num"}, //0
                {data: "email"},              //2
                {data: "phone"}, 
                {data: "user_gender"},    
                {data: "created_member_name"},

            ],
            

            
            aaSorting: [[1, 'desc']],

            ajax: {
                url: "<?php echo base_url('getthriptmember/'.$thrift_group_id)?>",   
                // json datasource
                type: "post",
                data: {},
                complete: function (res) {
                    //do somthing on complete

                },


            }

        });

        $('#invatationUsers').DataTable({
            
            columns: [
                {data: "invited_email"},
                {data: "invited_date"},
                {data: "is_join"},
                // {data: "join_status"},
            ],

            "columnDefs": [
                {
                    "render": function ( data, type, row ) {
                        if(row['is_join'] == 0){
                            return 'pending';
                        }else{
                            return 'join';
                        }
                    },
                    "targets": 2
                },
                {orderable: false, targets: []},
                {visible: false, targets: []}
            ],
            aaSorting: [[1, 'asc']],

            ajax: {
                url: "<?php echo base_url('invatation_users/'.$thrift_group_id) ?>",
                type: "post",
                data: {},
                complete: function(res) {

                },
            }

        });
    });
</script>
<?= $this->endSection() ?>