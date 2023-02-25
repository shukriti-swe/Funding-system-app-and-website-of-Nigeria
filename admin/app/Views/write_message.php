<?= $this->extend('master') ?>
<?= $this->section('content') ?> 

< <div class="container">

<div class="row">
    <div class="col-xl-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">text</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="/">text</a></li>
                <li class="breadcrumb-item active">text</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>text</strong>
        

    </div>


<div class="row">
    <div class="col-12">
        <div class="card-box">

            <h4 class="header-title m-t-0 m-b-30">text</h4>

            <div class="row">
                <div class="col-md-12">
                    <form id="#msg-form" action="" method="post"
                          enctype="multipart/form-data">
                        <fieldset class="form-group w-50">
                            <label for="">text</label>
                            <select name="to_whom" style="height: auto" class="form-control"
                                    id="">
                                <option value="to_admin">text</option>
                                
                                    <option value="to_employer">text</option>
                      
                            </select>
                        </fieldset>
                        <fieldset class="form-group w-100">
                            <label for="">text</label>
                            <textarea id="message_text" class="form-control" name="message_text"
                                      rows="3">text</textarea>
                        </fieldset>

                        <button type="submit"
                                class="btn btn-primary">text</button>
                    </form>
                </div><!-- end col -->


            </div><!-- end row -->
        </div>
    </div><!-- end col -->
</div>


</div> <!-- container -->




<script>
$(function () {

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