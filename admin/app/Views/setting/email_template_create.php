<?= $this->extend('master') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">
                <?= lang('setting.edit_email_template');?>

                </h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="email_template_module/view_templates"><?= lang('setting.email_template'); ?></a></li>
                    <li class="breadcrumb-item active"> <?= lang('setting.edit_template');?></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <?php if(!empty($success)) { ?>
        <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>
               <?=$success?>
            </strong>
            &nbsp;
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30"><?= lang('setting.edit_template_details');?></h4>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">

                        <form role="form" action="<?= base_url('emailtemplate/create') ?>" method="post" data-parsley-validate novalidate>

                            <div class="form-group ">
                                <label for="bank_name" class="col-sm-4 form-control-label"><?= lang('setting.template_type');?><span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" parsley-type="email_template_type" class="form-control" 
                                           name="email_template_type" placeholder="Template Type" autocomplete="Off"
                                           onkeypress="return event.charCode != 32">
                                </div>
                            </div>
                            
                            <div class="form-group ">
                                <label for="email_template_subject" class="col-sm-4 form-control-label"><?= lang('setting.template_subject');?><span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text"  parsley-type="email_template_subject" class="form-control" 
                                           name="email_template_subject"  autocomplete="Off"
                                           placeholder="Template Subject">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="email_template" class="col-sm-4 form-control-label"><?= lang('setting.email_template');?><span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <textarea id="email_template" class="form-control" name="email_template" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group  m-b-0">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">
                                <?= lang('setting.submit');?>
                                </button>
                            </div>
                        </form>
                    </div><!-- end row -->
                </div>
            </div><!-- end col -->


        </div>
    </div>
</div>

<script>
    $(function () {

        tinymce.init({
            selector: '#email_template',
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



    });
</script>
<?= $this->endSection() ?>