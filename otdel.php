
<?php $numdep=3 ?>



<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equive="X-UA-Compatible" content="ie=edge">
    <title>Форма регистрации</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap-grid.min.css">
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

<div class="container">
  <div class="row">
    <div class="col-md-4 bd">
      <a href="http://dbsayt/work-place.php?otdel=0">
        <div class="row">
          <img src="img/worker.jpg">
        </div>
        <div class="row">
          <h3>Все сотрудники</h3>
        </div>
      </a>
    </div>
    <?php for ($i=0; $i<$numdep; $i++){ ?>
    <div class="col-md-4 bd">
      <a href="http://dbsayt/work-place.php?otdel=<?php echo $i+1?>">
        <div class="row">
          <img src="img/worker.jpg">
        </div>
        <div class="row">
          <h3><?php echo $i+1 ?> отдел</h3>
        </div>
      </a>
    </div>
  <?php } ?>


  </div>


</div>


</html>
