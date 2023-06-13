<?php
session_start();
// Подключение к базе данных (используйте свои данные для подключения)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_sweet";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Проверяем, что были переданы все необходимые данные
    if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_SESSION['cart'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $products = $_SESSION['cart'];
        $time=date('d F Y, h:i:s A');

        // Создаем новую запись в таблице "orders" для каждого товара в корзине
        foreach ($products as $product) {
            $hotsales = $product['price'];
            $product_name = $product['name'];
            $product_quantity = $product['quantity'];
            

            $stmt = $conn->prepare("INSERT INTO `Order` (time, first_name, last_name, address, phone, email, hotsales, product_name, product_quantity) VALUES (:time, :first_name, :last_name, :address, :phone, :email, :hotsales, :product_name, :product_quantity)");
            $stmt->bindValue(':first_name', $first_name);
            $stmt->bindValue(':last_name', $last_name);
            $stmt->bindValue(':address', $address);
            $stmt->bindValue(':phone', $phone);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':hotsales', $hotsales);
            $stmt->bindValue(':product_name', $product_name);
            $stmt->bindValue(':product_quantity', $product_quantity);
            $stmt->bindValue(':time', $time);

            $stmt->execute();
        }

        // Очищаем корзину
        unset($_SESSION['cart']);

        // Редирект на страницу подтверждения заказа или другую страницу по вашему выбору
        echo '<h3>Заказ отправлен</h3> <a href="../index.php">На главную</a>';
        exit();
    }  else {
      // Если не переданы все необходимые данные, перенаправляем обратно на страницу оформления заказа
      header("Location: checkout.php");
      exit();
    }
} catch(PDOException $e) {
    echo "Ошибка при обработке заказа: " . $e->getMessage();
}
?>
