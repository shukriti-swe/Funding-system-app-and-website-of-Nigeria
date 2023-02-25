<?= $this->extend('master') ?>
<?= $this->section('content') ?> 
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">

                        <h4 class="page-title float-left">
                        <?= lang('report.user_bvn');?>
                        </h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a
                                        href="/"><?= lang('report.home');?></a>
                            </li>
                            <li class="breadcrumb-item active"><?= lang('report.user_bvn_list');?></li>
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
                                                <h3 class="m-t-0 header-title"><?= lang('report.user_bvn_list_c');?></h3>

                                                <div>
                                                    <table style="width: 67%; margin: 0 auto 2em auto;" cellspacing="1"
                                                           cellpadding="3"
                                                           border="0">
                                                        <tbody>

                                                        <tr id="filter_col4" data-column="4">
                                                            <td align="center"><label
                                                                        for=""><?= lang('report.email');?></label>
                                                            </td>
                                                            <td align="center">
                                                                <input class="column_filter form-control"
                                                                       id="col4_filter" type="text">
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
                                                                    <option value="1"><?= lang('report.pending');?></option>
                                                                    <option value="2"><?= lang('report.processed');?></option>
                                                                    <option value="3"><?= lang('report.denied');?></option>
                                                                    <option value="4"><?= lang('report.canceled');?></option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>


                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="userbvn-table"
                                                       class="table table-bordered table-hover table-responsive ">
                                                    <thead>
                                                    <tr>
                                                        <!-- <th>Thrift Group ID</th> -->
                                                        <th>User Name</th>
                                                        <th>Bank Code</th>
                                                        <th>Account Number</th>
                                                        <th>Beneficiary</th>
                                                        <th>Email</th>
                                                        <th>Status</th>
                                                        
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
<!--  Modal content for the above example -->
<div id="status_modal_show" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
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
                        <th>Status :</th>
                        <th>Failure</th>
                    </tr>
                </thead>
                <tbody id="payment">
                   <tr>
                        <td>Report :</td>
                        <td id="report_shows">
                            
                        </td>
                    </tr>
                </tbody>
               
            </table>

         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


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

    #userbvn-table {
        table-layout: fixed;
        width: 100% !important;
    }

    #userbvn-table td,
    #userbvn-table th {
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


        $('#userbvn-table').DataTable({
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
                
       
                {data: "user_name"},    //0
                {data: "bank_code"}, //1
                {data: "account_number"},    //2
                {data: "beneficiary"},    //3
                {data: "email"},        //4
                {data: "status"},    //5

            ],

            "columnDefs": [
                {
                    "render": function ( data, type, row ) {
                        var url= '/admin/user/profile/'+row['user_id'];
                            return '<a href="<?=base_url()?>/'+url+'">'+row['user_name']+'</a>';
                    },
                    "targets": 0
                },
                {
                    "render": function ( data, type, row ) {
                        var url= '/admin/user/profile/'+row['user_id'];
                            return '<a href="<?=base_url()?>/'+url+'">'+row['email']+'</a>';
                    },
                    "targets": 4
                },
                {
                    "render": function ( data, type, row ) {
                        var status = '';
                        var icon = '';
                        if(row['status']==0){
                            var status = 'Pending';
                        }else if(row['status']==1){
                            var status = 'Processed'; 
                        }else if(row['status']==2){
                            var status = 'Denied';
                            var icon = '<i class="zmdi zmdi-info status_modal" data-id="'+row['id']+'" style="color:#e1970f; font-size:24px"</i>';
                        }else if(row['status']==3){
                            var status = 'Canceled';
                        }
                        return '<a class="btn btn-success edit" href="#">'+status+'</a> '+icon;

                    },
                    "targets": 5
                },
               
            ],

            aaSorting: [[0, 'asc']],

            ajax: {
                url: "<?php echo base_url('getalluserbvn') ?>",                  
                type: "post",
                data:{},
                complete: function (res) {

                }
            }

        });
    });
</script>


<script>

    $(function () {

        var table = $('#userbvn-table').DataTable();

        $('a.toggle-vis').on('click', function (e) {
            e.preventDefault();

            var column = table.column($(this).attr('data-column'));


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

        $('#userbvn-table').DataTable().column(i).search(
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
    $(document).on("click",".status_modal",function () {
            $('#status_modal_show').modal('show');
            var id = $(this).attr('data-id');
        
            $.ajax({
                url : "<?= base_url('getbvnstatusreport')?>",
                type : "post",
                data : {id : id},
                dataType : "json",
                success : function(data){
                    html = '<p>Event : '+data.event+'</p><p><b>Info</b></p><p>Customer code : '+data.data['customer_code']+'</p><p>customer_id : '+data.data['customer_id']+'</p><p>email : '+data.data['email']+'</p><p><b>identification</b></p><p>Country : '+data.data.identification['country']+'</p><p>Type :  '+data.data.identification['type']+'</p><p>Value :  '+data.data.identification['value']+'</p>';

                    $('#report_shows').html(html);
                }
            });
        });
</script>
<?= $this->endSection() ?>
