<html>


<head>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .btn {
            width: 100%;
        }

        .center {
            margin: 0 auto;
        }
    </style>

    <title>Video Upload</title>
</head>

<body class="bg-light">
    <?php $this->load->view('header') ?>
    <div class="container">
        <div class="py-5 text-center">
            <h2>Upload a Video</h2>
        </div>
        <div class="col-md-7 order-md-2 center">
            <span class="text-danger"><?php echo $error; ?></span>
            <?php echo form_open_multipart('upload/do_upload'); ?>
            <div class="mb-3">
                <label for="vid_title">Video Title</label>
                <input type="text" name="vid_title" class="form-control" value="<?php if($this->session->flashdata()){ echo $title; }
                else {echo set_value('vid_title');} ?>" required />
                <span class="text-danger"><?php echo form_error('vid_title'); ?></span>
            </div>

            <div class="mb-3">
                <label for="vid_desc">Description</label>
                <textarea name="vid_desc" class="form-control" rows="10" required><?php if($this->session->flashdata()){ echo($desc);}?> </textarea>
                <span class="text-danger"><?php echo form_error('vid_desc'); ?></span>
            </div>

            <div class="mb-3">
                <input type="file" name="video" size="20" />
            </div>
            <hr class="mb-4">
            <div class="form-group row">
                <div class="col-md-12 mb-3">
                    <input id="upload" type="submit" class="btn btn-primary" value="Upload">
                </div>
            </div>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2020 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>
        var button = document.getElementById('upload');

        button.addEventListener('click', function(){
            button.disabled = true
            button.value = "Uploading..."
        })
        window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.5/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="https://getbootstrap.com/docs/4.5/dist/js/bootstrap.bundle.js"></script>
</body>

</html>