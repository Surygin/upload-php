<?php 

$dbhost = "localhost";
$dbname = "files-php";
$user_login = "admin";
$user_psw = "1234";

// Обработка ошибок подключения
try {
  $db = new PDO("mysql:host=localhost;dbname=$dbname", "$user_login", "$user_psw");
} catch (PDOException $e) {
  print "Error!: " . $e->getMessage();
  die();
}

#авторизация пользователя
function user_login($login, $psw){
  global $db;
  $sql = $db->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$psw'")->fetchAll(PDO::FETCH_ASSOC);
  return $sql[0]['id'];
};

#получение id пользователя
function get_user_id($login){
  global $db;
  $sql = $db->query("SELECT * FROM `users` WHERE `login` = '$login'")->fetchAll(PDO::FETCH_ASSOC);
  return $sql[0]['id'];
};

function user_registration($login, $psw){
  global $db;
  $insert = $db->prepare("INSERT INTO `users` (`login`, `password`) VALUES (:some_login, :some_psw)");
  $insert->bindParam(":some_login", $login);
  $insert->bindParam(":some_psw", $psw);
  $insert->execute();
  return true;
};

#получение id пользователя по email 
function get_img_all(){
  global $db;
  $sql = $db->query("SELECT * FROM `upload`")->fetchAll(PDO::FETCH_ASSOC);
  return $sql;
};

function get_img_by_id($id){
  global $db;
  $sql = $db->query("SELECT * FROM `upload` WHERE `user_id` = $id")->fetchAll(PDO::FETCH_ASSOC);
  return $sql;
};

#загрузка имени файла в БД 
function upload_img($name, $user_id){
  global $db;
  $insert = $db->prepare("INSERT INTO `upload` (`name`, `user_id`) VALUES (:some_name, :some_user)");
  $insert->bindParam(":some_name", $name);
  $insert->bindParam(":some_user", $user_id);
  $insert->execute();
  return true;
};