<?php 

include_once('query.php');

$path = $_FILES['img']['tmp_name'];
$name = uniqid('img-') . '.jpg';
$path_name = 'upload/' . $name;

var_dump($path); echo '<br>';
var_dump($name); echo '<br>';
var_dump($path_name); echo '<br>';

upload_img($name);
move_uploaded_file($path, $path_name);
header('Location:'.$_SERVER['HTTP_REFERER'].'');