<?php
  $id=$_GET['id'];
  $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
  $result=$mysql->query("SELECT * FROM `users` WHERE `id`='$id'");
  $user = $result->fetch_assoc();


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
    <a href="index.php" class="logotipe"><img src="img/logo.jpg" class="logo"></a>
  <div class="right_header">


    <ul class="mnu_top">
      <li><a href="otdel.php" class="btns">База Данных</a></li>
      <li><a href="search.php" class="btns">Поиск</a></li>
      <li><a href="reg.php" class="btns">Регистрация</a></li>
      <li><a href="php-form/exit.php" class="btns">Выход</a></li>

    </ul>
  </div>
</header>
<body>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Форма редактирования</h>

        <form action="php-form/redeit.php" method="post">
          <input type="hidden" name="id" value="<?=$id?>">
          <input type="text" class="form-control" name="login" id="login" value="<?= $user['login']?>" placeholder="Введите логин"><br>
          <input type="password" class="form-control" name="pass" id="pass"  placeholder="Введите пароль"><br>
          <input type="text" class="form-control" name="name" id="name" value="<?= $user['name']?>" placeholder="Введите ФИО"><br>
          <input type="text" class="form-control" name="telefon" id="telefon" value="<?= $user['telefon']?>" placeholder="Введите телефон"><br>
          <input type="text" class="form-control" name="post" id="post" value="<?= $user['post']?>" placeholder="Введите должность"><br>
          <input type="text" class="form-control" name="email" id="email" value="<?= $user['email']?>" placeholder="Введите email"><br>
          <?php
          $per=$user['boss-id'];
          $boss = $mysql->query("SELECT * FROM `users` WHERE `id`=
          '$per'");
          $user_boss=mysqli_fetch_assoc($boss);
          ?>
          <p><select class="form-control" name="boss" id="email">
            <option value=<?=$user_boss['id']?> selected ><?=$user_boss['name'] ?></option>
            <?php
            $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
            $result=$mysql->query("SELECT * FROM `users`");
            while ($user=mysqli_fetch_assoc($result)){
              ?>
              <option value=<?=$user['id']?> > <?echo $user['name']?></option>
              <?php
              }
               ?>
              </select> </p>

          <button class="btn btn-success" type="submit">Редоктировать</button>


        </form>
          <button class="btn" onclick="document.location='work-place.php'">Отмена</button>
      </div>


    </div>



  </div>
</body>
</html>
