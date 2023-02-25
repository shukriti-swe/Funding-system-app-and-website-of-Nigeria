<?= $this->extend('master') ?>
<?= $this->section('content') ?> 

<div class="container">

    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left"><?= lang('General.users'); ?></h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(). '/dashboard'; ?>"><?= lang('General.home'); ?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url() . '/admin/user/list' ?>"><?= lang('General.users'); ?></a></li>
                    <li class="breadcrumb-item active"><?= lang('User.create_user'); ?></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30"><?= lang('User.create_user'); ?></h4>
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

                        <form action="<?php echo base_url() . '/admin/user/create' ?>" role="form" id="" method="post" enctype="multipart/form-data">

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="first_name"><?= lang('User.first_name'); ?></label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="<?= lang('User.first_name'); ?>" required="required" autocomplete="Off">
                                </div>

                                <div class="form-group">
                                    <label for="last_name"><?= lang('User.last_name'); ?></label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="<?= lang('User.first_name'); ?>" required="required" autocomplete="Off">
                                </div>

                                <div class="form-group">
                                    <label for="email"><?= lang('General.email'); ?></label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="<?= lang('General.email'); ?>" required="required" autocomplete="Off">
                                </div>

                                <div class="form-group">
                                    <label for="select_group"><?= lang('General.role'); ?></label>
                                    <select class="form-control grp_sel" style="height: auto" name="role" id="role">
                                        <option value=""><?= lang('General.select_role'); ?></option>
                                        <?php foreach ($groups as $group) : ?>
                                            <option value="<?=  $group['id'] ?>"><?=  $group['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div> 
                            </div>

                            <div class="box-footer">
                                <button type="submit" id="btnsubmit" class="btn btn-primary"><?= lang('User.create_user'); ?></button>
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