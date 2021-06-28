<?php 

include_once('query.php');

$msg_error  = 'Ошибка загрузки';
$msg_ok     = 'Файл загружен';

$files = $path = $_FILES['img']['tmp_name'];
$i = 0;

$user_id = $_POST['user_id'];

foreach ($files as $file) {
  $path = $_FILES['img']['tmp_name'];
  $name = uniqid('img-') . '.jpg';
  $path_name = 'upload/' . $name;
  $old_name = $_FILES['img']['name'];

  #var_dump($path[$i]); echo '<br>';
  #var_dump($name); echo '<br>';
  #var_dump($old_name[$i]); echo '<br>';

  if (!empty($old_name[$i])){
    upload_img($name, $user_id);
    move_uploaded_file($path[$i], $path_name);
    $_SESSION['msg'] = $msg_ok;
  }
  else {
    $_SESSION['msg'] = $msg_error;
  }

  $i++;

}


#var_dump($_FILES);

header('Location:'.$_SERVER['HTTP_REFERER'].'');