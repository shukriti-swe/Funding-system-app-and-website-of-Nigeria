<?= $this->extend('master') ?>
<?= $this->section('content') ?> 
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">
                <?= lang('setting.email_templates');?>

                </h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#"><?= lang('setting.home');?></a></li>
                    <li class="breadcrumb-item active"><?= lang('setting.email_templates');?></li>
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

                    <div class="box box-primary">
                        <div class="box-header with-border"> 

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

                        </div>
                    </div>
                    
                    <h4 class="page-title float-left"><?= lang('setting.all_email_templates');?></h4>
                    <a class="btn btn-primary float-right"href="<?= base_url('emailtemplate/create'); ?>"><?= lang('master.create_template'); ?>&nbsp;<span class="icon"><i class="fa fa-plus"></i></span></a>


                    <!-- Main content -->
                    <section class="content">
                        <div>
                            <div class="col-xs-12">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <table id="email-template-datatable"
                                               class="table table-striped table-bordered table-hover table-responsive">
                                            <thead>
                                            <tr>
                                                <!--<th><?/*= lang('column_serial_text'); */?></th>-->
                                                <th><?= lang('setting.template_type');?></th>
                                                <th><?= lang('setting.templates_subject');?></th>
                                                <th><?= lang('setting.action');?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                
                                            <?php 
                                            if($email_template){
                                            
                                                $i=0;
                                            foreach($email_template as $email){
                                            ?>
                                          
                                                <tr>
                                                  
                                                    <td><?=$email['email_template_type']?></td>
                                                    <td><?=$email['email_template_subject']?></td>

                                                    <td> &nbsp;
                                                        <a title="text" style="color: #2b2b2b" href="<?=base_url('editemailtemplate/'.$email['email_template_id']);?>"
                                                            class=""><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a> &nbsp;
                                                    </td>
                                                </tr>
                                            <?php
                                               }
                                            }
                                            ?>
                                            </tbody>
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


<script type="text/javascript">
    $(document).ready(function () {

    });
</script>


<script>
    $('.confirmation').click(function (e) {
        var href = $(this).attr('href');

        swal({
                title: "<?php echo lang('swal_title')?>",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "<?php echo lang('swal_confirm_button_text')?>",
                cancelButtonText: "<?php echo lang('swal_cancel_button_text')?>",
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
</script>

<?= $this->endSection() ?>