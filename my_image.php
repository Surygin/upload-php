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
    *{
      box-sizing: border-box;
    }
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
      display: inline-block;
      width: 100px;
      margin: 5px;
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
    <p><a class="link" href="image_view.php">Все изображения</a><a class="link" href="logout.php">Выйти</a></p>
  </header>
  <hr>
  <section>
      <div class="all">
        <div class="img">
          <?php 
          $img = get_img_by_id($_SESSION['user_id']);
          #var_dump($img);

          foreach ($img as $i) { ?>
            <img src="upload/<?php echo $i['name'] ?>">
          <?php };
          ?>
        </div> 
      </div> 
  </section>
  <section>
    <div class="all">
        <div class="form">
          <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
            <input type="file" name="img[]" multiple>
            <button>Отправить</button>
          </form>
        </div>
    </div>
  </section>
</body>
</html>
