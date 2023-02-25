<?= $this->extend('master') ?>
<?= $this->section('content') ?>

<div class="container">

    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">Message</h4>

                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">View Message</li>
                </ol>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <?php
        if (session()->getFlashdata('success')) {
            echo '<div class="alert alert-success text-center">' . session()->getFlashdata('success') . "</div>";
        }
    ?>



    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">Message</h4>

                <div class="row">

                    <div class="col-lg-12">
                        <?php //foreach($getreplytext as $reply) : ?>
                            <h5 class="mt-0"><a href=""><?//= $reply['first_name'].' '.$reply['last_name']; ?></a></h5>
                        <?php //endforeach; ?>
                        <!-- Author -->
                        <p class="lead">
                            by
                            <a href="#"> </a>
                            <a href=""><?= session()->get('name'); ?></a>
                        </p>

                        <hr>
                        <!-- Date/Time -->
                        <p>Posted on <?= date('d M, h:i A', strtotime($getmgsrow['created_at'])) ?></p>

                        <hr>
                        <p><?= $getmgsrow['message']; ?></p>
                        <hr>

                        <?php if($getmgsrow['attachment']){?> 
                        <a href="<?= $getmgsrow['attachment']; ?>">Attachment</a>
                        <hr>
                        <?php }?>

                        <div class="pull-right">
                            <button class="reply_btn"><i class="fa fa-reply"></i>
                                &nbsp;
                                Reply </button>
                        </div>
                    </div>


                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>


    <div class="row" id="comment-form-main-row">
        <div class="col-12">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">Write Comment</h4>

                <div class="row">
                    <div class="col-md-12">
                        <form id="#comment-form" action="<?= base_url() ?>/view_message/<?= $getmgsrow['id']; ?>/<?= $getmgsrow['ticket_id']; ?>" method="post" enctype="multipart/form-data" novalidate="">
                            <input type="hidden" name="receiver_id" value="<?= $getmgsrow['receiver_id']; ?>">

                            <fieldset class="form-group w-100">
                                <label for="">Write Your Comment</label>
                                <textarea id="message_text" class="form-control" name="message_text" rows="3"></textarea>
                            </fieldset>

                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div><!-- end col -->
                </div><!-- end row -->
                
            </div>
        </div><!-- end col -->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">Comments</h4>

                <div class="row">
                    <div class="col-md-12">
                        <div class="media mb-4" id="comment-0">
                            <a href="#comment-0"></a>
                            <div class="media-body">
                              
                                <?php foreach($getreplytext as $reply) : ?>
                                    <h5 class="mt-0"><a href=""><?= session()->get('name'); ?></a></h5>
                                    <hr>
                                    <p>Commented on <?= date('d M, h:i A', strtotime($reply['created_at'])) ?> </p>
                                    <hr>
                                    <p><?= strip_tags($reply['message']); ?></p>
                                    <hr>

                                    
                                    <?php if(!empty($reply['attachment'])){?> 
                                        
                                    <a href="<?= $reply['attachment']; ?>">Attachment</a>
                                    <hr>
                                    <?php }?>




                                    <div class="pull-right">
                                        <button class="reply_btn"><i class="fa fa-reply"></i>
                                            &nbsp;
                                            Reply </button>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>


</div>



<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<script>
    $(function() {

        $(".reply_btn").on("click", function (e) {
            e.preventDefault();

            $('html, body').animate({
                scrollTop: $("#comment-form-main-row").offset().top
            }, 1000);
        });

        tinymce.init({
            selector: '#message_text',
            height: 250,
            menubar: false,
            plugins: [
                'advlist autolink lists link charmap print preview anchor textcolor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime table contextmenu paste code help'
            ],
            toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        });



    });
</script>

<?= $this->endSection() ?>