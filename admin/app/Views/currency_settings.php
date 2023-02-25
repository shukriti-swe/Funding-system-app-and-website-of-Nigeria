<!-- <div class="content-page"> -->
    <!-- Start content -->
    <!-- <div class="content"> -->
    <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">
                            <?php echo lang('page_title_text') ?>
                        </h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="#"><?php echo lang('breadcrumb_home_text') ?></a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo lang('breadcrumb_section_text') ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('breadcrumb_page_text') ?></li>
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

                            <?php if ($this->session->flashdata('group_add_success')) { ?>
                                
                                <div class="col-md-6">
                                    <div class="panel panel-success copyright-wrap" id="add-success-panel">
                                        <div class="panel-heading"><?php echo lang('successfull_text') ?>
                                            <button type="button" class="close" data-target="#add-success-panel" data-dismiss="alert"><span
                                                        aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                                            </button>
                                        </div>
                                        <div class="panel-body"><?php echo lang('add_successfull_text') ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('group_update_success')) { ?>
                                <br>
                                <div class="col-md-6">
                                    <div class="panel panel-success copyright-wrap" id="update-success-panel">
                                        <div class="panel-heading"><?php echo lang('successfull_text') ?>
                                            <button type="button" class="close" data-target="#update-success-panel" data-dismiss="alert"><span
                                                        aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                                            </button>
                                        </div>
                                        <div class="panel-body"><?php echo lang('update_successfull_text') ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- Main content -->
                            <section class="content">
                                <div class="row">

                                    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8">
                                        <!-- general form elements -->
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <h5 class="box-title"><?php echo lang('page_subtitle_text') ?></h5>
                                                <div class=" col-md-offset-2 col-md-8" style="color: maroon;font-size: larger">
                                                    <?php if ($this->session->flashdata('validation_errors')) echo
                                                    $this->session->flashdata('validation_errors');
                                                    ?>
                                                </div>
                                                <div class="col-md-2"></div>

                                                <div class=" col-md-offset-2 col-md-12" style="color: darkgreen;font-size: larger">
                                                    
                                                    <?php if ($this->session->flashdata('update_success_text')){?>
                                                        <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button><?php echo lang('update_success_text') ?>
                                                        </div>
                                                    <?php }?>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                            <!-- /.box-header -->
                                            <!-- form start -->
                                            <!-- form start -->
                                            <form action="<?php echo base_url() . 'settings_module/update_currency_settings' ?>" role="form"
                                                  id="" method="post" enctype="multipart/form-data">
                                                <div class="box-body">

                                                    <?php if (!empty($all_currencies)) { ?>

                                                    <div class="form-group">
                                                        <label for="currency_id"><?php echo lang('label_currency_text') ?></label>

                                                        <!-- <select class="form-control" name="currency_id" id="currency_id">
                                                            <option value="0"
                                                                    currency_name="<?php echo lang('empty_text') ?>"
                                                                    conversion_rate="<?php echo lang('empty_text') ?>"
                                                                    currency_sign="<?php echo lang('empty_text') ?>">
                                                                <?php echo lang('currency_choose_text') ?>
                                                            </option>

                                                            <?php foreach ($all_currencies as $a_currency) { ?>
                                                                <option
                                                                        currency_name="<?php echo $a_currency->currency_name ?>"
                                                                        conversion_rate="<?php echo $a_currency->conversion_rate ?>"
                                                                        currency_sign="<?php echo $a_currency->currency_sign ?>"

                                                                        value="<?php echo $a_currency->currency_id ?>"

                                                                    <?php
                                                                    if ($all_currency_settings) {
                                                                        foreach ($all_currency_settings as $a_currency_settings) {
                                                                            if (($a_currency_settings->settings_key == 'currency_id')
                                                                                && ($a_currency_settings->settings_value == $a_currency->currency_id)
                                                                            )
                                                                                echo 'selected';
                                                                        }
                                                                    }
                                                                    ?>
                                                                >
                                                                    <?php echo $a_currency->currency_short_name ?>

                                                                </option>
                                                            <?php } ?>
                                                        </select> -->
                                                        <input type="text" name="currency_short_name" 
                                                        value="<?php
                                                               if ($all_currency_settings) {
                                                                   foreach ($all_currency_settings as $a_currency_settings) {
                                                                       if (($a_currency_settings->settings_key) == 'currency_short_name')
                                                                           echo $a_currency_settings->settings_value;
                                                                   }
                                                               }
                                                               ?>" class="form-control">

                                                    </div>


                                                    <div class="form-group">
                                                        <label for="currency_name"><?php echo lang('label_currency_name_text') ?></label>

                                                        <input type="text" name="currency_name" class="form-control" id="currency_name"
                                                               value="<?php
                                                               if ($all_currency_settings) {
                                                                   foreach ($all_currency_settings as $a_currency_settings) {
                                                                       if (($a_currency_settings->settings_key) == 'currency_name')
                                                                           echo $a_currency_settings->settings_value;
                                                                   }
                                                               }
                                                               ?>"
                                                               placeholder="">
                                                    </div>

                                                    <!-- <div class="form-group">
                                                        <label for="conversion_rate"><?php echo lang('label_conversion_rate_text') ?>
                                                            <small><?php echo lang('label_help_usd_to_your_currenct_text') ?></small>
                                                        </label>

                                                        <input type="text" name="conversion_rate" class="form-control" id="conversion_rate"
                                                               value="<?php
                                                               if ($all_currency_settings) {
                                                                   foreach ($all_currency_settings as $a_currency_settings) {
                                                                       if (($a_currency_settings->settings_key) == 'conversion_rate')
                                                                           echo $a_currency_settings->settings_value;
                                                                   }
                                                               }
                                                               ?>"
                                                               placeholder="" readonly>
                                                    </div> -->

                                                    <div class="form-group">
                                                        <label for="currency_sign"><?php echo lang('label_currency_sign_text') ?></label>

                                                        <input type="text" name="currency_sign" class="form-control" id="currency_sign"
                                                               value="<?php
                                                               if ($all_currency_settings) {
                                                                   foreach ($all_currency_settings as $a_currency_settings) {
                                                                       if (($a_currency_settings->settings_key) == 'currency_sign')
                                                                           echo $a_currency_settings->settings_value;
                                                                   }
                                                               }
                                                               ?>"
                                                               placeholder="">
                                                    </div>

                                                    <!-- <div class="form-group">
                                                        <label for="currency_position"><?php echo lang('label_currency_position_text_text') ?></label>

                                                        <select class="form-control" name="currency_position" id="currency_position">

                                                            <option value="left_along"
                                                                <?php
                                                                if ($all_currency_settings) {
                                                                    foreach ($all_currency_settings as $a_currency_settings) {
                                                                        if (($a_currency_settings->settings_key == 'currency_position')
                                                                            && ($a_currency_settings->settings_value == "left_along")
                                                                        )
                                                                            echo 'selected';
                                                                    }
                                                                }
                                                                ?>
                                                            >
                                                                <?php echo lang('option_currency_position_left_along_text') ?>
                                                            </option>

                                                            <option value="right_along"
                                                                <?php
                                                                if ($all_currency_settings) {
                                                                    foreach ($all_currency_settings as $a_currency_settings) {
                                                                        if (($a_currency_settings->settings_key == 'currency_position')
                                                                            && ($a_currency_settings->settings_value == "right_along")
                                                                        )
                                                                            echo 'selected';
                                                                    }
                                                                }
                                                                ?>
                                                            >
                                                                <?php echo lang('option_currency_position_right_along_text') ?>
                                                            </option>

                                                            <option value="left_far"
                                                                <?php
                                                                if ($all_currency_settings) {
                                                                    foreach ($all_currency_settings as $a_currency_settings) {
                                                                        if (($a_currency_settings->settings_key == 'currency_position')
                                                                            && ($a_currency_settings->settings_value == "left_far")
                                                                        )
                                                                            echo 'selected';
                                                                    }
                                                                }
                                                                ?>
                                                            >
                                                                <?php echo lang('option_currency_position_left_far_text') ?>
                                                            </option>

                                                            <option value="right_far"
                                                                <?php
                                                                if ($all_currency_settings) {
                                                                    foreach ($all_currency_settings as $a_currency_settings) {
                                                                        if (($a_currency_settings->settings_key == 'currency_position')
                                                                            && ($a_currency_settings->settings_value == "right_far")
                                                                        )
                                                                            echo 'selected';
                                                                    }
                                                                }
                                                                ?>
                                                            >
                                                                <?php echo lang('option_currency_position_right_far_text') ?>
                                                            </option>

                                                        </select>
                                                    </div> -->

                                                </div>
                                                <!-- /.box-body -->

                                                <div class="box-footer">


                                                    <button type="submit" id="btnsubmit"
                                                            class="btn btn-primary"><?php echo lang('button_submit_text') ?></button>
                                                </div>

                                                <?php } else { ?>
                                                    <div class="form-group" style="font-size: larger;color: darkred">
                                                        <?php echo lang('no_currency_found_text') ?>
                                                        &nbsp;
                                                        <a href="<?php echo base_url().'currency_module'?>">
                                                            <?php echo lang('add_or_activate_currency_text') ?>
                                                        </a>
                                                    </div>
                                                <?php } ?>

                                            </form>
                                        </div>
                                        <!-- /.box --> </div>
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
    <!-- </div> -->
<!-- </div> -->

<?= $this->endSection() ?>