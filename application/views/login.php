<!DOCTYPE html>
<html>

    <head>

        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

        <style type= "text/css" >

            body {
                color: #fff;
                background: #63738a;
                font-family: 'Roboto', sans-serif;
            }
            .container h1{
                margin-top: 125px;
                margin-bottom: 20px;
            }
            .content {
                width: 450px;
                margin: 0 auto;
                color: #999;
                border-radius: 3px;
                background: #f2f3f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 50px 30px 50px 30px;
            }            
            .form-group {
                margin-bottom: 40px;
            }
            .form-row a:first-child {
                color: grey;
            }


        </style>

        <title>RevoTube Login</title>
 
    </head>

    <body>

        <div class="container">

            <br />
            <h1 align="center">Login To Your RevoTube Account</h1>
            <br />

                <div class="content">

                    <?php
                        if($this->session->flashdata('error')) {

                            echo'<div class="alert alert-warning">
                                    '.$this->session->flashdata("error").'
                                </div>';

                        }
                        else if($this->session->flashdata('message')) {

                            echo'<div class="alert alert-success">
                                    '.$this->session->flashdata("message").'
                                </div>';

                        }
                    ?>

                    <form method="post" action="<?php echo base_url(); ?>login/validation">

                        <div class="form-group">

                            <input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" placeholder="Email Address" />
                            <span class="text-danger"><?php echo form_error('user_email'); ?></span>

                        </div>

                        <div class="form-group">

                            <input type="password" name="user_pass" class="form-control" value="<?php echo set_value('user_password'); ?>" placeholder="Password"/>
                            <span class="text-danger"><?php echo form_error('user_pass'); ?></span>

                        </div>

                        <div class="form-row" align="right">
                        
                            <a href="<?php echo base_url(); ?>forgot">Forgot Password?</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="login" value="Login" class="btn btn-info"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo base_url(); ?>register">Register</a>
                            
                        </div>

                    </form>

                    <a class="btn btn-danger" href="<?php echo base_url(); ?>home"  role="button">Home</a>

                </div>

            </div>

        </div>

    </body>
    
</html>