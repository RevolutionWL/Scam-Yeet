<!DOCTYPE html>
<html>

    <head>
        
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

        <!-- Script for refreshing captcha -->
        <script>
        $(document).ready(function(){
            $('.refreshCaptcha').on('click', function(){
                $.get('<?php echo base_url().'register/refresh'; ?>', function(data){
                    $('#captImg').html(data);
                });
            });
        });
        </script>

        <style type = "text/css">
            
            body {
                color: #fff;
                background: #63738a;
                font-family: 'Roboto', sans-serif;
            }
            .panel-head {
                width: 600px;
                margin: 0 auto;
                color: #999;
                border-radius: 3px;
                margin-bottom: 15px;
                background: #f2f3f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .panel-head h3 {
                color: #636363;
                margin: 0 0 15px;
                position: relative;
                text-align: center;
            }
            .panel-head h3:before, .panel-head h3:after{
                content: "";
                height: 2px;
                width: 20%;
                background: #d4d4d4;
                position: absolute;
                top: 50%;
                z-index: 2;
            }	
            .panel-head h3:before{
                left: 0;
            }
            .panel-head h3:after{
                right: 0;
            }

        </style>

        <title>RevoTube Register</title>

    </head>

    <body>
        <div class="container">
            <br />
            <h1 align="center">Your Journey To Endless Possibilities</h1>
            <br />

            <div class="panel-head">

                <h3>Register Your Account</h3>

                <div class="panel-body">
                    <?php
                        if($this->session->flashdata('message')) {

                            echo'<div class="alert alert-success">
                                '.$this->session->flashdata("message").'
                                </div>';

                        }
                        else if ($this->session->flashdata('error')){

                            echo'<div class="alert alert-danger">
                                '.$this->session->flashdata("error").'
                                </div>';

                        }
                    ?>
                    
                    <form method="post" action="<?php echo base_url();?>register/validation">

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user_name" class="form-control" value="<?php echo set_value ('user_name'); ?>"/>
                            <span class="text-danger"><?php echo form_error('user_name'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>"/>
                            <span class ="text-danger"><?php echo form_error('user_email'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="user_pass" class="form-control" value="<?php echo set_value('user_pass'); ?>"/>
                            <span class ="text-danger"><?php echo form_error('user_pass'); ?></span>
                        </div>
                        
                        <div class="form-group">
                        <p id="captImg"><?php echo $captchaImg; ?></p>
                        <p>Can't read the image? click <a href="javascript:void(0);" class="refreshCaptcha">here</a> to refresh.</p>
                            <input type="text" name="captcha" value=""/>
                        </div>

                        <!-- <div class="form-group">
                            <label>Re-type your password</label>
                            <input type="password" name="user_pass" class="form-control" value="<?php echo set_value('user_pass'); ?>"/>
                            <span class ="text-danger"><?php echo form_error('user_pass'); ?></span>
                        </div> -->

                        <div class="form-group">
                            <input type="submit" name="register" class="btn btn-info" value="Register" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo base_url(); ?>login">Login</a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </body>

</html>