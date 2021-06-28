<?php

session_start();
include_once('query.php');

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Все изображения</title>
</head>
<body>
  <style>
    header{
      display: flex;
      justify-content: space-between;
    }
    .link{
      margin: 5px;
    }
    .all{
      width: 360px;
      margin: 0 auto;
    }
    .img {
      width: 350px;
      margin: 20px;
    }
    img {
      width: 100px;
      margin: 5px;
      float: left;
    }
    .form {
      width: 350px;
      margin: 20px;
      padding: 20px;
      border-radius: 5px;
      background-color: #ccc;
    }
    .form button, input{
      cursor: pointer;
    }
  </style>
  <header>
    <p style="color: tomato;"><?php 
      if (!empty($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
      unset($_SESSION['msg']);
    ?></p>
    <p><a class="link" href="my_image.php">Мои изображения</a><a class="link" href="logout.php">Выйти</a></p>
  </header>
  <hr>
  <section>
      <div class="all">
        <div class="img">
          <?php 
          $img = get_img_all();
          #var_dump($img);

          foreach ($img as $i) { ?>
            <img src="upload/<?php echo $i['name'] ?>">
          <?php };
          ?>
        </div> 
      </div> 
    </section>
</body>
</html>
