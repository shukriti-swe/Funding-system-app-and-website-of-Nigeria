<div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">
                            <?php echo lang('page_title_text') ?>
                        </h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="#"><?php echo lang('breadcrumb_home_text') ?></a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo lang('breadcrumb_section_text') ?></a></li>
                            <li class="breadcrumb-item active"><?php echo lang('breadcrumb_page_text') ?></li>
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
                            <?php if ($this->session->flashdata('group_add_success')) { ?>
                                <br>
                                <div class="col-md-6">
                                    <div class="panel panel-success copyright-wrap" id="add-success-panel">
                                        <div class="panel-heading"><?php echo lang('successfull_text') ?>
                                            <button type="button" class="close" data-target="#add-success-panel" data-dismiss="alert"><span
                                                        aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                                            </button>
                                        </div>
                                        <div class="panel-body"><?php echo lang('add_successfull_text') ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('group_update_success')) { ?>
                                <br>
                                <div class="col-md-6">
                                    <div class="panel panel-success copyright-wrap" id="update-success-panel">
                                        <div class="panel-heading"><?php echo lang('successfull_text') ?>
                                            <button type="button" class="close" data-target="#update-success-panel" data-dismiss="alert"><span
                                                        aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                                            </button>
                                        </div>
                                        <div class="panel-body"><?php echo lang('update_successfull_text') ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- Main content -->
                           <section class="content">
                                <div class="row">

                                    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8">
                                        <!-- general form elements -->
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <h5 class="box-title"><?php echo lang('page_subtitle_text') ?></h5>
                                                
                                                <div class=" col-md-offset-2 col-md-8" style="color: maroon;font-size: larger">
                                                    <?php if ($this->session->flashdata('validation_errors')) echo
                                                    $this->session->flashdata('validation_errors');
                                                    ?>

                                                </div>
                                                <div class="col-md-2"></div>

                                                <div class=" col-md-offset-2 col-md-12" style="color: darkgreen;font-size: larger">
                                                    <br>
                                                    <?php if ($this->session->flashdata('update_success_text')){?>
                                                        <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button><?php echo lang('update_success_text') ?>
                                                        </div>
                                                    <?php }?>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                            <form action="<?php echo base_url() . 'settings_module/update_datetime_settings' ?>" role="form"
                                                  id="" method="post" enctype="multipart/form-data">
                                                <div class="box-body">
                                                    <!--timezone starts-->
                                                    <div class="form-group">
                                                        <label for="time_zone"><?php echo lang('label_time_zone_text') ?></label>

                                                        <select class="form-control select2" name="time_zone" id="">

                                                            <?php if ($all_timezones) foreach ($all_timezones as $a_timezone) { ?>
                                                                <option value="<?php echo $a_timezone->zone_name ?>"
                                                                    <?php
                                                                    if ($all_datetime_settings) {
                                                                        foreach ($all_datetime_settings as $a_datetime_settings) {
                                                                            if (($a_datetime_settings->settings_key == 'time_zone')
                                                                                && ($a_datetime_settings->settings_value == $a_timezone->zone_name)
                                                                            )
                                                                                echo 'selected';
                                                                        }
                                                                    }
                                                                    ?>
                                                                        class="">
                                                                    <?php echo $a_timezone->zone_name ?>
                                                                </option>
                                                            <?php } ?>

                                                        </select>
                                                    </div>
                                                    <!--timezone ends-->

                                                    <!--date format starts-->
                                                    <div class="form-group">
                                                        <label for="date_format"><?php echo lang('label_date_format_text') ?></label>
                                                        <select class="form-control select2" name="date_format" id="">

                                                            <option value="j M, Y"
                                                                <?php if($date_format_settings && $date_format_settings->settings_value == 'j M, Y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('j M, Y') ?>
                                                                &nbsp;
                                                                <?php echo lang('short_month_name_text') ?>
                                                            </option>

                                                            <option value="M j, Y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'M j, Y' )
                                                                echo 'selected'; ?>>
                                                                <?php echo date('M j, Y') ?>
                                                                &nbsp;
                                                                <?php echo lang('short_month_name_text') ?>
                                                            </option>

                                                            <option value="M j, y"
                                                                <?php if($date_format_settings && $date_format_settings->settings_value == 'M j, y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('M j, y') ?>
                                                                &nbsp;
                                                                <?php echo lang('short_month_name_text') ?>
                                                            </option>

                                                            <option value="l, M j, Y"
                                                                <?php if($date_format_settings && $date_format_settings->settings_value == 'l, M j, Y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('l, M j, Y') ?>
                                                                &nbsp;
                                                                <?php echo lang('short_month_name_text') ?>
                                                            </option>
                                                            <option value="l, M j, y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'l, M j, y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('l, M j, y') ?>
                                                                &nbsp;
                                                                <?php echo lang('short_month_name_text') ?>
                                                            </option>
                                                            <option value="D, M j, Y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'D, M j, Y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('D, M j, Y') ?>
                                                                &nbsp;
                                                                <?php echo lang('short_month_name_text') ?>
                                                            </option>
                                                            <option value="D, M j, y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'D, M j, y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('D, M j, y') ?>
                                                                &nbsp;
                                                                <?php echo lang('short_month_name_text') ?>

                                                            </option>

                                                            <option value="F j, Y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'F j, Y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('F j, Y') ?>
                                                            </option>
                                                            <option value="F j, y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'F j, y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('F j, y') ?>
                                                            </option>

                                                            <option value="l, F j, Y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'l, F j, Y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('l, F j, Y') ?>
                                                            </option>
                                                            <option value="l, F j, y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'l, F j, y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('l, F j, y') ?>
                                                            </option>

                                                            <option value="D, F j, Y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'D, F j, Y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('D, F j, Y') ?>
                                                                &nbsp;
                                                            </option>
                                                            <option value="D, F j, y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'D, F j, y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('D, F j, y') ?>
                                                                &nbsp;
                                                            </option>

                                                            <option value="Y-m-d"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'Y-m-d' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('Y-m-d') ?>
                                                            </option>
                                                            <option value="Y/m/d"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'Y/m/d' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('Y/m/d') ?>
                                                            </option>
                                                            <option value="Y.m.d"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'Y.m.d' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('Y.m.d') ?>
                                                            </option>

                                                            <option value="d-m-Y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'd-m-Y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('d-m-Y') ?>
                                                            </option>
                                                            <option value="d/m/Y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'd/m/Y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('d/m/Y') ?>
                                                            </option>
                                                            <option value="d.m.Y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'd.m.Y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('d.m.Y') ?>
                                                            </option>

                                                            <option value="m-d-Y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'm-d-Y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('m-d-Y') ?>
                                                            </option>
                                                            <option value="m/d/Y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'm/d/Y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('m/d/Y') ?>
                                                            </option>
                                                            <option value="m.d.Y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'm.d.Y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('m.d.Y') ?>
                                                            </option>

                                                            <option value="d-m-y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'd-m-y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('d-m-y') ?>
                                                            </option>
                                                            <option value="d/m/y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'd/m/y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('d/m/y') ?>
                                                            </option>
                                                            <option value="d.m.y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'd.m.y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('d.m.y') ?>
                                                            </option>

                                                            <option value="m-d-y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'm-d-y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('m-d-y') ?>
                                                            </option>
                                                            <option value="m/d/y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'm/d/y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('m/d/y') ?>
                                                            </option>
                                                            <option value="m.d.y"
                                                            <?php if($date_format_settings && $date_format_settings->settings_value == 'm.d.y' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('m.d.y') ?>
                                                            </option>

                                                        </select>
                                                    </div>
                                                    <!--date format ends-->

                                                    <!--time format statrs-->
                                                    <div class="form-group">
                                                        <label for="time_format"><?php echo lang('label_time_format_text') ?></label>
                                                        <select class="form-control select2" name="time_format" id="">
                                                            <option value="g:i a"
                                                                <?php if($time_format_settings && $time_format_settings->settings_value == 'g:i a' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('g:i a') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('12_hrs_format') ?>
                                                                &nbsp;
                                                                <?php echo lang('without_leading_zero') ?>
                                                            </option>
                                                            <option value="g.i a"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'g.i a' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('g.i a') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('12_hrs_format') ?>
                                                                &nbsp;
                                                                <?php echo lang('without_leading_zero') ?>
                                                            </option>
                                                            <option value="g-i a"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'g-i a' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('g-i a') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('12_hrs_format') ?>
                                                                &nbsp;
                                                                <?php echo lang('without_leading_zero') ?>
                                                            </option>

                                                            <option value="g:i A"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'g:i A' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('g:i A') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('12_hrs_format') ?>
                                                                &nbsp;
                                                                <?php echo lang('without_leading_zero') ?>
                                                            </option>
                                                            <option value="g.i A"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'g.i A' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('g.i A') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('12_hrs_format') ?>
                                                                &nbsp;
                                                                <?php echo lang('without_leading_zero') ?>
                                                            </option>
                                                            <option value="g-i A"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'g-i A' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('g-i A') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('12_hrs_format') ?>
                                                                &nbsp;
                                                                <?php echo lang('without_leading_zero') ?>
                                                            </option>

                                                            <option value="h:i a"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'h:i a' )
                                                                    echo 'selected'; ?>>
                                                            <?php echo date('h:i a') ?>
                                                            &nbsp;&nbsp;
                                                            <?php echo lang('12_hrs_format') ?>
                                                            </option>
                                                            <option value="h.i a"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'h.i a' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('h.i a') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('12_hrs_format') ?>
                                                            </option>
                                                            <option value="h-i a"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'h-i a' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('h-i a') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('12_hrs_format') ?>
                                                            </option>

                                                            <option value="h:i A"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'h:i A' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('h:i A') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('12_hrs_format') ?>
                                                            </option>
                                                            <option value="h.i A"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'h.i A' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('h.i A') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('12_hrs_format') ?>
                                                            </option>
                                                            <option value="h-i A"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'h-i A' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('h-i A') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('12_hrs_format') ?>
                                                            </option>

                                                            <option value="h:i:s a"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'h:i:s a' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('h:i:s a') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('12_hrs_format') ?>
                                                            </option>
                                                            <option value="h:i:s A"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'h:i:s A' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('h:i:s A') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('12_hrs_format') ?>
                                                            </option>

                                                            <option value="G:i"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'G:i' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('G:i') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('24_hrs_format') ?>
                                                                &nbsp;
                                                                <?php echo lang('without_leading_zero') ?>
                                                            </option>
                                                            <option value="G.i"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'G.i' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('G.i') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('24_hrs_format') ?>
                                                                &nbsp;
                                                                <?php echo lang('without_leading_zero') ?>
                                                            </option>
                                                            <option value="G-i"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'G-i' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('G-i') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('24_hrs_format') ?>
                                                                &nbsp;
                                                                <?php echo lang('without_leading_zero') ?>
                                                            </option>

                                                            <option value="G:i:s"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'G:i:s' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('G:i:s') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('24_hrs_format') ?>
                                                                &nbsp;
                                                                <?php echo lang('without_leading_zero') ?>
                                                            </option>

                                                            <option value="H:i"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'H:i' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('H:i') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('24_hrs_format') ?>
                                                            </option>
                                                            <option value="H.i"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'H.i' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('H.i') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('24_hrs_format') ?>
                                                            </option>
                                                            <option value="H-i"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'H-i' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('H-i') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('24_hrs_format') ?>
                                                            </option>

                                                            <option value="H:i:s"
                                                            <?php if($time_format_settings && $time_format_settings->settings_value == 'H:i:s' )
                                                                    echo 'selected'; ?>>
                                                                <?php echo date('H:i:s') ?>
                                                                &nbsp;&nbsp;
                                                                <?php echo lang('24_hrs_format') ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <!--time format ends-->


                                                </div>
                                                <!-- /.box-body -->

                                                <div class="box-footer">


                                                    <button type="submit" id="btnsubmit"
                                                            class="btn btn-primary"><?php echo lang('button_submit_text') ?></button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.box -->
                                    </div>


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
        </div>



<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
    })
</script>


