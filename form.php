<?php

include_once('query.php');

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Загрузка файла</title>
</head>
<body>
  <style>
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
    <section>
      <div class="all">
        <div class="form">
          <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="img">
            <button>Отправить</button>
          </form>
        </div>
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