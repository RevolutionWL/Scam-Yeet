<html>


    <head>
            
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
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

        </style>

        <title>Upload Form</title>
    </head>

    <body>
        <div class ="container">
            <div class="panel-head">
                <?php echo $error;?>

                <?php echo form_open_multipart('upload/do_upload');?>

                <div class="form-group">
                    <label>Video Title</label>
                    <input type="text" name="vid_title" class="form-control" value="<?php echo set_value ('vid_title'); ?>"/>
                    <span class="text-danger"><?php echo form_error('vid_title'); ?></span>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="vid_desc" class="form-control" value="<?php echo set_value('vid_desc'); ?>"/>
                    <span class ="text-danger"><?php echo form_error('vid_desc'); ?></span>
                </div>
                    <input type="file" name="video" size="20" />

                    <br /><br />

                    <input type="submit" value="upload" class="btn btn-info"/>

                </form>
            </div>
        </div>
    </body> 
</html>
