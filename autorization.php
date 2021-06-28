<?php 

session_start();
include_once('query.php');

$login  = $_POST['login'];
$psw    = md5($_POST['psw']);

$msg_error  = 'Пользователь не найден!';
$msg_ok     = 'Вы успешно авторизованы';

#var_dump($login); echo '<br>';
#var_dump($psw);

$login = user_login($login, $psw);
if (!empty($login)){
  $_SESSION['user_id'] = $login;
  $_SESSION['msg'] = $msg_ok;
  header('Location:image_view.php');
}
else {
  $_SESSION['msg'] = $msg_error;
  header('Location:form_login.php');
}
#var_dump($login);