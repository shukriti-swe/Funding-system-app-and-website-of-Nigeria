<?= $this->extend('master') ?>
<?= $this->section('content') ?> 

<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">
                   text
                    <small>text</small>
                </h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a
                                href="/">text</a>
                    </li>
                    <li class="breadcrumb-item"><a
                                href="<?php echo base_url() . 'users/auth' ?>">text</a>
                    </li>
                    <li class="breadcrumb-item active">text</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">text</h4>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="m-t-0 header-title">text</h3>
                             
                                    <div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <strong>text</strong>
                                    </div>
                          
                                <div class="col-md-2"></div>
                                
                                    <div class=" col-md-offset-2 col-md-8"
                                         style="color: maroon;font-size: larger">text</div>
                                    <div class="col-md-2"></div>
                                
                            </div>
                        </div>

                        <form action="<?php echo base_url() . 'users/auth/create_user' ?>" role="form" id=""
                              method="post" enctype="multipart/form-data">
                            <div class="box-body">

                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="first_name">text</label>

                                        <input type="text" name="first_name" class="form-control"
                                               id="first_name"
                                               value="text"
                                               placeholder="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">text</label>

                                        <input type="text" name="last_name" class="form-control" id="last_name"
                                               value="text"
                                               placeholder="text">
                                    </div>
                                    <label for="email">text</label>


                                    <input type="email" name="email" class="form-control" id="email"
                                           value="text"
                                           placeholder="text">
                                </div>
                                <div class="form-group">
                                    <label for="phone">text</label>
                                    <input type="text" class="form-control" name="phone" id="user_position"
                                           value="text"
                                           placeholder="text">
                                </div>

                                <div class="form-group" style="display: none">
                                    <label for="company">text</label>
                                    <input type="text" class="form-control" name="company" id="company"
                                           value="text"
                                           placeholder="text">
                                </div>
                                <div class="form-group">
                                    <label for="password">
                                        <span id="see_password" title="see"  style="color:#2b2b2b"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></span>
                                    </label>
                                    <input type="password" name="password" class="form-control" id="password"
                                           placeholder=""
                                           value="">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirm">text
                                        <span id="see_password_confirm" title="see"  style="color:#2b2b2b"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></span>
                                    </label>
                                    <input type="password" name="password_confirm" class="form-control"
                                           id="password_confirm"
                                           placeholder=""
                                           value="">
                                </div>
                                <div class="form-group">
                                    <label for="select_group"></label>
                                    <select class="form-control grp_sel" style="height: auto" name="select_group"
                                            id="select_group">
                                        
                                                        <option value="text">
                                                        text
                                                        </option>
                                                 
                                    </select>
                                </div>

                                <div class="form-group" id="select_employer_wrapper">
                                    <label for="select_employer">text</label>
                                    <select class="form-control select_employer select2" style="width: 100%"
                                            name="select_employer"
                                            id="">
                                    </select>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">


                                <button type="submit" id="btnsubmit"
                                        class="btn btn-primary">text</button>
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

        $('#select_employer_wrapper').hide();

        $('#select_group').on('change', function () {

            var g_id = $(this).val();

            if (g_id == '7' || g_id == 7) {

                $('#select_employer_wrapper').show();

            } else {

                $('#select_employer_wrapper').hide();

            }

        });


        $('.select_employer').select2({

            placeholder: "<?= lang('select_employer_text')?>",
            allowClear: true,

            "language": {
                "noResults": function () {
                    var btn_html = "<?= lang('no_employer_found_text')?>";
                    var div = document.createElement("div");
                    div.innerHTML = btn_html;
                    return div;
                }
            },

            minimumInputLength: 3,
            ajax: {
                url: '<?= base_url() ?>users/auth/get_employers_by_select2',
                dataType: 'json',
                cache: true,
                delay: 1000,
                allowClear: true,


                data: function (params) {

                    return {
                        keyword: params.term, // search term
                        page: params.page,
                    };
                },
                processResults: function (data, params) {

                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;


                    return {
                        results: data.items,
                        pagination: {
                            more: data.more_pages
                        }
                    };
                },


                escapeMarkup: function (markup) {
                    return markup;
                } // let our custom formatter work

            }

        });

    });


</script>

<script>
    $(function () {

        $('#see_password').on('click',function () {
            $('#password').attr('type', 'text');
        });

        $('#see_password_confirm').on('click',function () {
            $('#password_confirm').attr('type', 'text');
        });


    });
</script>

<?= $this->endSection() ?>