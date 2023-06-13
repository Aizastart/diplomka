<?php require_once './function/connect.php'; ?>
<?php
$allPrise = $pdo->prepare("SELECT * From prace");
$allPrise->execute();

$allPrises=$allPrise->fetchAll(PDO::FETCH_OBJ);
?>

<?php foreach($allPrises as $allPre): ?> 


  <div class="splide__slide">

    <form action="../basket.php?id=<?php echo $allPre->id ?>" method="post"
      class="product-preview  is-zero-count-shown      is-forbid-order-over-existing ">
      <div class="product-preview__content">
        <div class="product-preview__area-photo">
          <div class="product-preview__photo">
            <div class="img-ratio img-ratio_cover">
              <div class="img-ratio__inner">

                <picture>
                  <img src="../img/prace/<?php echo $allPre->filename ?>" class="" alt="<?php echo $allPre->filename ?>">
                </picture>

              </div>
            </div>
            <div class="product-preview__available">В наличии</div>
          </div>
        </div>
        <div class="product-preview__area-title">
          <div class="product-preview__title">
            <a href="/product/myagkaya-igrushka-medved-boiko-plyushevyy-mishka-bezhevyy-s-bantom">
              <?php echo $allPre->name ?>
            </a>
          </div>
        </div>
        <div class="product-preview__area-description">
        </div>
        <div class="product-preview__area-bottom">
          <div class="product-preview__price">
            <span class="product-preview__price-old">
              <?php echo $allPre->sales ?> сом
            </span>
            <span class="product-preview__price-cur">
              <?php echo $allPre->hotsales ?> сом
            </span>
            <p>
              <?php echo $allPre->description ?>
            </p>
          </div>
          <div class="product-preview__controls">
            <input type="hidden" name="name" value="<?php echo $allPre->name ?>">
            <input type="hidden" name="price" value="<?php echo $allPre->hotsales ?>">
            <input type="number" name="quantity" value="1" class="form-control">

            <input type="submit" name="add_to_cart" class="button button_wide product-preview__buy-btn" value="В корзину">
          </div>
        </div>
      </div>
    </form>
  </div>
<?php endforeach ?>