
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">
                            <?php echo lang('page_title_text') ?>
                        </h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="product_module/all_product_info"><?php echo lang('breadcrumb_home_text') ?></a></li>
                            <li class="breadcrumb-item"><a href="users/auth/show_user_groups"><?php echo lang('breadcrumb_section_text') ?></a></li>
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
                            <h4 class="page-title float-left">
                                <small><?php echo lang('page_subtitle_text') ?></small>
                            </h4>
                            <?php if ($this->session->flashdata('group_add_success')) { ?>
                                <br>
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
                                                <h3 class="box-title"><?php echo lang('box_title_text') ?></h3>
                                                <br>
                                                <div class=" col-md-offset-2 col-md-8" style="color: darkred;font-size: larger">
                                                    <?php if ($this->session->flashdata('validation_errors')) {
                                                        echo $this->session->flashdata('validation_errors');
                                                    }
                                                    ?>
                                                    <?php if ($this->session->flashdata('noting_to_update')) {
                                                        echo $this->session->flashdata('noting_to_update');
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-md-2"></div>

                                                <div class=" col-md-offset-2 col-md-8" style="color: darkgreen;font-size: larger">
                                                    <br>
                                                    <?php if ($this->session->flashdata('update_success')) {
                                                        echo $this->session->flashdata('update_success');
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                            <!-- /.box-header -->
                                            <!-- form start -->
                                            <!-- form start -->
                                            <form action="<?php echo base_url() . 'settings_module/update_prosperisgold_settings' ?>" role="form"
                                                  id="" method="post" enctype="multipart/form-data">
                                                <div class="box-body">

                                                    <hr>
                                                    <div style="font-size: larger;color: #2b2b2b">
                                                        <?php echo lang('thrift_separator_lang') ?>
                                                    </div>
                                                    <hr>

                                                    <div class="form-group">
                                                        <label for="thrift_percentage"><?php echo lang('label_thrift_percentage_text') ?>&nbsp;
                                                            <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top" title="<?= lang('tooltip_thrift_percentage_text') ?>"></i>
                                                            </span>
                                                        </label>

                                                        <input type="text" name="thrift_percentage" class="form-control"
                                                               id="thrift_percentage"
                                                               value="<?php
                                                               if ($all_prosperisgold_settings) {
                                                                   foreach ($all_prosperisgold_settings as $a_prosperisgold_settings) {
                                                                       if (($a_prosperisgold_settings->settings_key) == 'thrift_percentage')
                                                                           echo $a_prosperisgold_settings->settings_value;
                                                                   }
                                                               }
                                                               ?>"
                                                               placeholder="<?php echo lang('placeholder_thrift_percentage_text') ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="thrift_percentage"><?php echo lang('label_thrift_percentage_text') ?>&nbsp;
                                                            <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top" title="<?= lang('tooltip_thrift_percentage_text') ?>"></i>
                                                            </span>
                                                        </label>

                                                        <input type="text" name="thrift_percentage" class="form-control"
                                                               id="thrift_percentage"
                                                               value="<?php
                                                               if ($all_prosperisgold_settings) {
                                                                   foreach ($all_prosperisgold_settings as $a_prosperisgold_settings) {
                                                                       if (($a_prosperisgold_settings->settings_key) == 'thrift_percentage')
                                                                           echo $a_prosperisgold_settings->settings_value;
                                                                   }
                                                               }
                                                               ?>"
                                                               placeholder="<?php echo lang('placeholder_thrift_percentage_text') ?>">
                                                    </div>




                                                </div>
                                                <!-- /.box-body -->

                                                <div class="box-footer">
                                                    <button type="submit" id=""
                                                            class="btn btn-primary"><?php echo lang('button_submit_text') ?>
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

