<?php

session_start();

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
      text-align: center;
    }
    .form button, input{
      margin: 5px;
      cursor: pointer;
    }
    .form input{
      width: 300px;
      padding: 5px;
    }
  </style>
    <section>
      <div class="all">
        <div class="form">
          <form action="registrations.php" method="POST">
          <h2>Регистрация</h2>
          <p style="color: tomato;"><?php 
              if (!empty($_SESSION['msg'])){
                echo $_SESSION['msg'];
              }
              unset($_SESSION['msg']);
            ?></p>
            <input type="email" name="login" placeholder="email">
            <input type="password" name="psw" placeholder="Password">
            <button>Регистрация</button>
            У меня есть аккаунт. <a href="form_login.php">Войти</a>
          </form>
        </div>
      </div> 
    </section>
</body>
</html>