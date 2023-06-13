<?php require 'public/header.php' ?>



<div class="album  bg-light w-100 ">
  <div class="container p-10 mt-10">
    <div class="row">
      <div class="card card1 ml-3 ">
        <div class="row ">
          <div class="col-md-6">
            <div class="card-body">
              <h3>Оформление заказа </h3>
            </div>

            <form action="/public/process_order.php" method="POST">
              <label for="first_name">Имя:</label><br>
              <input type="text" name="first_name" id="first_name" required> <br>

              <label for="last_name">Фамилия:</label><br>
              <input type="text" name="last_name" id="last_name" required><br>

              <label for="address">Адрес:</label><br>
              <input type="text" name="address" id="address" required><br>

              <label for="phone">Телефон:</label><br>
              <input type="text" name="phone" id="phone" required><br>

              <label for="email">Электронная почта:</label><br>
              <input type="email" name="email" id="email" required><br>

              <div class="m-2">
              <input type="submit" value="Оформить заказ"  class='btn btn-warning m5'>
              <a href="/allprise.php"><button class='btn btn-warning m5'>Каталог товаров</button></a>
            </div></form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>




  <?php require 'public/footer.php' ?>