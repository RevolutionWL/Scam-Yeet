<html>


<head>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .btn {
            width: 100%;
        }

        .center {
            margin: 0 auto;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <title>Video Upload</title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="home">RevoTube</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <!-- php syntax for if log in -->
                    <?php if (isset($_SESSION['id'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="upload">Upload</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION['name']; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="profile">my pwofile owo</a>
                                <a class="dropdown-item" href="home/logout">Log me out onegai</a>
                            </div>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url(); ?>login">Login <span class="sr-only">(current)</span></a>
                        </li>
                    <?php } ?>

            </div>
        </div>
    </nav>
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
                    <input type="submit" class="btn btn-primary" value="Upload">
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
        window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.5/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="https://getbootstrap.com/docs/4.5/dist/js/bootstrap.bundle.js"></script>
</body>

</html>