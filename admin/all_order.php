<?php session_start() ?>
<?php require_once '../function/connect.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Все товары</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/card.css">
</head>

<body>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h4 class="my-0 mr-md-auto font-weight-bog">Админ панель магазина Sweet Store</h4>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 btn btn-primary" href="../index.php">На Главную</a>
      <a class="p-2 btn btn-primary" href="../admin.php">Разделы редоктирования</a>
      <a class="p-2 btn btn-primary" href="slider.php">Банер</a>
      <a class="p-2 btn btn-primary" href="../admin/prace.php">Все товары </a>
      <a class="p-2 btn btn-primary" href="stat-baner.php">Статичный банер</a>
      <a class="p-2 btn btn-primary" href="stock.php">Акции</a>
    </nav>
    <a class="btn btn-outline-primary" href="../logout.php">Выйти</a>
  </div>

  <div class="" style="text-align:center">
    <?php if (!empty($_SESSION["login"])) ?>
    <section class="jumbotron text-center">
      <div class="container">
        <?php echo '<h1 class="jumbotron-heading"> Добрый день: ' . $_SESSION['login'] . '</h1>'; ?>
        <p class="lead text-muted">Сегодня:
          <?php echo date("d.m.Y") ?>
        </p>
        <p>Редоктирование всех товаров
        </p>
      </div>
    </section>
  </div>

  <table class='table table-bordered table-scriped'>
    <tr>
      <th>ID зказа</th>
      <th>Дата заказа</th>
      <th>Клиент</th>
      <th>Адресс</th>
      <th>Email</th>
      <th>Телефон</th>
      <th>Товар</th>
      <th>Цена</th>
      <th>Кол-во</th>
      <th>Общая цена</th>
      <th>Удалить</th>
    </tr>

   <?php  $sql = $pdo->prepare("SELECT * FROM `Order`");
$sql->execute();
while ($res = $sql->fetch(PDO::FETCH_OBJ)):
?>
<tr>
  <td><?php echo $res->id ?></td>
  <td><?php echo $res->time ?></td>
  <td><?php echo $res->first_name ?></td>
  <td><?php echo $res->address ?></td>
  <td><?php echo $res->email ?></td>
  <td><?php echo $res->phone ?></td>
  <td><?php echo $res->product_name ?></td>
  <td><?php echo $res->product_quantity ?></td>
  <td><?php echo $res->hotsales ?></td>
  <?php $all_qu = $res->product_quantity * $res->hotsales ?>
  <td><?php echo $all_qu ?></td>
  <td>
    <form method="POST" action="all_order/all_order.php/<?php echo $res->id ?>">
      <input type="hidden" name="_method" value="DELETE">
      <button type="submit" class="btn btn-primary" style="margin-top: 2px;">Удалить</button>
    </form>
  </td>
</tr>
<?php endwhile ?>
    <tr>
      <td colspan='3'></td>
      <td><b></b>Total Price</b.< /td>
      <td></td>
      <td>
        <a href='/basket.php'>
          <button class='btn btn-warning'>Очистить всё</button>
        </a>
      </td>
    </tr>
  </table>
  <script>
  setTimeout(function(){
	location.reload();
}, 30000);
</script>
</body>

</html>