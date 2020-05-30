<html>

<head>

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

  <link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
    .jumbotron {
      margin-bottom: 0;
      padding: 0 !important;
      background-color: #fff;
    }

    @media (min-width: 768px) {
      .jumbotron {
        padding-bottom: 6rem;
      }
    }

    .jumbotron p:last-child {
      margin-bottom: 0;
    }

    .jumbotron h1 {
      font-weight: 300;
    }


    footer {
      padding-top: 3rem;
      padding-bottom: 3rem;
    }

    footer p {
      margin-bottom: .25rem;
    }

    /* 
    video {
      background: black;
    }

    #top {
      margin-bottom: 20px;
      border-style: solid;
    }

    #top h1 {
      margin-top: 0;
    }

    form {
      padding: 10px;
      border-style: solid;
    }

    #allcomment {
      margin-bottom: 10px;
    }
*/
    .container {
      padding: 0 !important;
    }

    /* width */
    ::-webkit-scrollbar {
      width: 7px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #555;
    }
  </style>

  <title><?php echo $_SESSION['title']; ?></title>
</head>

<body>
  <?php $this->load->view('header') ?>
  <div class="container">

    <section class="jumbotron text-center">
      <video height=70% autoplay controls>
        <source src="<?= base_url() . 'uploads/' . $_SESSION['video'] ?>">
        <source src="<?= base_url() . 'uploads/' . $_SESSION['video'] ?>">
        Your browser does not support the video tag.
      </video>
    </section>
  </div>
  <a class="btn btn-danger" href="<?php echo base_url(); ?>video/download" role="button">download</a>
  <a class="btn btn-danger" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo current_url(); ?>" role="button">Share</a>

  <div class="py-5 bg-light" class="lg-8">
    <div class="container">
      <h1><?php echo ($_SESSION['title']) ?></h1>
      <h3 class="text-muted"><?php echo ($_SESSION['author']) ?></h3>
      <p class="lead text-muted"><?php echo ($_SESSION['description']) ?></p>
    </div>
    <!-- <?php var_dump($_SESSION) ?> -->
    <hr class="mb-4">
    <div class="container">
      <h4 class="mb-3">Comments</h4>
      <form method="post" action="<?php echo base_url(); ?>video/post">
        <div class="comment">
          <textarea name="comment" class="form-control" rows="1" placeholder="Add a comment..." required></textarea>
          <input type="submit" class="btn btn-primary" value="post">
        </div>
        <div id='allcomment'>
          <?php foreach (array_reverse($all_comment) as $comment) : ?>
            <h4><strong><?= $comment->user; ?></strong></h4>
            <p><?= $comment->content; ?></p>
          <?php endforeach ?>
        </div>
    </div>
  </div>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.5/js/vendor/jquery.slim.min.js"><\/script>')
</script>
<script src="https://getbootstrap.com/docs/4.5/dist/js/bootstrap.bundle.js"></script>

</html>