<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile</title>

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
            <h2>Profile</h2>
            <p class="lead">Update your details by filling in the fields below.</p>
        </div>
        <div class="col-md-9 order-md-2 center">
            <h4 class="mb-3">Update Profile</h4>
            <form method="post" action="<?php echo base_url(); ?>profile/save" role="form">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input class="form-control" type="text" name="firstname" value="<?php echo $_SESSION['firstname']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input class="form-control" name="lastname" type="text" value="<?php echo $_SESSION['lastname']; ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input class="form-control" type="text" id="username" value="<?php echo $_SESSION['name']; ?>" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" value="<?php echo $_SESSION['email']; ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="address">Contact</label>
                    <input class="form-control" name="contact" type="text" value="<?php echo $_SESSION['contact']; ?>">
                    <span class="text-danger"><?php echo form_error('contact'); ?></span>
                </div>

                <hr class="mb-4">

                <h4>Change Password</h4>
                <p class="text-muted">You may leave these fields blank if you do not wish to change your password.</p>

                <div class="mb-3">
                    <label for="address">Current Password</label>
                    <input class="form-control" name="password" type="password">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control" id="new-password" placeholder="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="confirm-password">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirm-password" placeholder="">
                    </div>
                </div>
                <hr class="mb-4">
                <div class="form-group row">
                    <div class="col-md-6 mb-3">
                        <input type="reset" class="btn btn-info" value="Cancel">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="submit" class="btn btn-primary" value="Save">
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