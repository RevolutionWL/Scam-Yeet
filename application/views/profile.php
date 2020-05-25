<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Checkout example · Bootstrap</title>

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

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="#">RevoTube</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <!-- php syntax for if log in -->
                    <?php if ($this->session->userdata('id')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="upload">Upload</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $name; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="profile">my pwofile owo</a>
                                <a class="dropdown-item" href="home/logout">Log me out onegai</a>
                            </div>
                        </li>
                    <?php elseif (!$this->session->userdata('id')) : ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url(); ?>login">Login <span class="sr-only">(current)</span></a>
                        </li>
                    <?php endif; ?>

            </div>
        </div>
    </nav>
    <div class="container">
        <div class="py-5 text-center">
            <!-- <img class="d-block mx-auto mb-4" src="images\ProfileIcon.svg" alt="" width="72" height="72"> -->
            <h2>Profile</h2>
            <p class="lead">Update your details by filling in the fields below.</p>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your Details</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Product name</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$12</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Second product</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$8</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Third item</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                        </div>
                        <span class="text-success">-$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>$20</strong>
                    </li>
                </ul>

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Update Profile</h4>
                <form method="post" action="<?php echo base_url(); ?>profile/save" role="form">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input class="form-control" type="text" name="firstname" value=<?php echo $firstname; ?>>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input class="form-control" name="lastname" type="text" value=<?php echo $lastname; ?>>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input class="form-control" type="text" id="username" value=<?php echo $name; ?> readonly>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input class="form-control" type="email" value=<?php echo $email; ?> readonly>
                    </div>

                    <div class="mb-3">
                        <label for="address">Contact</label>
                        <input class="form-control" name="contact" type="text" value=<?php echo $contact; ?>>
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
    <script src="form-validation.js"></script>
</body>

</html>