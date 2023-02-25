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
                <?= lang('setting.general');?> 

                </h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#"><?= lang('setting.home');?> </a></li>
                    <li class="breadcrumb-item"><a href="#"><?= lang('setting.settings');?> </a></li>
                    <li class="breadcrumb-item active"><?= lang('setting.general_settings');?> </li>
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
                                <!-- /.box-header -->
                                <!-- form start -->
                                <!-- form start -->
                                <form action="<?php echo base_url('updategeneralsettings')?>"
                                      role="form"
                                      id="" method="post" enctype="multipart/form-data">
                                      <?php 
                                      if($general_setting){
                                        $general = json_decode($general_setting['settings_value'],true);
                                
                                      }
                                      ?>
                                      <input type="hidden" name="setting_type" value="general_setting">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="site_name"><?= lang('setting.site_name');?></label>

                                            <input type="text" name="site_name" class="form-control" id="site_name"
                                                   value="<?php if($general['site_name']){echo $general['site_name'];}?>"
                                                   placeholder="">
                                        
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('site_name')) {
                                            echo $validation->getError('site_name');
                                        }
                                            } ?></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="site_email"><?= lang('setting.site_email');?></label>

                                            <input type="text" name="site_email" class="form-control" id="site_email"
                                                   value="<?php if($general['site_email']){echo $general['site_email'];}?>"
                                                   placeholder="<?php echo lang('placeholder_site_email_text') ?>">
                                        
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('site_email')) {
                                            echo $validation->getError('site_email');
                                        }
                                            } ?></p>

                                        </div>

                                       <!-- <div class="form-group">
                                            <label for="site_banner"><?= lang('setting.site_banner');?></label>
                                            <div class="main-img-preview">

                                                    <img class="thumbnail img-preview img-preview-banner"
                                                         src="<?php if($general['site_banner']){ echo base_url()
                                                             . '/setting/thumbnail/'.$general['site_banner'] ;}?>"
                                                         title="Preview Banner">

                                            </div>
 
                                            <div class="input-group">
                                                <input id="fakeUploadBanner" class="form-control fake-shadow"
                                                       placeholder="Choose File" disabled="disabled">
                                                <div class="input-group-btn">
                                                    <div class="fileUpload btn btn-primary fake-shadow">
                                                        <span><i class="glyphicon glyphicon-upload"></i><?= lang('setting.upload_banner');?></span>
                                                        <input id="banner-id" name="site_banner" type="file"
                                                               value=""
                                                               class="attachment_upload">
                                                        <input type="hidden" name="banner_old" value="<?php if($general['site_banner']){echo $general['site_banner'];}?>">  
                                                    </div>
                                                </div>
                                            </div>

                                            <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                if ($validation->hasError('site_banner')) {
                                                    echo $validation->getError('site_banner');
                                                }
                                                    } ?></p>
                                        </div> -->
                                        <!--image upload snippet ends-->

                                       <div class="form-group">
                                            <label for="c_symbol"><?= lang('setting.currency_symbol');?></label>

                                            <input type="text" name="c_symbol" class="form-control" id="c_symbol"
                                                   value="<?php if($general['c_symbol']){echo $general['c_symbol'];}?>"
                                                   placeholder="">
                                        
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('c_symbol')) {
                                            echo $validation->getError('c_symbol');
                                        }
                                            } ?></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="c_text"><?= lang('setting.currency_text');?></label>

                                            <input type="text" name="c_text" class="form-control" id="c_text"
                                                   value="<?php if($general['c_text']){echo $general['c_text'];}?>"
                                                   placeholder="">
                                        
                                        <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('c_text')) {
                                            echo $validation->getError('c_text');
                                        }
                                            } ?></p>

                                        </div>
                                

                                    <div class="box-footer">


                                        <button type="submit" id="btnsubmit"
                                                class="btn btn-primary"><?= lang('setting.update_general_setting');?></button>
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
    $(document).ready(function () {
        var brand = document.getElementById('logo-id');
        brand.className = 'attachment_upload';
        brand.onchange = function () {
            document.getElementById('fakeUploadLogo').value = this.value.substring(12);
        };

        // Source: http://stackoverflow.com/a/4459419/6396981
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.img-preview-logo').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#logo-id").change(function () {
            readURL(this);
        });

    });


</script>

<script>
    $(document).ready(function () {
        var brand = document.getElementById('office-logo-id');
        brand.className = 'attachment_upload';
        brand.onchange = function () {
            document.getElementById('fakeUploadLogo').value = this.value.substring(12);
        };

        // Source: http://stackoverflow.com/a/4459419/6396981
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.img-preview-office-logo').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#office-logo-id").change(function () {
            readURL(this);
        });

    });


</script>

<script>
    $(document).ready(function () {
        var brand = document.getElementById('partner-logo-id');
        brand.className = 'attachment_upload';
        brand.onchange = function () {
            document.getElementById('fakeUploadLogo').value = this.value.substring(12);
        };

        // Source: http://stackoverflow.com/a/4459419/6396981
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.img-preview-partner-logo').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#partner-logo-id").change(function () {
            readURL(this);
        });

    });


</script>

<script>
    $(document).ready(function () {
        var brand = document.getElementById('thrift-logo-id');
        brand.className = 'attachment_upload';
        brand.onchange = function () {
            document.getElementById('fakeUploadLogo').value = this.value.substring(12);
        };

        // Source: http://stackoverflow.com/a/4459419/6396981
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.img-preview-thrift-logo').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#thrift-logo-id").change(function () {
            readURL(this);
        });

    });


</script>


<script>
    $(document).ready(function () {
        var brand = document.getElementById('trustee-logo-id');
        brand.className = 'attachment_upload';
        brand.onchange = function () {
            document.getElementById('fakeUploadLogo').value = this.value.substring(12);
        };

        // Source: http://stackoverflow.com/a/4459419/6396981
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.img-preview-trustee-logo').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#trustee-logo-id").change(function () {
            readURL(this);
        });

    });


</script>


<script>
    $(document).ready(function () {
        var brand = document.getElementById('banner-id');
        brand.className = 'attachment_upload';
        brand.onchange = function () {
            document.getElementById('fakeUploadBanner').value = this.value.substring(12);
        };

        // Source: http://stackoverflow.com/a/4459419/6396981
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.img-preview-banner').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#banner-id").change(function () {
            readURL(this);
        });
    });


</script>

<script>
    $(function () {
        tinymce.init({
            selector: '#thrifter_registration_terms_html',
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
            height: 500,
            menubar: true,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            content_css: '//www.tinymce.com/css/codepen.min.css'
        });

        tinymce.init({
            selector: '#site_maintenance_html',
            height: 500,
            menubar: true,
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            content_css: '//www.tinymce.com/css/codepen.min.css'
        });
    });
</script>
<?= $this->endSection() ?>