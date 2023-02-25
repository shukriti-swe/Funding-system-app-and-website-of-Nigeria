<?= $this->extend('master') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">
                <?= lang('setting.terms_and_conditions');?>

                </h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="/"><?= lang('setting.home');?></a></li>
                    <li class="breadcrumb-item active"> <?= lang('setting.terms_and_conditions');?></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')) { ?> 
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong><?php echo session()->getFlashdata('success'); ?></strong>
        </div>
    <?php } ?>

   
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30"><?= lang('setting.terms_and_conditions_C');?></h4>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                        <form role="form" action="<?= base_url('termsandconditions/')?>" method="post" data-parsley-validate novalidate>

                            <input type="hidden" name="terms_and_conditions_id" value="">

                            <div class="form-group ">
                                <label for="terms_and_conditions"
                                       class="col-sm-4 form-control-label"><?= lang('setting.terms_and_conditions');?><span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <textarea id="terms_and_conditions" class="form-control" name="terms_and_conditions"
                                              rows="3"><?=$termandcon_setting['terms_and_conditions']?></textarea>
                                   
                                              <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                    if ($validation->hasError('terms_and_conditions')) {
                                                        echo $validation->getError('terms_and_conditions');
                                                    }
                                                } ?></p>
                                 
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
            selector: '#terms_and_conditions',
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