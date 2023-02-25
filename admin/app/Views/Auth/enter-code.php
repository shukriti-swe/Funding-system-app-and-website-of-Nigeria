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

                    <form action="<?php echo base_url();?>/auth/reset_password" method="post"> 
                         <?php

                            if (isset($invalidToken)) {
                                echo $invalidToken;
                            }    
                            if (session()->getFlashdata('success')) {
                                echo session()->getFlashdata('success');
                            }
                        ?>

                        <div class="input-group mb-3 align-items-center">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="zmdi zmdi-account-o"></i></span>
                          </div> 
                          <input id="code" class="form-control" type="text" name="code" placeholder="Enter Your Code" value=""  aria-describedby="basic-addon1" required>

                          <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                echo $validation->getError('code');
                            } ?>
                        </small>

                        </div>
                        
                        
                        <button class="btn btn-primary" type="submit">Send Email</button>

                    </form>
                </div>
            </div>
        </div> 
    </body>
</html>