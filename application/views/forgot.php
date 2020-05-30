<!DOCTYPE html>
<html>

    <head>

        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <style>
            body {
                color: #fff;
                background: #63738a;
                font-family: 'Roboto', sans-serif;
            }
            .container h1{
                margin-top: 60px;
                margin-bottom: 40px;
            }
            .content {
                width: 700px;
                margin: 0 auto;
                color: black;
                border-radius: 3px;
                background: #f2f3f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 50px 30px 20px 30px;
            } 
            </style>

    <title>Reset Password - Revotube</title>

    </head>

    <body>
    <div class="container">
            <h1 align="center">UwU Hewwo carewess senpai ~~ <br />
                Don't wowwy you can weset your passwowd hewe ~~ </h1>
            <div class="content">
            <?php
                        if($this->session->flashdata('message')) {

                            echo'<div class="alert alert-success">
                                '.$this->session->flashdata("message").'
                                </div>';

                        }
            ?>
                <form method="post" action="<?php echo base_url();?>forgot/sendlink" role="form">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Email</label>
                        <div class="col-lg-9">
                            <input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>"/>
                            <span class ="text-danger"><?php echo form_error('user_email'); ?></span>
                        </div>
                    </div>
                    <div align="right">
                        <input type="submit" class="btn btn-info" value="Onnegai">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>