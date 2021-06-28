<?php 

session_start();
include_once('query.php');

$login  = $_POST['login'];
$psw    = md5($_POST['psw']);

$msg_error  = 'Email занят!';
$msg_ok     = 'Вы успешно зарегистрированы';

$user = get_user_id($login, $psw);
#var_dump($user);

if (!empty($user)){
  $_SESSION['msg'] = $msg_error;
  header('Location:form_registrations.php');
}
else {
  user_registration($login, $psw);
  $_SESSION['msg'] = $msg_ok;
  header('Location:form_login.php');
};