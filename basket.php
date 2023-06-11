<?php 
session_start();
require_once './function/connect.php';?>

<?php require 'public/header.php'?>


<?php 
if(isset($_POST['add_to_cart'])){
  
  if(isset($_SESSION['cart'])){
    $session_array_id = array_column($_SESSION['cart'], "id");
    if(!in_array($_GET['id'], $session_array_id)){
      $session_array = array(
        "id" => $_GET['id'],
        "name" => $_POST['name'],
        "price" => $_POST['price'],
        "quantity" => $_POST['quantity']
      );
      $_SESSION['cart'][] = $session_array;
    }
    }else{
      $session_array = array(
        "id" => $_GET['id'],
        "name" => $_POST['name'],
        "price" => $_POST['price'],
        "quantity" => $_POST['quantity']
      );
      $_SESSION['cart'][] = $session_array;
    }
}

 ?>


<div class="basket" style='width: 80%; padding: 50px 5%; '>
  <div class="col-md-10">
    <h2 class="text-center">Заказ</h2>


    <?php 
    $total = 0;
    $output = '';

    $output .="
    <table class='table table-bordered table-scriped'>
    <tr>
    <th>ID</th>
    <th>Название товара</th>
    <th>Цена</th>
    <th>Количество</th>
    <th>Полная стоимость</th>
    <th>Действие</th>
    </tr>
    ";
    

    if(!empty($_SESSION['cart'])){
      foreach($_SESSION['cart'] as $key => $value){

        $output .="
        <tr>
          <td>".$value['id']."</td>
          <td>".$value['name']."</td>
          <td>".$value['price']."</td>
          <td>".$value['quantity']."</td>
          <td>".number_format($value['price'] * $value['quantity'], 2)."</td>
          <td>
            <a href='/basket.php?action=remove&id=".$value['id']."'>
            <button class='btn btn-danger btn-block'>Удалить</button>
            </a>
          </td>
          ";
          $total = $total + $value['quantity'] * $value['price'];
      }

      $output .="
      <tr>
      <td colspan='3'></td>
      <td><b></b>Total Price</b.</td>
      <td>". number_format($total, 2)."</td>
      <td>
      <a href='/basket.php?action=clearall'>
      <button class='btn btn-warning'>Очистить всё</button>
      </a>
      </td>
      </tr>
      ";
    }

    echo $output;
    ?>
 
<?php if(isset($_GET['action'])){
  if($_GET['action'] == "clearall"){
    unset($_SESSION['cart']);
  }

  if($_GET['action'] == "remove"){

    foreach ($_SESSION['cart'] as $key =>$value){

      if($value['id'] == $_GET['id']){
         unset($_SESSION['cart'][$key]);
      }
    }
  }
}

?>

</table>

 </div>

</div>
</div>

<?php require 'public/footer.php'?>