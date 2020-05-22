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

        </style>

<title>UwU Video</title>
</head>
<body>

<h2>List of Video</h2>
  <?php if(count($vid_list)){?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Author</th>
            <th>Video</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($vid_list as $vid): ?>
          <tr>
            <td><?=$vid->title;?></td>
            <td><?=$vid->description;?></td>
            <td><?=$vid->author;?></td>
            <td><a href="<?=base_url().'uploads/'.$vid->video;?>" target="_blank"><video src="<?=base_url().'uploads/'.$vid->video;?>" width="100"></a></td>
          </tr>
        <?php endforeach ?>
        </tbody>
      </table>
      <br />
      <a href="<?=base_url().'upload';?>" class="btn btn-primary">Upload More</a>
  <?php } else { ?>
    <h3>Sumimasen senpai no videos were uploaded ;w; <br />Onnegai senapi~ please click this button to upload </h4>
    <a href="<?=base_url().'upload';?>" class="btn btn-primary">upload</a>
  <?php } ?>


</body>
</html>