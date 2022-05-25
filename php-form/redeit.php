<?php
  $login = filter_var(trim($_POST['login']),
  FILTER_SANITIZE_STRING);
  $name = filter_var(trim($_POST['name']),
  FILTER_SANITIZE_STRING);
  $id=$_POST['id'];
  $telefon = filter_var(trim($_POST['telefon']),
  FILTER_SANITIZE_STRING);
  $post = filter_var(trim($_POST['post']),
  FILTER_SANITIZE_STRING);
  $email = filter_var(trim($_POST['email']),
  FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']),
  FILTER_SANITIZE_STRING);
  $boss=trim($_POST['boss']);


  $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');

if ($pass) {
  $pass = md5($pass."save is true");
$mysql->query("UPDATE `users` SET `login`='$login', `pass`='$pass', `name`='$name', `post`='$post',  `telefon`='$telefon', `email`='$email', `boss-id`='$boss' WHERE `users`.`id`='$id'");
} else $mysql->query("UPDATE `users` SET `login`='$login',  `name`='$name', `post`='$post',  `telefon`='$telefon', `email`='$email', `boss-id`='$boss' WHERE `users`.`id`='$id'");


  $mysql->close();

header('Location: export.php');

?>
