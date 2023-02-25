<?= $this->extend('master') ?>
<?= $this->section('content') ?> 
<style>
    @import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700,300);

    .form-control, .thumbnail {
        border-radius: 2px;
    }

    .btn-danger {
        background-color: #B73333;
    }

    /* File Upload */
    .fake-shadow {
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }

    .fileUpload {
        position: relative;
        overflow: hidden;
    }

    .fileUpload #logo-id {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 33px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }

    .fileUpload #office-logo-id {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 33px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }

    .fileUpload #partner-logo-id {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 33px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }

    .fileUpload #thrift-logo-id {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 33px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }

    .fileUpload #trustee-logo-id {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 33px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }

    .fileUpload #banner-id {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 33px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }

    .img-preview {
        max-width: 50%;
    }
</style>

<!-- <div class="content-page"> -->
<!-- Start content -->
<!-- <div class="content"> -->
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">
                <?= lang('setting.referral_settings');?> 

                </h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#"><?= lang('setting.home');?> </a></li>
                    <li class="breadcrumb-item"><a href="#"><?= lang('setting.settings');?> </a></li>
                    <li class="breadcrumb-item active"><?= lang('setting.referral_settings');?> </li>
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

                                    <div class=" col-md-offset-2 col-md-12" style="color: darkgreen;font-size: larger">
                                        
                                    <?php if(!empty($success)){ ?>
                                      
                                            <div class="text-center alert alert-success alert-dismissible fade show"
                                                 role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong><?=$success;?></strong>
                                            </div>
                                    <?php }?>
                                       
                                    </div>
                                 
                                </div>
                                
                                <form action="<?php echo base_url('othersetting')?>"
                                      role="form"
                                      id="" method="post" enctype="multipart/form-data">
                                      
                                      <input type="hidden" name="setting_type" value="referral_setting">
                                    <div class="box-body">

                                        <div class="form-group" style="display:none;">
                                                <label for="paystack_test_mode"><?= lang('setting.referral_enabled');?>
                                                    &nbsp;
                                                    <span>
                                                                <i class="fa fa-question-circle" aria-hidden="true"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="Text"></i>
                                                            </span>
                                                </label>

                                                <select class="form-control" name="referral_enabled" id="">
                                                    <option value="">--Select One--</option>
                                                    <option value="yes" <?php if($referral_setting['referral_enabled']=='yes'){echo "selected";}?>><?= lang('setting.yes');?></option>
                                                    <option value="no" <?php if($referral_setting['referral_enabled']=='no'){echo "selected";}?>><?= lang('setting.no');?></option>
                                                </select>

                                                <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                if ($validation->hasError('referral_enabled')) {
                                                    echo $validation->getError('referral_enabled');
                                                }
                                                } ?></p>

                                            </div>
                                            <div class="form-group" style="display:none;">
                                            <label for="site_name"><?= lang('setting.referral_amount_in_percentage');?></label>

                                            <input type="text" name="referral_percentage" class="form-control" id="referral_percentage"
                                                   value="<?php if($referral_setting['referral_enabled']){echo $referral_setting['referral_percentage'];}?>"
                                                   placeholder="">
                                        
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('referral_percentage')) {
                                            echo $validation->getError('referral_percentage');
                                         }
                                            } ?></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="site_name"><?= lang('setting.potential_winning');?></label>

                                            <input type="text" name="potential_winning" class="form-control" id="potential_winning"
                                                   value="<?php if(!empty($referral_setting['potential_winning'])){echo $referral_setting['potential_winning'];}?>"
                                                   placeholder="">
                                        
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('potential_winning')) {
                                            echo $validation->getError('potential_winning');
                                        }
                                            } ?></p>
                                        </div>


                                    <div class="form-group">
                                            <label for="site_name"><?= lang('setting.thrift_start_days');?></label>

                                            <input type="text" name="thrift_start_days" class="form-control" id="thrift_start_days"
                                                   value="<?php if(!empty($referral_setting['thrift_start_days'])){echo $referral_setting['thrift_start_days'];}else{echo 5;}?>"
                                                   placeholder="">
                                        
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('thrift_start_days')) {
                                            echo $validation->getError('thrift_start_days');
                                        }
                                            } ?></p>
                                        </div>
                                        

                                        <div class="form-group">
                                            <label for="site_name"><?= lang('setting.thrift_start_not_later');?></label>

                                            <input type="text" name="thrift_start_not_later" class="form-control" id="thrift_start_not_later"
                                                   value="<?php if(!empty($referral_setting['thrift_start_not_later'])){echo $referral_setting['thrift_start_not_later'];}else{echo 60;}?>"
                                                   placeholder="">
                                        
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('thrift_start_not_later')) {
                                            echo $validation->getError('thrift_start_not_later');
                                        }
                                            } ?></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="site_name"><?= lang('setting.thrift_duration_in_month');?></label>

                                            <input type="text" name="thrift_duration_in_month" class="form-control" id="thrift_duration_in_month"
                                                   value="<?php if(!empty($referral_setting['thrift_duration_in_month'])){echo $referral_setting['thrift_duration_in_month'];}?>" placeholder="a,ab,abc">
                                        
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('thrift_duration_in_month')) {
                                            echo $validation->getError('thrift_duration_in_month');
                                        }
                                            } ?></p>
                                        </div>
                                      

                                    <div class="box-footer">


                                        <button type="submit" id="btnsubmit"
                                                class="btn btn-primary"><?= lang('setting.update_referral_setting');?></button>
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


<?= $this->endSection() ?>