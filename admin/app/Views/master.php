<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Thrift2Win gives you the freedom to choose who you want in your group savings circle.">
        <meta name="author" content="Thrift2Win"> 
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend_assets/css/main.css">

        <title>Thrift2Win</title>

        <link href="<?php echo base_url(); ?>/assets/backend_assets/plugins/hopscotch/css/hopscotch.min.css" rel="stylesheet" type="text/css">
        <script src="<?php echo base_url(); ?>/assets/backend_assets/js/modernizr.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/tinymce/js/tinymce/tinymce.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
    </head>

    <body class="fixed-left">
        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <div class="topbar-left">
                        <a href="<?= base_url('dashboard'); ?>" class="logo"> 
                            <img id="img_logo" height="40" src="<?php echo base_url(); ?>/assets/image/t2w_logo_h.png">
                            <!--<img id="img_logo" height="55" src="<?php echo base_url(); ?>/assets/backend_assets/images/logo.png">-->
                            <span id='site_name'></span>
                            <!--                    <i class="zmdi zmdi-group-work icon-c-logo"></i>-->
                            <!--                    <span>Uplon</span>-->
                        </a>
                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras navbar-topbar">

                        <ul class="list-inline float-right mb-0">

                            <li class="list-inline-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>

                            <li id="noti" class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="zmdi zmdi-notifications-none noti-icon"></i>
                                    <span class="noti-icon-badge"></span>
                                </a>
                            </li>

                            <li id="tour-profile" class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown"
                                   href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img  src="<?=
                                    (session()->get('user_profile_image')) ? session()->get('user_profile_image') :
                                            'http://localhost:8081/assets/backend_assets/images/users/avatar.jpg'
                                    ?>" 
                                          alt="user profile iamge" 
                                          id="user_image" 
                                          class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5 class="text-overflow">
                                            <small id="user_fullname"><?= session()->get('name') ?></small>
                                        </h5>
                                    </div>

                                    <!-- item-->
                                    <a href="<?= base_url('/admin/profile'); ?>"
                                       class="dropdown-item notify-item">
                                        <i class="zmdi zmdi-account-circle"></i> <span><?= lang('master.profile'); ?></span>
                                    </a>

                                    <!-- item-->
                                    <a href="<?= base_url('logout'); ?>" class="dropdown-item notify-item">
                                        <i class="zmdi zmdi-power"></i> <span><?= lang('master.logout'); ?></span>
                                    </a>

                                </div>
                            </li>

                        </ul>

                    </div> <!-- end menu-extras -->
                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->


            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            <li>
                                <a href="<?= base_url('/dashboard'); ?>"><i class="zmdi zmdi-view-dashboard"></i> <span> <?= lang('master.dashboard'); ?> </span> </a>
                            </li>

                            <li id="tour-thrift-menu" class="has-submenu">
                                <a href="#"><i class="zmdi zmdi-collection-item"></i>
                                    <span><?= lang('master.thrifts'); ?></span></a>
                                <ul class="submenu">

                                    <li>
                                        <a href="<?= base_url('thriftlist'); ?>"><?= lang('master.all_thrifts'); ?></a>
                                    </li>

                                    <li>
                                        <a href="<?= base_url('paymentissue'); ?>"><?= lang('master.all_withdrawals'); ?></a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="zmdi zmdi-collection-item"></i>

                                    <span><?= lang('master.report'); ?></span>

                                </a>
                                <ul class="submenu">

                                    <li>
                                        <a href="<?= base_url('alljoinedthrifers'); ?>"><?= lang('master.view_all_thrifters'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('allpaymentreport'); ?>"><?= lang('master.all_payment_report'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('alluserbvnreport'); ?>"><?= lang('master.all_user_bvn_report'); ?></a>
                                    </li>

                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="zmdi zmdi-album"></i>
                                    <span><?= lang('master.message'); ?></span> </a>
                                <ul class="submenu">
                                    <li>
                                        <a href="<?= base_url('write_message'); ?>"><?= lang('master.write_message'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('outbox'); ?>"><?= lang('master.outbox'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('inbox'); ?>"><?= lang('master.inbox'); ?></a>
                                    </li>

                                </ul>
                            </li>


                            <li class="has-submenu">
                                <a href="#"><i class="zmdi zmdi-format-list-bulleted"></i>
                                    <span><?= lang('master.user'); ?></span> </a>
                                <ul class="submenu">
                                    <li><a href="<?= base_url('admin/user/list'); ?>"><?= lang('master.users'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('admin/user/create'); ?>"><?= lang('master.create_user'); ?></a>
                                    </li>

                                </ul>
                            </li>



                            <li class="has-submenu">
                                <a href="#"><i class="zmdi zmdi-collection-text"></i><span> <?= lang('master.settings'); ?> </span></a>
                                <ul class="submenu">
                                    <li><a href="<?= base_url('generalsettings'); ?>"><?= lang('master.general_settings'); ?></a></li>
                                    <li><a href="<?= base_url('paymentsettings'); ?>"><?= lang('master.payment_settings'); ?></a></li>
                                    <li><a href="<?= base_url('emailtemplate'); ?>"><?= lang('master.email_templates'); ?></a></li>
                                    <li>
                                        <a href="<?= base_url('othersetting');?>"><?= lang('master.other_setting');?></a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('termsandconditions');?>"><?= lang('master.terms_and_conditions');?></a>
                                    </li>                                    
                                </ul>
                            </li>

                        </ul>
                        <!-- End navigation menu  -->
                    </div>
                </div>
            </div>
        </header>
        <!-- End Navigation Bar-->


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="wrapper">



            <script type="text/javascript">
                $(function () {

                    $.ajax({
                        url: '<?php echo base_url() . 'common_module/get_site_detail' ?>',
                        type: 'GET',
                        success: function (data) {
                            var all_data = JSON.parse(data);

                            $('#site_name').html('');


                            if (all_data.site_logo) {
                                $('#img_logo').attr('src', '' + 'image/' + all_data.site_logo);
                            }


                            if (!all_data.user_image[0]['user_profile_image'] || all_data.user_image[0]['user_profile_image'] == '' || all_data.user_image[0]['user_profile_image'] == null) {
                                $('#user_image').attr('src', '<?= base_url() ?>' + 'base_demo_images/user_profile_image_demo.png');
                            } else {
                                $('#user_image').attr('src', '' + 'image/' + all_data.user_image[0]['user_profile_image']);
                            }


                        }
                    });

                });
            </script>

            <script type="text/javascript">
                $(function () {

                    $.ajax({
                        url: '<?php echo base_url() . 'common_module/get_notifications_by_ajax' ?>',
                        type: 'GET',
                        success: function (noti) {
                            if (noti) {
                                $('#noti').html(noti);
                            }
                        }
                    });

                });
            </script>

            <!--check if user is active-->
            <script>
                $(function () {

                    $.ajax({
                        url: '<?php echo base_url() . 'common_module/check_if_user_is_active_with_ajax' ?>',
                        type: 'GET',
                        success: function (res) {
                            // nothing to write
                        }
                    });

                });
            </script>

            <?php echo $this->renderSection('content'); ?>


            <style>
                .footer {
                    border-top: 1px solid rgba(67, 89, 102, 0.1);
                    bottom: 0px;
                    color: #58666e;
                    text-align: center!important;
                    padding: 20px 0px;
                    position: absolute;
                    right: 0px;
                    left: 0px;
                }
            </style>

            <footer class="footer">
                ©<?= date('Y'); ?>. Prosperis & Associates, LLC, USA. All rights reserved. Powered by <a target="_blank" href="https://www.obsvirtual.com/">OBS</a>
            </footer>


        </div>
        <!-- END wrapper -->


        <script>
            var resizefunc = [];
        </script>

        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });
        </script>


        <script src="<?php echo base_url(); ?>/assets/backend_assets/js/popper.min.js"></script><!-- Tether for Bootstrap -->
        <script src="<?php echo base_url(); ?>/assets/backend_assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/js/detect.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/js/fastclick.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/switchery/switchery.min.js"></script>

        <!-- Tour page js -->
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/hopscotch/js/hopscotch.min.js"></script>

        <!--dropify-->
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/fileuploads/js/dropify.min.js"></script>

        <!-- Counter Up  -->
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/counterup/jquery.counterup.min.js"></script>

        <!-- Modal-Effect -->
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/custombox/js/custombox.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/custombox/js/legacy.min.js"></script>

        <!-- Required datatable js -->
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!--swal-->
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>

        <!--jquery-ui-->
        <!--<script src="assets/backend_assets/plugins/jquery-ui/jquery-ui.min.js"></script>-->

        <!--datepicker-->
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

        <!--daterangepicker and moment js-->
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/moment/moment.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!--timepicker js-->
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>

        <!--colorpicker-->
        <script src="<?php echo base_url(); ?>/assets/backend_assets/plugins/mjolnic-bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>





        <!-- App js -->
        <script src="<?php echo base_url(); ?>/assets/backend_assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url(); ?>/assets/backend_assets/js/jquery.app.js"></script>


        <!-- Validation js (Parsleyjs) -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/assets/backend_assets/plugins/parsleyjs/parsley.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                
                $('form').parsley();

                $(".zmdi-notifications-none").click(function () {
                    window.location.href = '<?= base_url("inbox"); ?>';
//                    alert("Handler for .click() called.");
                });

            });
        </script>


    </body>

