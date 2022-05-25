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
      <li><a href="#">Регистрация</a></li>
      <li><a href="entr.php">Вход</a></li>
    </ul>
  </div>
</header>


<body>
  <div class="container mt-4">

    <div class="row">
      <div class="col">
        <h1>Форма регистрации</h1> <br>
        <form action="php-form/check.php" method="post">
          <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
          <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
          <input type="text" class="form-control" name="name" id="name" placeholder="Введите ФИО"><br>
          <input type="text" class="form-control" name="telefon" id="telefon" placeholder="Введите телефон"><br>
          <input type="text" class="form-control" name="post" id="post" placeholder="Введите должность"><br>
          <input type="text" class="form-control" name="otdel" id="otdel" placeholder="Введите департамент"><br>
          <input type="text" class="form-control" name="email" id="email" placeholder="Введите email"><br>
          <p><select class="form-control" name="boss" id="boss">
            <option selected disabled>Выберите босса</option>
            <?php
            while ($user=mysqli_fetch_assoc($result)){
              ?>
              <option value=<?=$user['id']?> > <?echo $user['name']?></option>
              <?php
              }
               ?>
              </select> </p>

          <button class="btn btn-success" type="submit">Зарегистрировать</button>
        </form>
      </div>

</body>
</html>
