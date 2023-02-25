<base href="<?php echo base_url(); ?>">
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content=""> 
        <link rel="shortcut icon" href="assets/custom_asset/favicon.ico"> 
         <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/backend_assets/css/main.css">
        <title>Administration – Thrift 2 Win</title>  
    </head>
    <style type="text/css">
        .login_page{
            background: #4C0882; 
        }
        .login_page form{
            background: rgba(255,255,255,1);
            padding: 30px;
            margin-top:30px;
            border-radius: 20px;

        }
        .login_page .form-control{
            border:none; 
            margin: 0;
            font-size: 13px;
            min-height: 50px;
        }
        .login_page .input-group{
            border-bottom: 1px solid #4C0882;
        }
        .login_page .btn-primary{
            background: #4C0882;
            border-radius: 0px;
            min-width: 150px;
            text-align: center;
            cursor: pointer;

        }
        .login_page a{
            color: #4C0882; 
        }
    </style>
    <body class="login_page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 text-center mt-4 pt-4 pb-4">
                    <img src="<?php echo base_url(); ?>/assets/backend_assets/images/logo.png">

                    <?php if (session()->getFlashdata('msg')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif; ?>

                    <form action="<?php echo base_url();?>/auth/update_forget_password/<?= $token ?>" method="post">

                        <?php if(empty($success) && empty($error)) { ?>

                            <div class="input-group mb-3 align-items-center">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="zmdi zmdi-lock-outline"></i></span>
                            </div> 
                            
                            <input type="password"  class="form-control " name="password" placeholder="Password" required value="" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3 align-items-center">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="zmdi zmdi-lock-outline"></i></span>
                            </div> 
                            
                            <input type="password"  class="form-control " name="confirm_password" placeholder="Confirm password" required value="" aria-describedby="basic-addon1">
                            </div>

                            <button class="btn btn-primary" type="submit">Update Password</button>

                        <?php } ?>

                        <?php
                            if (isset($success)) {
                                echo $success;
                            }    
                        ?>

                        <?php if (isset($success)) { ?>
                            <p class="text-white-50">
                                <a href="<?php echo base_url() ?>/" class="fw-medium text-primary">
                                    <button type="button" class="btn btn-success w-100">Login</button>
                                </a>
                            </p>
                        <?php } ?>

                        <?php
                            if (isset($error)) {
                                echo $error;
                            }
                        ?>

                        <?php if(isset($error)) { ?>

                            <div class="input-group mb-3 align-items-center">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="zmdi zmdi-lock-outline"></i></span>
                            </div> 
                            
                            <input type="password"  class="form-control " name="password" placeholder="Password" required value="" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3 align-items-center">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="zmdi zmdi-lock-outline"></i></span>
                            </div> 
                            
                            <input type="password"  class="form-control " name="confirm_password" placeholder="Confirm password" required value="" aria-describedby="basic-addon1">
                            </div>

                            <button class="btn btn-primary" type="submit">Update Password</button>

                        <?php } ?>

                    </form>
                </div>
            </div>
        </div> 
    </body>
</html>