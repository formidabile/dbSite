<?php include( "php-form/serching.php"); ?>

<?php $id=$_COOKIE['user'];
 $mysql=new mysqli('localhost', 'root', 'root', 'register-bd');
$result2 = $mysql->query("SELECT * FROM `users` WHERE `id`='$id'");
$polsovatel=mysqli_fetch_assoc($result2);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equive="X-UA-Compatible" content="ie=edge">
    <title>Поисковая страница</title>
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
    <h1>Поисковая страница</h1>
    <div class="row">
      <div class="col">
        <form action="search.php" method="post">
          <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
          <input type="text" class="form-control" name="name" id="name" placeholder="Введите ФИО"><br>
          <input type="text" class="form-control" name="telefon" id="telefon" placeholder="Введите телефон"><br>
          <input type="text" class="form-control" name="post" id="post" placeholder="Введите должность"><br>
          <input type="text" class="form-control" name="email" id="email" placeholder="Введите email"><br>
          <p><select class="form-control" name="boss" id="email">
            <option selected disabled>Выберите босса</option>
            <?php
            while ($user=mysqli_fetch_assoc($result)){
              ?>
              <option value=<?=$user['id']?> > <?echo $user['name']?></option>
              <?php
              }
               ?>
              </select> </p>

          <button class="btn btn-success" type="submit">Поиск</button>
        </form>
      </div>
      <div class="col">
        <?php $result1=search();
         ?>



         <table class="table">
           <thread>
             <tr>
               <th>id</th>
               <th>ФИО</th>
               <th>login</th>
               <th>телефон</th>
               <th>email</th>
               <th>должность</th>
               <th>босс</th>
               <th></th>
               <th></th>
             </tr>
           </thread>

           <tbody>
             <tr>

             <?php while($user=mysqli_fetch_assoc($result1)) { ?>
                 <td><?php echo $user['id'] ?></td>
                 <td><?php echo $user['name'] ?></td>
                 <td><?php echo $user['login'] ?></td>
                 <td><?php echo $user['telefon'] ?></td>
                 <td><?php echo $user['email'] ?></td>
                 <td><?php echo $user['post'] ?></td>

                 <?php
                 $per=$user['boss-id'];



                 $boss = $mysql->query("SELECT * FROM `users` WHERE `id`=
               '$per'");
               $user_boss=mysqli_fetch_assoc($boss);
               ?>
               <td><?php echo $user_boss['name'] ?></td>
               <?php $str1=(string)$user['bog'];
               $str2=(string)$polsovatel['id'];
               if (stripos($str1, $str2)){ ?>
               <td><a href="editbd.php?id=<?=$user['id']?>">Изменить</a></td>
               <td><a style="color: RED" href="php-form/delete.php?id=<?=$user['id']?>">Удалить</a></td>
             <?php } ?>
             </tr>
           <?php } ?>
         </tbody>
     </table>
      </div>
    </div>
  </div>


</body>
</html>
