<?php
$user="root";
$password="";
$host="localhost";
$db="bd_sweet";
$dbh = 'mysql:host='.$host.';dbname='.$db.';charset=utf8';
$pdo = new PDO($dbh, $user, $password);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method']) && $_POST['_method'] === 'DELETE') {
  // Получение идентификатора записи для удаления из URL
  $url = $_SERVER['REQUEST_URI'];
  $url = explode('/', $url);
  $id = $url[count($url) - 1];

  // Подготовка и выполнение SQL-запроса для удаления записи из базы
  $statement = $pdo->prepare("DELETE FROM `Order` WHERE id = :id");
  $statement->bindParam(':id', $id);
  $statement->execute();

  // Дополнительные действия, например, перенаправление пользователя
  echo '<meta HTTP-EQUIV="Refresh" Content="1; URL=../../all_order.php">';
  exit();
}