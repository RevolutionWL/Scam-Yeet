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
            video {
                background: black;
                }
            #top {
              margin-bottom: 20px;
            }
            form {
              padding:10px;
              border-style:solid;
            }
            #allcomment{
              margin-bottom: 10px;
            }
            .container {

                margin-left: 50px;


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

<title>UwU Video</title>
</head>
<body>

  <div class="container">

      <h2>List of Video</h2>

      <video width=75% height=75% autoplay controls>
      <source src="<?= base_url().'uploads/'.$_SESSION['video']?>">
      <source src="<?= base_url().'uploads/'.$_SESSION['video']?>">
      Your browser does not support the video tag.
      </video>

      <a class="btn btn-danger" href="<?php echo base_url(); ?>video/download"  role="button">download</a>

      <div id="top" class="lg-8">
        <h1><?php echo($_SESSION['title'])?></h1>
        <h2><?php echo($_SESSION['description'])?></h2>
        <h2><?php echo($_SESSION['author'])?></h2>
        <?php var_dump($_SESSION)?>
      </div>
      <form method="post" action="<?php echo base_url();?>video/post">
      <div class="comment">
        <textarea name="comment" class="form-control" rows="1" placeholder="Add a comment..." required></textarea>
        <input type="submit" class="btn btn-primary" value="post">
      </div>
      <div id='allcomment'>
        <?php foreach($all_comment as $comment) :?>
          <h4><strong><?= $comment->user; ?></strong></h4>
          <p><?= $comment->content; ?></p>
        <?php endforeach ?>
      </div>
  </div>


</body>
</html>