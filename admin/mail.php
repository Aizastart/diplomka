<?php session_start(); ?>
<?php require_once '../function/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Банер</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/card.css">
</head>

<body style='height: 800px;'>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h4 class="my-0 mr-md-auto font-weight-bog">Админ панель магазина Sweet Store</h4>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 btn btn-primary" href="../index.php">На Главную</a>
      <a class="p-2 btn btn-primary" href="../admin.php">Разделы редоктирования</a>
      <a class="p-2 btn btn-primary" href="#">Банер</a>
      <a class="p-2 btn btn-primary" href="prace.php">Все товары </a>
      <a class="p-2 btn btn-primary" href="stat-baner.php">Статичный банер</a>
      <a class="p-2 btn btn-primary" href="stock.php">Акции</a>
      <a class="p-2 btn btn-primary" href="#">Обратная связь</a>
    </nav>
    <a class="btn btn-outline-primary" href="../logout.php">Выйти</a>
  </div>  
  <div class="" style="text-align:center">

    <?php if (!empty($_SESSION["login"])): ?>
      <section class="jumbotron text-center">

        <div class="container">
          <?php echo '<h1 class="jumbotron-heading"> Добрый день: ' . $_SESSION['login'] . '</h1>'; ?>
          <p class="lead text-muted">Сегодня:
            <?php echo date("d.m.Y") ?>
          </p>
          <p>Обратная связь
          </p>
          
                </div>
            </section>
          </div>
          
          
          <div class=" album  w-60  ">
                <div class=" container">
              <div class="row">
            <?php 
            $sql = $pdo->prepare("SELECT * FROM user_message");
            $sql->execute();
            while ($res = $sql->fetch(PDO::FETCH_OBJ)): ?>
                <div class="card card1 trei">
                  <div class="row ">
                    <div class="col-md-12">
                      <div class="card-body trei" style='background: while;'>
                        
                          <p>Пользователь </p>
                          <h5><?php echo $res->name?></h5>
                          <p>Email </p>
                          <h5><?php echo $res->email ?></h5>
                          <p>Сообщение </p>

                          <p><?php echo $res->content ?>
                          
                        
                          
                        
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile ?>
              </div>
        </div>
    </div>
  <?php else:
      echo '<h2>Доступ закрыт</h2><br>';
      echo '<a href="/" class="btn btn-primary">На главную</a>';
      ?>
  <?php endif ?>