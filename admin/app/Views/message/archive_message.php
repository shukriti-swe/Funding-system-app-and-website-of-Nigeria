<?= $this->extend('master') ?>
<?= $this->section('content') ?>

<div class="container">

    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">Archive</h4>

                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Archive Message</li>
                </ol>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">WRITE MESSAGE</h4>
                <?php
                    if (session()->getFlashdata('success')) {
                        echo '<div class="alert alert-success text-center">' . session()->getFlashdata('success') . "</div>";
                    }
                    ?>
                <div class="box-body">
                <form action="<?php echo base_url('messagearchive')?>"role="form"id="" method="post" enctype="multipart/form-data">
                    <table class="table  table-hover table-responsive" style="    width: 100%;">
                        <thead>
                            <th>Id</th>
                            <th>Message</th>
                            <th>Attachment</th>
                            <th>Add Archive</th>
                        </thead>
                        
                            <?php
                            $i=1;
                            foreach($messages as $message){ ?>
                             <tbody>
                                <td><?=$i;?></td>
                                <td><?=$message['message'];?></td>
                                <td><?php if(!empty($message['attachment'])){?>
                                    <a href="<?= $message['attachment']; ?>">Attachment</a>
                                <?php }else{echo "No Attachment";}?></td>

                                <td><input type="checkbox"name="add_arcive[]" value="<?=$message['ticket_id'].','.$message['created_at']; ?>"
                                <?php
                                foreach($archives as $archive){
                                   if($archive['ticket_id']==$message['ticket_id']){
                                     echo "checked";
                                   }
                                }
                                ?>
                                ></td> 
                            </tbody>
                            <?php $i++; }?>
                        
                    </table>
                    <div class="box-footer">
                        <button type="submit" id="btnsubmit"class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- end col -->
    </div>


</div> <!-- container -->




<script>
    
</script>

<?= $this->endSection() ?>