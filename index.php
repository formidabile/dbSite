<?php
  $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
  $result = $mysql->query("SELECT * FROM `users`");
 ?>




<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equive="X-UA-Compatible" content="ie=edge">
    <title>Форма регистрации</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">

</head>

<header>
  <a href="index.php"><img src="img/logo.jpg" class="logo"></a>

  <div class="right_header">


    <ul class="mnu_top">
      <li><a href="reg.php">Регистрация</a></li>
      <li><a href="entr.php">Вход</a></li>
    </ul>
  </div>
</header>
<body>

</body>


</html>
