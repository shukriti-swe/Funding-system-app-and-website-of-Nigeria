<?= $this->extend('master') ?>
<?= $this->section('content') ?> 
<!-- <div class="content-page"> -->
<!-- Start content -->
<!-- <div class="content"> -->
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">
                System Settings

                </h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a
                                href="product_module/all_product_info">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a
                                href="users/auth/show_user_groups">Settings</a>
                    </li>
                    <li class="breadcrumb-item active">System Settings</li>
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
                                        <div class="col-md-2"></div>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <!-- form start -->
                                    
                                    <?php 
                                        if($system_setting){
                                            $system = json_decode($system_setting['settings_value'],true);

                                        }
                                    ?>
                                    <form action="<?php echo base_url('systemsettings') ?>"
                                          role="form"
                                          id="" method="post" enctype="multipart/form-data">
                                        <div class="box-body">

                                            <hr>
                                            <div style="font-size: larger;color: #2b2b2b">
                                                <?php echo lang('mailchimp_separator_lang') ?>mailchimp
                                            </div>
                                            <hr>

                                            <div class="form-group">
                                                <label for="mailchimp_api_key">Mailchimp api key
                                                </label>

                                                <input type="text" name="mailchimp_api_key" class="form-control"
                                                       id="mailchimp_api_key"
                                                       value="<?php if($system['mailchimp_api_key']){echo $system['mailchimp_api_key'];}?>"
                                                       placeholder="">

                                                <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                if ($validation->hasError('mailchimp_api_key')) {
                                                    echo $validation->getError('mailchimp_api_key');
                                                }
                                                } ?></p>

                                            </div>
                                            <div class="form-group">
                                                <label for="thrift_percentage">Thrifter List name
                                                </label>

                                                <input type="text" name="mailchimp_thrifter_list_name" class="form-control"
                                                       id="mailchimp_thrifter_list_name"
                                                       value="<?php if($system['mailchimp_thrifter_list_name']){echo $system['mailchimp_thrifter_list_name'];}?>"
                                                       placeholder="<?php echo lang('placeholder_mailchimp_thrifter_list_name_text') ?>">

                                                <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                if ($validation->hasError('mailchimp_thrifter_list_name')) {
                                                    echo $validation->getError('mailchimp_thrifter_list_name');
                                                }
                                                } ?></p>

                                            </div>

                                            <br>
                                            <hr>
                                            <div style="font-size: larger;color: #2b2b2b">
                                            Thrift Settings
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="thrift_percentage">Stop New Thrift 
                                                    &nbsp;
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?= lang('tooltip_stop_new_thrift_text') ?>"></i>
                                                            </span>
                                                </label>
                                                <div>
                                                    <input type="checkbox" name="stop_new_thrift" value="1" class="" id="stop_new_thrift" <?php if($system['stop_new_thrift']==1){echo "checked";}?>>
                                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                    if ($validation->hasError('stop_new_thrift')) {
                                                        echo $validation->getError('stop_new_thrift');
                                                    }
                                                    } ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="thrift_warning_1_title">Warning Title
                                                    &nbsp;
                                                            <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?= lang('tooltip_thrift_warning_1_title_text') ?>">

                                                                </i>
                                                            </span>
                                                </label>

                                                <input type="text" name="thrift_warning_1_title" class="form-control"
                                                       id="thrift_warning_1_title"
                                                       value="<?php if($system['thrift_warning_1_title']){echo $system['thrift_warning_1_title'];}?>"
                                                       placeholder="<?php echo lang('placeholder_thrift_warning_1_title_text') ?>">

                                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                    if ($validation->hasError('thrift_warning_1_title')) {
                                                        echo $validation->getError('thrift_warning_1_title');
                                                    }
                                                    } ?></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="thrift_warning_1_message">Warning Message
                                                    &nbsp;
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?= lang('tooltip_thrift_warning_1_message_text') ?>">

                                                                </i>
                                                            </span>
                                                </label>

                                                <input type="text" name="thrift_warning_1_message" class="form-control"
                                                       id="thrift_warning_1_message"
                                                       value="<?php if($system['thrift_warning_1_message']){echo $system['thrift_warning_1_message'];}?>"
                                                       placeholder="<?php echo lang('placeholder_thrift_warning_1_title_message') ?>">

                                                       <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                    if ($validation->hasError('thrift_warning_1_message')) {
                                                        echo $validation->getError('thrift_warning_1_message');
                                                    }
                                                    } ?></p>

                                            </div>
                                            <div class="form-group">
                                                <label for="paystack_fees">Paystack fees percentage 
                                                    &nbsp;
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?= lang('tooltip_paystack_fees_text') ?>"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="paystack_fees" class="form-control"
                                                       id="paystack_fees"
                                                       value="<?php if($system['paystack_fees']){echo $system['paystack_fees'];}?>"
                                                       placeholder="<?php echo lang('placeholder_paystack_fees_text') ?>">

                                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                    if ($validation->hasError('paystack_fees')) {
                                                        echo $validation->getError('paystack_fees');
                                                    }
                                                    } ?></p>

                                            </div>

                                            <div class="form-group">
                                                <label for="prosperisgold_loan_fees">Loan commision percentage
                                                    &nbsp;
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?= lang('tooltip_prosperisgold_loan_fees_text') ?>"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="prosperisgold_loan_fees" class="form-control"
                                                       id="prosperisgold_loan_fees"
                                                       value="<?php if($system['prosperisgold_loan_fees']){echo $system['prosperisgold_loan_fees'];}?>"
                                                       placeholder="<?php echo lang('placeholder_prosperisgold_loan_fees_text') ?>">

                                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                    if ($validation->hasError('prosperisgold_loan_fees')) {
                                                        echo $validation->getError('prosperisgold_loan_fees');
                                                    }
                                                    } ?></p>

                                            </div>

                                            <div class="form-group">
                                                <label for="thrift_percentage">Thrift Percentage
                                                    &nbsp;
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?= lang('tooltip_thrift_percentage_text') ?>"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="thrift_percentage" class="form-control"
                                                       id="thrift_percentage"
                                                       value="<?php if($system['thrift_percentage']){echo $system['thrift_percentage'];}?>"
                                                       placeholder="<?php echo lang('placeholder_thrift_percentage_text') ?>">
                                                       
                                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                    if ($validation->hasError('paystack_live_public_key')) {
                                                        echo $validation->getError('paystack_live_public_key');
                                                    }
                                                    } ?></p>

                                            </div>

                                            <div class="form-group">
                                                <label for="thrift_percentage">Allow Inter Organization Thrift  
                                                    &nbsp;
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?= lang('tooltip_allow_inter_org_thrift_text') ?>"></i>
                                                            </span>
                                                </label>
                                                <div>
                                                    <input type="checkbox" name="allow_inter_org_thrift" class="" id="allow_inter_org_thrift" value="1" <?php if($system['allow_inter_org_thrift']==1){echo "checked";}?>>

                                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                    if ($validation->hasError('allow_inter_org_thrift')) {
                                                        echo $validation->getError('allow_inter_org_thrift');
                                                    }
                                                    } ?></p>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="thrift_percentage">Automatically Approve New Thrifter Account
                                                    &nbsp;
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?= lang('tooltip_auto_approve_thrifter_account_text') ?>"></i>
                                                            </span>
                                                </label>
                                                <div>
                                                    <input type="checkbox" name="auto_approve_thrifter_account" class=""
                                                           id="auto_approve_thrifter_account" value="1"  <?php if($system['auto_approve_thrifter_account']==1){echo "checked";}?>>

                                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                    if ($validation->hasError('auto_approve_thrifter_account')) {
                                                        echo $validation->getError('auto_approve_thrifter_account');
                                                    }
                                                    } ?></p>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="custom_thrift_start_delay"><?php echo lang('label_custom_thrift_start_delay_text') ?>
                                                    &nbsp;
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?= lang('tooltip_custom_thrift_start_delay_text') ?>"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="custom_thrift_start_delay" class="form-control"
                                                       id="custom_thrift_start_delay"
                                                       value="<?php if($system['custom_thrift_start_delay']){echo $system['custom_thrift_start_delay'];}?>"
                                                       placeholder="<?php echo lang('placeholder_custom_thrift_start_delay_text') ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="custom_thrift_max_start_time_from_delay"><?php echo lang('label_custom_thrift_max_start_time_from_delay_text') ?>
                                                    &nbsp;
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?= lang('tooltip_custom_thrift_max_start_time_from_delay_text') ?>"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="custom_thrift_max_start_time_from_delay"
                                                       class="form-control"
                                                       id="custom_thrift_max_start_time_from_delay"
                                                       value="<?php if($system['custom_thrift_max_start_time_from_delay']){echo $system['custom_thrift_max_start_time_from_delay'];}?>"
                                                       placeholder="<?php echo lang('placeholder_custom_thrift_max_start_time_from_delay_text') ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="loan_thrift_start_delay"><?php echo lang('label_loan_thrift_start_delay_text') ?>
                                                    &nbsp;
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?= lang('tooltip_loan_thrift_start_delay_text') ?>"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="loan_thrift_start_delay" class="form-control"
                                                       id="loan_thrift_start_delay"
                                                       value="<?php if($system['loan_thrift_start_delay']){echo $system['loan_thrift_start_delay'];}?>"
                                                       placeholder="<?php echo lang('placeholder_loan_thrift_start_delay_text') ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="loan_thrift_max_start_time_from_delay"><?php echo lang('label_loan_thrift_max_start_time_from_delay_text') ?>
                                                    &nbsp;
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?= lang('tooltip_loan_thrift_max_start_time_from_delay_text') ?>"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="loan_thrift_max_start_time_from_delay"
                                                       class="form-control"
                                                       id="loan_thrift_max_start_time_from_delay"
                                                       value="<?php if($system['loan_thrift_max_start_time_from_delay']){echo $system['loan_thrift_max_start_time_from_delay'];}?>"
                                                       placeholder="<?php echo lang('placeholder_loan_thrift_max_start_time_from_delay_text') ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="individual_thrift_start_delay"><?php echo lang('label_individual_thrift_start_delay_text') ?>
                                                    &nbsp;
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?= lang('tooltip_individual_thrift_start_delay_text') ?>"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="individual_thrift_start_delay"
                                                    class="form-control"
                                                    id="individual_thrift_start_delay"
                                                    value="<?php if($system['individual_thrift_start_delay']){echo $system['individual_thrift_start_delay'];}?>"
                                                    placeholder="<?php echo lang('placeholder_individual_thrift_start_delay_text') ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="individual_thrift_max_start_time_from_delay"><?php echo lang('label_individual_thrift_max_start_time_from_delay_text') ?>
                                                    &nbsp;
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?= lang('tooltip_individual_thrift_max_start_time_from_delay_text') ?>"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="individual_thrift_max_start_time_from_delay"
                                                       class="form-control"
                                                       id="individual_thrift_max_start_time_from_delay"
                                                       value="<?php if($system['individual_thrift_max_start_time_from_delay']){echo $system['individual_thrift_max_start_time_from_delay'];}?>"
                                                       placeholder="<?php echo lang('placeholder_individual_thrift_max_start_time_from_delay_text') ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="individual_thrift_minimum_payment_number"><?php echo lang('label_individual_thrift_minimum_payment_number_text') ?>
                                                    &nbsp;
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?= lang('tooltip_individual_thrift_minimum_payment_number_text') ?>"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="individual_thrift_minimum_payment_number"
                                                       class="form-control"
                                                       id="individual_thrift_minimum_payment_number"
                                                       value="<?php if($system['individual_thrift_minimum_payment_number']){echo $system['individual_thrift_minimum_payment_number'];}?>" placeholder="<?php echo lang('placeholder_individual_thrift_minimum_payment_number_text') ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="individual_thrift_maximum_payment_number"><?php echo lang('label_individual_thrift_maximum_payment_number_text') ?>
                                                    &nbsp;
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?= lang('tooltip_individual_thrift_maximum_payment_number_text') ?>"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="individual_thrift_maximum_payment_number"
                                                       class="form-control"
                                                       id="individual_thrift_maximum_payment_number"
                                                       value="<?php if($system['individual_thrift_maximum_payment_number']){echo $system['individual_thrift_maximum_payment_number'];}?>"
                                                       placeholder="<?php echo lang('placeholder_individual_thrift_maximum_payment_number_text') ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="thrift_threshold_time"><?php echo lang('label_thrift_threshold_time_text') ?>
                                                    &nbsp;
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?= lang('tooltip_thrift_threshold_time_text') ?>"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="thrift_threshold_time" class="form-control"
                                                       readonly
                                                       id="thrift_threshold_time"
                                                       value="<?php if($system['thrift_threshold_time']){echo $system['thrift_threshold_time'];}?>"
                                                       placeholder="<?php echo lang('placeholder_thrift_threshold_time_text') ?>">
                                            </div>

                                        </div>
                                       
                                        <!--trustee en -->


                                        <div class="box-footer">
                                            <button type="submit" id=""
                                                    class="btn btn-primary">Update System Setting
                                            </button>
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
<!-- </div> -->
<!-- </div> -->

<script>
    $(function () {

        $('#thrift_threshold_time').timepicker({
            minuteStep: 15,
            icons: {
                up: 'zmdi zmdi-chevron-up',
                down: 'zmdi zmdi-chevron-down'
            }
        });

        $('.colorpicker-default').colorpicker({
            format: 'hex'
        });

    });

</script>



<?= $this->endSection() ?>