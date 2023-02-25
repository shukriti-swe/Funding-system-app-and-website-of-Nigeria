<?= $this->extend('master') ?>
<?= $this->section('content') ?>

<div class="container">

    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">Outbox</h4>

                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Send Message</li>
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
                        <small></small>
                    </h4>

                    <?php
                    if (session()->getFlashdata('success')) {
                        echo '<div class="alert alert-success text-center">' . session()->getFlashdata('success') . "</div>";
                    }
                    ?>

                    <!-- Main content -->
                    <section class="">
                        <div class="">
                            <div class="col-xs-12">
                                <div class="box box-primary">
                                    <div class="box-header">

                                        <a class="btn btn-primary mb-2" href="<?= base_url() ?>/write_message">Write a message
                                            &nbsp;<span class="icon"><i class="fa fa-plus"></i></span>
                                        </a>

                                        <!-- Main content -->
                                        <section class="">
                                            <div class="">
                                                <div class="col-xs-12">
                                                    <div class="box box-primary">

                                                        <!-- /.box-header -->
                                                        <div class="box-body">
                                                            <table id="inbox-table" class="table table-bordered table-hover table-responsive ">
                                                                <thead class="bg-warning">
                                                                    <tr>
                                                                        <th>Time</th>
                                                                        <th>Message</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                   <?php 
                                                                   //print_r($getAllSupMsg);die();
                                                                   foreach($getAllSupMsg as $msglist){
                                                                   ?>

                                                                        <td><?= date('d M, h:i A', strtotime($msglist['created_at'])) ?></td>
                                                                        <td><?= $msglist['message']; ?></td>
                                                                        <td> 
                                                                            <a title="View Message" href="<?= base_url()
                                                                            ?>/view_message/<?= $msglist ['id'] ?>/<?= $msglist['ticket_id'] ?>" style="color:#2b2b2b">
                                                                                <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                                                                            </a>
                                                                            <a title="Delete Message" href="<?= base_url() ?>/delete_message/<?= $msglist['id'] ?>" style="color:#2b2b2b">
                                                                                <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                                                                            </a>
                                                                        </td>
                                                                        </tr>
                                                                   <?php }?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- /.box-body -->
                                                    </div>
                                                    <!-- /.box -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                        </section>
                                    </div>
                                    <!-- /.box-header -->

                                </div>
                                <!-- /.box -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </section>
                    <!-- /.content -->
                    <div class="clearfix"></div>
                </div>
            </div><!-- end col -->
        </div><!-- end col -->
    </div>

    <!-- /.content -->


</div> <!-- container -->


<?= $this->endSection() ?>