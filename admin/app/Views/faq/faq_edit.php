<?= $this->extend('master') ?>
<?= $this->section('content') ?> 

<div class="container">

    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left"><?= lang('faq.faqs'); ?></h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(). '/dashboard'; ?>"><?= lang('faq.home'); ?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url() . '/admin/user/list' ?>"><?= lang('faq.faqs'); ?></a></li>
                    <li class="breadcrumb-item active"><?= lang('faq.edit_faq'); ?></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30"><?= lang('faq.edit_faq'); ?></h4>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">

                        <div class="box box-primary">
                            <div class="box-header with-border"> 

                                <?php if (session()->getFlashdata('error')) { ?> 
                                    <div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <strong><?php echo session()->getFlashdata('success'); ?></strong>
                                    </div>
                                <?php } ?>

                                <?php if (session()->getFlashdata('success')) { ?> 
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <strong><?php echo session()->getFlashdata('success'); ?></strong>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>

                        <form action="<?php echo base_url('faqedit/'.$faq['id']);?>" method="post" enctype="multipart/form-data">

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="question"><?= lang('faq.question'); ?> ?</label>
                                    <input type="text" name="question" class="form-control" id="question" placeholder="<?= lang('faq.question'); ?>" autocomplete="Off" value="<?=$faq['question']?>">

                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('question')) {
                                            echo $validation->getError('question');
                                        }
                                       } ?></p>
                                </div>

                                <div class="form-group">
                                    <label for="answer"><?= lang('faq.answer'); ?></label>
                                    <textarea name="answer" class="form-control" id="answer" placeholder="<?= lang('faq.answer'); ?>" autocomplete="Off"><?=$faq['answer']?></textarea>

                                    <p style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                        if ($validation->hasError('answer')) {
                                            echo $validation->getError('answer');
                                        }
                                       } ?></p>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" id="btnsubmit" class="btn btn-primary"><?= lang('faq.update_faqs'); ?></button>
                            </div>

                        </form>

                    </div><!-- end col -->
                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>
</div>


<script>
    $(function () {

    });
</script>

<?= $this->endSection() ?>