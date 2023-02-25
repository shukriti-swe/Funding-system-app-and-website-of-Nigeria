<?= $this->extend('master') ?>
<?= $this->section('content') ?> 
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">
                    
                </h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a
                                href="product_module/all_product_info">Text</a>
                    </li>
                    <li class="breadcrumb-item"><a
                                href="users/auth/show_user_groups">Text</a>
                    </li>
                    <li class="breadcrumb-item active">Text</li>
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
                   
                        <div class="col-md-6">
                            <div class="panel panel-success copyright-wrap" id="add-success-panel">
                                <div class="panel-heading">Text
                                    <button type="button" class="close" data-target="#add-success-panel"
                                            data-dismiss="alert"><span
                                                aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                                    </button>
                                </div>
                                <div class="panel-body">Text
                                </div>
                            </div>
                        </div>
                   
                        <br>
                        <div class="col-md-6">
                            <div class="panel panel-success copyright-wrap" id="update-success-panel">
                                <div class="panel-heading">Text
                                    <button type="button" class="close" data-target="#update-success-panel"
                                            data-dismiss="alert"><span
                                                aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                                    </button>
                                </div>
                                <div class="panel-body">Text
                                </div>
                            </div>
                        </div>
                  
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">

                            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h5 class="box-title">Text</h5>

                                        <div class=" col-md-offset-2 col-md-8" style="color: darkred;font-size: larger">
                                           
                                        </div>
                                        <div class="col-md-2"></div>

                                        <div class=" col-md-offset-2 col-md-12"
                                             style="color: darkgreen;font-size: larger">

                                            
                                                <div class="text-center alert alert-success alert-dismissible fade show"
                                                     role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                       
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <!-- form start -->
                                    <form action="<?php echo base_url() . 'settings_module/update_prosperisgold_settings' ?>"
                                          role="form"
                                          id="" method="post" enctype="multipart/form-data">
                                        <div class="box-body">

                                            <hr>
                                            <div style="font-size: larger;color: #2b2b2b">Text</div>
                                            <hr>

                                            <div class="form-group">
                                                <label for="mailchimp_api_key">Text</label>

                                                <input type="text" name="mailchimp_api_key" class="form-control"
                                                       id="mailchimp_api_key"
                                                       value=""
                                                       placeholder="Text">
                                            </div>
                                            <div class="form-group">
                                                <label for="thrift_percentage">Text</label>

                                                <input type="text" name="mailchimp_thrifter_list_name" class="form-control"
                                                       id="mailchimp_thrifter_list_name"
                                                       value=""
                                                       placeholder="Text">
                                            </div>

                                            <br>
                                            <hr>
                                            <div style="font-size: larger;color: #2b2b2b">
                                            Text
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="thrift_percentage">Text
                                                    &nbsp;
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Text"></i>
                                                            </span>
                                                </label>
                                                <div>
                                                    <input type="checkbox" name="stop_new_thrift" class=""
                                                           id="stop_new_thrift"
                                                        >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="thrift_warning_1_title">Text<span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Text">

                                                                </i>
                                                            </span>
                                                </label>

                                                <input type="text" name="thrift_warning_1_title" class="form-control"
                                                       id="thrift_warning_1_title"
                                                       value=""
                                                       placeholder="Text">
                                            </div>
                                            <div class="form-group">
                                                <label for="thrift_warning_1_message">Text
                                         
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Text">

                                                                </i>
                                                            </span>
                                                </label>

                                                <input type="text" name="thrift_warning_1_message" class="form-control"
                                                       id="thrift_warning_1_message"
                                                       value=""
                                                       placeholder="Text">
                                            </div>
                                            <div class="form-group">
                                                <label for="paystack_fees"><span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Text"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="paystack_fees" class="form-control"
                                                       id="paystack_fees"
                                                       value=""
                                                       placeholder="Text">
                                            </div>

                                            <div class="form-group">
                                                <label for="prosperisgold_loan_fees">Text
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Text"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="prosperisgold_loan_fees" class="form-control"
                                                       id="prosperisgold_loan_fees"
                                                       value=""
                                                       placeholder="Text">
                                            </div>

                                            <div class="form-group">
                                                <label for="thrift_percentage">Text<span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Text"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="thrift_percentage" class="form-control"
                                                       id="thrift_percentage"
                                                       value=""
                                                       placeholder="Text">
                                            </div>

                                            <div class="form-group">
                                                <label for="thrift_percentage">Text<span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Text"></i>
                                                            </span>
                                                </label>
                                                <div>
                                                    <input type="checkbox" name="allow_inter_org_thrift" class=""
                                                           id="allow_inter_org_thrift"
                                                       >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="thrift_percentage">Text<span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title=""></i>
                                                            </span>
                                                </label>
                                                <div>
                                                    <input type="checkbox" name="auto_approve_thrifter_account" class=""
                                                           id="auto_approve_thrifter_account"
                                                        >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="custom_thrift_start_delay">Text<span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Text"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="custom_thrift_start_delay" class="form-control"
                                                       id="custom_thrift_start_delay"
                                                       value=""
                                                       placeholder="Text">
                                            </div>

                                            <div class="form-group">
                                                <label for="custom_thrift_max_start_time_from_delay">Text
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title=""></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="custom_thrift_max_start_time_from_delay"
                                                       class="form-control"
                                                       id="custom_thrift_max_start_time_from_delay"
                                                       value=""
                                                       placeholder="">
                                            </div>

                                            <div class="form-group">
                                                <label for="loan_thrift_start_delay">Text<span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Text"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="loan_thrift_start_delay" class="form-control"
                                                       id="loan_thrift_start_delay"
                                                       value="Text"
                                                       placeholder="Text">
                                            </div>

                                            <div class="form-group">
                                                <label for="loan_thrift_max_start_time_from_delay">Text<span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Text"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="loan_thrift_max_start_time_from_delay"
                                                       class="form-control"
                                                       id="loan_thrift_max_start_time_from_delay"
                                                       value="Text"
                                                       placeholder="Text">
                                            </div>

                                            <div class="form-group">
                                                <label for="individual_thrift_start_delay">Text<span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Text"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="individual_thrift_start_delay"
                                                       class="form-control"
                                                       id="individual_thrift_start_delay"
                                                       value="Text"
                                                       placeholder="Text">
                                            </div>

                                            <div class="form-group">
                                                <label for="individual_thrift_max_start_time_from_delay">Text<span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Text"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="individual_thrift_max_start_time_from_delay"
                                                       class="form-control"
                                                       id="individual_thrift_max_start_time_from_delay"
                                                       value="Text"
                                                       placeholder="Text">
                                            </div>

                                            <div class="form-group">
                                                <label for="individual_thrift_minimum_payment_number">Text<span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Text"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="individual_thrift_minimum_payment_number"
                                                       class="form-control"
                                                       id="individual_thrift_minimum_payment_number"
                                                       value="Text"
                                                       placeholder="Text">
                                            </div>

                                            <div class="form-group">
                                                <label for="individual_thrift_maximum_payment_number">Text<span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Text"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="individual_thrift_maximum_payment_number"
                                                       class="form-control"
                                                       id="individual_thrift_maximum_payment_number"
                                                       value="Text"
                                                       placeholder="Text">
                                            </div>

                                            <div class="form-group">
                                                <label for="thrift_threshold_time">Text<span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Text"></i>
                                                            </span>
                                                </label>

                                                <input type="text" name="thrift_threshold_time" class="form-control"
                                                       readonly
                                                       id="thrift_threshold_time"
                                                       value="Text"
                                                       placeholder="Text">
                                            </div>

                                        </div>
                                        <!-- /.box-body -->

                                        <br>
                                        <hr>
                                        <div style="font-size: larger;color: #2b2b2b">
                                        Text
                                        </div>
                                        <hr>


                                        <!--admin st -->
                                        <div class="form-group">
                                            <label>Text</label>
                                            <input type="text"
                                                   class="colorpicker-default form-control colorpicker-element"
                                                   name="office_chosen_color" value="Text">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Text</label>
                                            <input type="text"
                                                   class="colorpicker-default form-control colorpicker-element"
                                                   name="office_chosen_color_deeper" value="Text">
                                            
                                        </div>
                                        <!--admin en -->

                                        <!--partner st -->
                                        <div class="form-group">
                                            <label>Text</label>
                                            <input type="text"
                                                   class="colorpicker-default form-control colorpicker-element"
                                                   name="partner_chosen_color" value="Text">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Text</label>
                                            <input type="text"
                                                   class="colorpicker-default form-control colorpicker-element"
                                                   name="partner_chosen_color_deeper" value="Text">
                                            
                                        </div>
                                        <!--partner en -->

                                        <!--thrift st -->
                                        <div class="form-group">
                                            <label>Text</label>
                                            <input type="text"
                                                   class="colorpicker-default form-control colorpicker-element"
                                                   name="thrift_chosen_color" value="Text">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Text</label>
                                            <input type="text"
                                                   class="colorpicker-default form-control colorpicker-element"
                                                   name="thrift_chosen_color_deeper" value="Text">
                                            
                                        </div>
                                        <!--thrift en -->

                                        <!--trustee st -->
                                        <div class="form-group">
                                            <label>Text</label>
                                            <input type="text"
                                                   class="colorpicker-default form-control colorpicker-element"
                                                   name="trustee_chosen_color" value="Text">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Text</label>
                                            <input type="text"
                                                   class="colorpicker-default form-control colorpicker-element"
                                                   name="trustee_chosen_color_deeper" value="Text">
                                            
                                        </div>
                                        <!--trustee en -->


                                        <div class="box-footer">
                                            <button type="submit" id=""
                                                    class="btn btn-primary">Text
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

