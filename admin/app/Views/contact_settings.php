<?= $this->extend('master') ?>
<?= $this->section('content') ?> 
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">text</h4>
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
                                              <h5 class="box-title"><?php echo lang('page_subtitle_text') ?></h5>
                                              
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

                                              <div class=" col-md-offset-2 col-md-12" style="color: darkgreen;font-size: larger">
                                                  
                                                  <?php if ($this->session->flashdata('update_success')) {?>
                                                      <!-- echo $this->session->flashdata('update_success'); -->
                                                      <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button><?php echo lang('update_success_text') ?>
                                                        </div>
                                                  <?php }
                                                  ?>
                                              </div>
                                              <div class="col-md-2"></div>
                                          </div>
                                          <!-- /.box-header -->
                                          <!-- form start -->
                                          <!-- form start -->
                                          <form action="<?php echo base_url() . 'settings_module/update_contact_settings' ?>" role="form"
                                                id="" method="post" enctype="multipart/form-data">
                                              <div class="box-body">

                                                  <hr>
                                                  <div style="font-size: larger;color: #2b2b2b">
                                                      <?php echo lang('admins_contact_separator_lang') ?>
                                                  </div>
                                                  <hr>

                                                  <div class="form-group">
                                                      <label for="admin_contact_email"><?php echo lang('label_admin_contact_email_text') ?></label>

                                                      <input type="text" name="admin_contact_email" class="form-control"
                                                             id="admin_contact_email"
                                                             value="<?php
                                                             if ($all_contact_settings) {
                                                                 foreach ($all_contact_settings as $a_contact_settings) {
                                                                     if (($a_contact_settings->settings_key) == 'admin_contact_email')
                                                                         echo $a_contact_settings->settings_value;
                                                                 }
                                                             }
                                                             ?>"
                                                             placeholder="<?php echo lang('placeholder_admin_contact_email_text') ?>">
                                                  </div>

                                                  <div class="form-group">
                                                      <label for="admin_contact_phone"><?php echo lang('label_admin_contact_phone_text') ?></label>

                                                      <input type="text" name="admin_contact_phone" class="form-control"
                                                             id="admin_contact_phone"
                                                             value="<?php
                                                             if ($all_contact_settings) {
                                                                 foreach ($all_contact_settings as $a_contact_settings) {
                                                                     if (($a_contact_settings->settings_key) == 'admin_contact_phone')
                                                                         echo $a_contact_settings->settings_value;
                                                                 }
                                                             }
                                                             ?>"
                                                             placeholder="<?php echo lang('placeholder_admin_contact_phone_text') ?>">
                                                  </div>

                                                  <br>

                                                  <hr>
                                                  <div style="font-size: larger;color: #2b2b2b">
                                                      <?php echo lang('companys_contact_separator_lang') ?>
                                                  </div>
                                                  <hr>

                                                  <div class="form-group">
                                                      <label for="company_contact_email"><?php echo lang('label_company_contact_email_text') ?></label>

                                                      <input type="text" name="company_contact_email" class="form-control"
                                                             id="company_contact_email"
                                                             value="<?php
                                                             if ($all_contact_settings) {
                                                                 foreach ($all_contact_settings as $a_contact_settings) {
                                                                     if (($a_contact_settings->settings_key) == 'company_contact_email')
                                                                         echo $a_contact_settings->settings_value;
                                                                 }
                                                             }
                                                             ?>"
                                                             placeholder="<?php echo lang('placeholder_company_contact_email_text') ?>">
                                                  </div>

                                                  <div class="form-group">
                                                      <label for="company_contact_phone"><?php echo lang('label_company_contact_phone_text') ?></label>

                                                      <input type="text" name="company_contact_phone" class="form-control"
                                                             id="company_contact_phone"
                                                             value="<?php
                                                             if ($all_contact_settings) {
                                                                 foreach ($all_contact_settings as $a_contact_settings) {
                                                                     if (($a_contact_settings->settings_key) == 'company_contact_phone')
                                                                         echo $a_contact_settings->settings_value;
                                                                 }
                                                             }
                                                             ?>"
                                                             placeholder="<?php echo lang('placeholder_company_contact_phone_text') ?>">
                                                  </div>

                                                  <div class="form-group">
                                                      <label><?php echo lang('label_company_contact_address_text') ?></label>
                                                      <textarea class="form-control" rows="3" name="company_contact_address"
                                                                placeholder="<?php echo lang('placeholder_company_contact_address_text') ?>"><?php
                                                          if ($all_contact_settings) {
                                                              foreach ($all_contact_settings as $a_contact_settings) {
                                                                  if (($a_contact_settings->settings_key) == 'company_contact_address')
                                                                      echo $a_contact_settings->settings_value;
                                                              }
                                                          }
                                                          ?></textarea>
                                                  </div>

                                                  <br>

                                                  <hr>
                                                  <div style="font-size: larger;color: #2b2b2b">
                                                      <?php echo lang('companys_social_media_links_separator_lang') ?>
                                                  </div>
                                                  <hr>

                                                  <div class="form-group">
                                                      <label><?php echo lang('label_company_facebook_id_text') ?></label>

                                                      <div class="input-group">
                                                          <div class="input-group-addon">
                                                              <i class="fa fa-facebook"></i>
                                                          </div>
                                                          <input class="form-control pull-right" id="" type="text" name="company_facebook_id"
                                                                 value="<?php
                                                                 if ($all_contact_settings) {
                                                                     foreach ($all_contact_settings as $a_contact_settings) {
                                                                         if (($a_contact_settings->settings_key) == 'company_facebook_id')
                                                                             echo $a_contact_settings->settings_value;
                                                                     }
                                                                 }
                                                                 ?>"
                                                                 placeholder="<?php echo lang('placeholder_company_facebook_id_text') ?>">
                                                      </div>
                                                  </div>

                                                  <div class="form-group">
                                                      <label><?php echo lang('label_company_twitter_id_text') ?></label>

                                                      <div class="input-group">
                                                          <div class="input-group-addon">
                                                              <i class="fa fa-twitter"></i>
                                                          </div>
                                                          <input class="form-control pull-right" id="" type="text" name="company_twitter_id"
                                                                 value="<?php
                                                                 if ($all_contact_settings) {
                                                                     foreach ($all_contact_settings as $a_contact_settings) {
                                                                         if (($a_contact_settings->settings_key) == 'company_twitter_id')
                                                                             echo $a_contact_settings->settings_value;
                                                                     }
                                                                 }
                                                                 ?>"
                                                                 placeholder="<?php echo lang('placeholder_company_twitter_id_text') ?>">
                                                      </div>
                                                  </div>

                                                  <div class="form-group">
                                                      <label><?php echo lang('label_company_youtube_id_text') ?></label>

                                                      <div class="input-group">
                                                          <div class="input-group-addon">
                                                              <i class="fa fa-youtube-square"></i>
                                                          </div>
                                                          <input class="form-control pull-right" id="" type="text" name="company_youtube_id"
                                                                 value="<?php
                                                                 if ($all_contact_settings) {
                                                                     foreach ($all_contact_settings as $a_contact_settings) {
                                                                         if (($a_contact_settings->settings_key) == 'company_youtube_id')
                                                                             echo $a_contact_settings->settings_value;
                                                                     }
                                                                 }
                                                                 ?>"
                                                                 placeholder="<?php echo lang('placeholder_company_youtube_id_text') ?>">
                                                      </div>
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
        </div> <!-- container -->