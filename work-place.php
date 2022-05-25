
<?php $numpg=3;
$otdel=$_GET['otdel'];
?>


<?php
$p=$_GET['pg'];
if(!$p) $p=1;

$per1=($p-1)*$numpg;
$per2=($p)*$numpg;
  $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');


if ($otdel!=0)
  $result = $mysql->query("SELECT * FROM `users`  WHERE  `otdel`='$otdel' ORDER BY `id` LIMIT ".$per1.", ".$per2);
else   $result = $mysql->query("SELECT * FROM `users` ORDER BY `id` LIMIT ".$per1.", ".$per2);



  $per=$_COOKIE['user'];
  $result1 = $mysql->query("SELECT * FROM `users` WHERE `id`='$per'");
$polsovatel=mysqli_fetch_assoc($result1);
if ($otdel!=0)
$result2=$mysql->query("SELECT COUNT(*) FROM `users`  WHERE  `otdel`='$otdel'");
else $result2=$mysql->query("SELECT COUNT(*) FROM `users` ");
$count = $result2->fetch_array();

$countpg=intdiv($count[0], $numpg);
$ost=fmod($count[0], $numpg);
if($ost>0) $countpg++;
$size=0;
 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equive="X-UA-Compatible" content="ie=edge">
    <title>Поисковая система компании "Магнит"</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

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
  <div class="container mt-4">
        <h1>БД мобильных телефонов </h1>



          <div class="container">
            <div class="row">


                <table class="table">
                  <thread>
                    <tr>
                      <th>id</th>
                      <th>ФИО</th>
                      <th>login</th>
                      <th>телефон</th>
                      <th>email</th>
                      <th>должность</th>
                      <th>департамент</th>
                      <th>босс</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thread>

                  <tbody>
                    <tr>

                    <?php while($user=mysqli_fetch_assoc($result) and $size<$numpg) {$size++; ?>
                        <td><?php echo $user['id'] ?></td>
                        <td><?php echo $user['name'] ?></td>
                        <td><?php echo $user['login'] ?></td>
                        <td><?php echo $user['telefon'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['post'] ?></td>
                        <td><?php echo $user['otdel'] ?></td>

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
          <?php for($i=1; $i<=$countpg; $i++) {?>
           <p class="hr"><a href="work-place.php?pg=<?=$i?>&otdel=<?=$otdel?>" class="btnpg"><?php echo $i?></a></p>
         <?php } ?>
          <a href="php-form/test.xls" download>выгрузить</a>
          </div>




  </div>
  <script src="js/export.js">

  </script>
</body>
</html>
