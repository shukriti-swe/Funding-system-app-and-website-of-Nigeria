<?= $this->extend('master') ?>
<?= $this->section('content') ?> 
<style>
    .table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid white !important;
    text-align: left;
    font-size: 16px;
}
.table td, .table th {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid white !important;
}
</style>
<div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">

                                <small>Withdraw Details  </small>
                              
                                
                        </h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a
                                        href="#">Thrift</a>
                            </li>
                            <li class="breadcrumb-item active">WIthdraw Status</li>
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

                            </h4>

      

                            <!-- Main content -->
                      
                            
                            <section class="">
                                <div class="">
                                    <div class="col-xs-12">
                                        <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="m-t-0 header-title">WITHDRAW STATUS</h3>
                                                 
                                            </div>
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
                                            <br><br>
                                            <div class="box-body">
                                            <form action="<?php echo base_url('updatewithdrawstatus')?>"role="form" id="" method="post" enctype="multipart/form-data">
                                      
                                      <input type="hidden" name="withdraw_id" value="<?=$withdraw_id;?>">

                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="site_name">Select Status</label>

                                            <select class="form-control" name="status">
                                                <option>--Select One--</option>
                                                <option value="1" <?php if($status==1){echo "selected";}?>>Pending</option>
                                                <option value="2" <?php if($status==2){echo "selected";}?>>Processed</option>
                                                <option value="3" <?php if($status==3){echo "selected";}?>>Denied</option>
                                                <option value="4" <?php if($status==4){echo "selected";}?>>Cancelled</option>
                                            </select>
                                        
                                       
                                        </div>

                                        <div class="form-group">
                                            <label for="status_details">Action details</label>

                                            <textarea class="form-control" name="status_details"></textarea>
                                        
                                        </div>
                                        
                                        </div>

                                    <div class="box-footer">
                                        
                                        <button type="submit" id="btnsubmit"
                                                class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                                            </div>
                                             <br>
                                             <br>
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
            <!-- end row -->
        </div> <!-- container -->
       
<?= $this->endSection() ?>