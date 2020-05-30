<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/album/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css">


    <style>
        .jumbotron {
            padding-top: 3rem;
            padding-bottom: 3rem;
            margin-bottom: 0;
            background-color: #fff;
        }

        @media (min-width: 768px) {
            .jumbotron {
                padding-top: 6rem;
                padding-bottom: 6rem;
            }
        }

        .jumbotron p:last-child {
            margin-bottom: 0;
        }

        .jumbotron h1 {
            font-weight: 300;
        }

        .jumbotron .container {
            max-width: 40rem;
        }

        footer {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        footer p {
            margin-bottom: .25rem;
        }
    </style>

    <title>RevoTube</title>

</head>

<body>
    <header>
        <?php $this->load->view('header'); ?>
    </header>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1>Videos of the World</h1>
                <p class="lead text-muted">Search for any videos!</p>
                <form class="form-inline row justify-content-md-center" method="post" action="<?php echo base_url() . 'home/search'; ?>">
                    <input class="form-control col-8 mr-sm-2" type="search" name="keyword" placeholder="Search">
                    <input class="btn btn-outline-success col-3" type="submit" value="Search"></input>
                </form>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <?php if (isset($search)) { ?>
                    <h3 class="result">Search results for <?php echo $key ?>:</h3>
                <?php } ?>
                <?php if ($vid_list) { ?>
                    <div class="row">
                        <?php foreach (array_reverse($vid_list) as $vid) : ?>
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <a class="video" href="<?= base_url() . 'video/play/' . $vid->vid_id; ?>" target="_self"><video src="<?= base_url() . 'uploads/' . $vid->video; ?>" width="100%" height="225"></a>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $vid->title; ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted"><?= $vid->author; ?></h6>
                                        <p class="card-text text-truncate"><?= $vid->description; ?></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                            </div>
                                            <small class="text-muted">9 mins</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php } else { ?>
                        <p class="lead text-muted">There are currently no videos available.</p>
                    </div>
                <?php } ?>

                <!-- <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg>
                                <div class="card-body">
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
            </div>
        </div>

    </main>

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
        </div>
    </footer>
    <?php if($this->session->flashdata()) {?>
            <script>
            alert('Successfully Uploaded!')
            </script>
    <?php } ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>
        Notification.requestPermission().then(function(result) {
            console.log(result);
        });
        var videos = document.getElementsByClassName('video');

        // console.log(videos);
        // console.log(Notification.permission);
        // console.log(window.Notification);

        videos[0].addEventListener('click', function() {
            alert('hi');
            if (Notification.permission === "granted") {
                var text = 'OWO you clicked a videooo';
                var notification = new Notification('UwU', {
                    body: text
                });
            }

        });
        window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.5/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="https://getbootstrap.com/docs/4.5/dist/js/bootstrap.bundle.js"></script>
</body>

</html>