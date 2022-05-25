<?php
$mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
  $id=$_GET['id'];
$mysql->query("DELETE FROM `users` WHERE `users`.`id` ='$id'");
header('Location: http://dbsayt/work-place.php');
 ?>
