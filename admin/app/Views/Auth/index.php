<base href="<?php echo base_url(); ?>">
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Thrift2Win gives you the freedom to choose who you want in your group savings circle.">
        <meta name="author" content="Thrift2Win"> 
        <link rel="shortcut icon" href="favicon.ico">
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

                    <form action="<?= base_url('auth/login'); ?>" method="post"> 

                        <div class="input-group mb-3 align-items-center">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="zmdi zmdi-account-o"></i></span>
                            </div> 
                            <input id="email" class="form-control " type="email" name="email" placeholder="Email" required value=""  aria-describedby="basic-addon1" autocomplete="Off">
                        </div>
                        <div class="input-group mb-3 align-items-center">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="zmdi zmdi-lock-outline"></i></span>
                            </div> 

                            <input type="password"  class="form-control " name="password" placeholder="Password" required value="" aria-describedby="basic-addon1">
                        </div>


                        <div class="d-flex justify-content-between align-items-center mb-4"> 
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input ml-0 mt-1" name="remember" value="1" id="rememberme" >
                                <label class="form-check-label" for="rememberme">Remember</label>
                            </div>
                            <a href="<?php echo base_url(); ?>/auth/forgot_password" class="text-body">Forgot password?</a>
                        </div>

                        <button class="btn btn-primary" type="submit">Login</button>

                    </form>
                </div>
            </div>
        </div> 
    </body>
</html>