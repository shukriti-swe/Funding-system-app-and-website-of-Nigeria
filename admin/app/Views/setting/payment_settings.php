<?= $this->extend('master') ?>
<?= $this->section('content') ?> 
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">
                <?= lang('setting.payment_settings');?>

                </h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a
                                href="#"><?= lang('setting.home');?></a>
                    </li>
                    <li class="breadcrumb-item"><a
                                href="#"><?= lang('setting.settings');?></a>
                    </li>
                    <li class="breadcrumb-item active"><?= lang('setting.payment_settings');?></li>
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
              
                       
             
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">

                            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                    <?php if(!empty($success)){ ?>
                                        <div class=" col-md-offset-2 col-md-12"
                                             style="color: darkgreen;font-size: larger">

                                        
                                                <div class="text-center alert alert-success alert-dismissible fade show"
                                                     role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button> <?=$success?>
                                                </div>
                                           
                                        </div>
                                    <?php }?>  
                                    </div>
                                   
                                    <form action="<?php echo base_url('paymentsettings')?>"role="form"
                                          id="" method="post" enctype="multipart/form-data">
                                        <div class="box-body">
                                        <?php 
                                        if($payments_setting){
                                            $payment = json_decode($payments_setting['settings_value'],true);

                                        }
                                        ?>
                                            <div style="font-size: larger;color: #2b2b2b">
                                            <?= lang('setting.paystack');?>
                                            </div>
                                            <hr>

                                            <div class="form-group">
                                                <label for="paystack_test_mode"><?= lang('setting.paystack_test_mode');?>
                                                    &nbsp;
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Text"></i>
                                                            </span>
                                                </label>

                                                <select class="form-control" name="paystack_test_mode" id="">
                                                    <option value="On" <?php if($payment['paystack_test_mode']=='On'){echo "selected";}?>><?= lang('setting.on');?></option>
                                                    <option value="Off" <?php if($payment['paystack_test_mode']=='Off'){echo "selected";}?>><?= lang('setting.off');?></option>
                                                </select>

                                                <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                if ($validation->hasError('paystack_test_mode')) {
                                                    echo $validation->getError('paystack_test_mode');
                                                }
                                                } ?></p>

                                            </div>

                                            <div class="form-group">
                                                <label for="paystack_test_secret_key"><?= lang('setting.paystack_test_secret_key');?> <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Text"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="paystack_test_secret_key" class="form-control"
                                                       id=""
                                                       value="<?php if($payment['paystack_test_secret_key']){echo $payment['paystack_test_secret_key'];}?>"
                                                       placeholder="<?= lang('setting.paystack_test_secret_key');?>">

                                                <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                if ($validation->hasError('paystack_test_secret_key')) {
                                                    echo $validation->getError('paystack_test_secret_key');
                                                }
                                                } ?></p>
                                            </div>

                                            <div class="form-group">
                                                <label for="paystack_test_public_key"><?= lang('setting.paystack_test_public_key');?><span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="text"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="paystack_test_public_key" class="form-control"
                                                       id=""
                                                       value="<?php if($payment['paystack_test_public_key']){echo $payment['paystack_test_public_key'];}?>"
                                                       placeholder="<?= lang('setting.paystack_test_public_key');?>">
                                                
                                                <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                if ($validation->hasError('paystack_test_public_key')) {
                                                    echo $validation->getError('paystack_test_public_key');
                                                }
                                                } ?></p>

                                            </div>

                                            <div class="form-group">
                                                <label for="paystack_live_secret_key"><?= lang('setting.paystack_live_secret_key');?><span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="text"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="paystack_live_secret_key" class="form-control"
                                                       id=""
                                                       value="<?php if($payment['paystack_live_secret_key']){echo $payment['paystack_live_secret_key'];}?>"
                                                       placeholder="<?= lang('setting.paystack_live_secret_key');?>">

                                                       
                                                <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                if ($validation->hasError('paystack_live_secret_key')) {
                                                    echo $validation->getError('paystack_live_secret_key');
                                                }
                                                } ?></p>

                                            </div>

                                            <div class="form-group">
                                                <label for="paystack_live_public_key"><?= lang('setting.paystack_live_public_key');?>
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="text"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="paystack_live_public_key" class="form-control"
                                                       id=""
                                                       value="<?php if($payment['paystack_live_public_key']){echo $payment['paystack_live_public_key'];}?>"
                                                       placeholder="<?= lang('setting.paystack_live_public_key');?>">

                                            <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                            if ($validation->hasError('paystack_live_public_key')) {
                                                echo $validation->getError('paystack_live_public_key');
                                            }
                                            } ?></p>

                                            </div>

                                          
                                        </div>
                                        <!-- /.box-body -->

                                        <div class="box-footer">
                                            <button type="submit" id="" class="btn btn-primary"><?= lang('setting.update_payment_setting');?></button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                            </div>


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
</div>
<?= $this->endSection() ?>

