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

    <div class="lg-8">
    <h1><?php echo($_SESSION['title'])?></h1>
    <h2><?php echo($_SESSION['description'])?></h2>
    <h2><?php echo($_SESSION['author'])?></h2>
    <?php var_dump($_SESSION)?>
    </div>
</div>


</body>
</html>