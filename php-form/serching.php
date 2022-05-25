<?php


function search ()
{
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
  $boss=trim($_POST['boss']);

  $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');

  $result=$mysql->query("SELECT * FROM `users` WHERE `login`='$login' OR `name`='$name' OR `telefon`='$telefon' OR `post`='$post' OR `email`='$email' OR `boss-id`='$boss'");

  return $result;
  $mysql->close();

}



 ?>
