<?= $this->extend('master') ?>
<?= $this->section('content') ?> 

<div class="container">

    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left"><?= lang('faq.faqs'); ?></h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="/"><?= lang('faq.home'); ?></a></li>
                    <li class="breadcrumb-item active"><?= lang('faq.faq_list'); ?></li>
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
                    <h4 class="page-title float-left m-b-10"><small><?= lang('faq.faq_list'); ?></small></h4>
                    <a class="btn btn-primary float-right"href="<?= base_url('addfaq'); ?>"><?= lang('faq.create_faq'); ?>&nbsp;<span class="icon"><i class="fa fa-plus"></i></span></a>

                    <!-- Main content -->

                    <div class="col-xs-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <div>
                                    <table style="width: 67%; margin: 5em auto 2em auto;" cellspacing="1" cellpadding="3" border="0">
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="box-body">
                           
                                <table id="faq-table" class="table table-bordered table-hover table-responsive">
                                    <thead>
                                        <tr>
                                            <th><?= lang('faq.question'); ?></th>
                                            <th><?= lang('faq.answer'); ?></th>
                                            <th><?= lang('faq.order'); ?></th>
                                            <th><?= lang('faq.create_date'); ?></th>
                                            <th><?= lang('faq.action'); ?></th>
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


        $('#faq-table').DataTable({
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
                {data: "question"},
                {data: "answer"},
                {data: "in_order"}, //0
                {data: "created_at"}, //0
                {data: "faq_id"}, //0

            ],
            
            

            "columnDefs": [
                {
                    "render": function ( data, type, row ) {
                         return '<a class="btn btn-success edit" href="<?=base_url('faqedit')?>/'+row["faq_id"]+'">Edit</a>  <a class="btn btn-success edit" href="<?=base_url('faqdelete')?>/'+row["faq_id"]+'">Delete</a>';
                         
                    },
                    "targets": 4
                },
                {
                    "render": function ( data, type, row ) {
                         return '<a class="btn btn-success edit" href="<?=base_url('faqedit')?>/'+row["faq_id"]+'">Edit</a>  <a class="btn btn-success edit" href="<?=base_url('faqdelete')?>/'+row["faq_id"]+'">Delete</a>';
                         
                    },
                    "targets": 4
                },
               
            ],
                
            
            aaSorting: [[1, 'desc']],

            ajax: {
                url: "<?php echo base_url('getFaqByAjax')?>",   
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