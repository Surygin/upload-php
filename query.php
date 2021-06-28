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

#получение id пользователя по email 
function get_img_all(){
  global $db;
  $sql = $db->query("SELECT * FROM `upload`")->fetchAll(PDO::FETCH_ASSOC);
  return $sql;
};

#загрузка имени файла в БД 
function upload_img($name){
  global $db;
  $insert = $db->prepare("INSERT INTO `upload` (`name`) VALUES (:some_name)");
  $insert->bindParam(":some_name", $name);
  $insert->execute();
  return true;
};