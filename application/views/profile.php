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
                margin-top: 60px;
                margin-bottom: 40px;
            }
            .content {
                width: 450px;
                margin: 0 auto;
                color: #999;
                border-radius: 3px;
                background: #f2f3f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 50px 30px 20px 30px;
            }            
            .form-group {
                color:black;
                margin-bottom: 40px;
            }
            .form-row a:first-child {
                color: grey;
            }


        </style>

        <title><?php echo $name; ?> - RevoTube</title>
 
    </head>

    <body>
        <div class="container">
            <h1 align="center">UwU Hewwo Senpai this is whewe you set up you pwofile ~~ <br />
                Looking fowward to know more about you *blush**blush* ~~ </h1>
            <div class="content">
                <form method="post" action="<?php echo base_url();?>profile/save" role="form">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Username</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" value=<?php echo $name;?> readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">First name</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" name="firstname" value=<?php echo $firstname; ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="lastname" type="text" value=<?php echo $lastname; ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Contact</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="contact" type="text" value=<?php echo $contact; ?>>
                            <span class="text-danger"><?php echo form_error('contact'); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Email</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="email" value=<?php echo $email; ?> readonly>
                        </div>
                    </div>
                

                    <!-- <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Password</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="password" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="password">
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                        <div class="col-lg-9" align="right">
                            <input type="reset" class="btn btn-info" value="Cancel">&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>