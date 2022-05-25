<?php
  $login = filter_var(trim($_POST['login']),
  FILTER_SANITIZE_STRING);

  $name = filter_var(trim($_POST['name']),
  FILTER_SANITIZE_STRING);

  $telefon = filter_var(trim($_POST['telefon']),
  FILTER_SANITIZE_STRING);
  $post = filter_var(trim($_POST['post']),
  FILTER_SANITIZE_STRING);
  $email = filter_var(trim($_POST['email']),
  FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']),
  FILTER_SANITIZE_STRING);
  $otdel = filter_var(trim($_POST['otdel']),
  FILTER_SANITIZE_STRING);
  $boss=trim($_POST['boss']);




  $pass = md5($pass."save is true");

  $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
  if ($boss){
  $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`, `boss-id`, `telefon`, `post`, `otdel`, `email`)
  VALUES('$login', '$pass', '$name', '$boss', '$telefon', '$post', '$otdel', '$email')");
} else $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`, `telefon`, `post`, `otdel`, `email`)
VALUES('$login', '$pass', '$name', '$telefon', '$post', '$otdel', '$email')");


  $result=$mysql->query("SELECT * FROM `users` WHERE `id` = (SELECT MAX(`id`) FROM `users`);");
  $nuser = $result->fetch_assoc();
  print_r($nuser);
$per=$nuser['id'];


  $per1=$nuser['boss-id'];
  $boss = $mysql->query("SELECT * FROM `users` WHERE `id`=
  '$per1'");
  $user_boss=mysqli_fetch_assoc($boss);
  $str=$user_boss['bog'];
if (stripos($str, '60')){
$res=' '.$per.' '.$str;
} else {$res=' '.$per.' '.$str.' 60';}

  $mysql->query("UPDATE `users` SET `bog`='$res' WHERE `id`='$per'");


  $mysql->close();

header('Location: export.php');
?>
