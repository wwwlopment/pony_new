<?php
use yii\helpers\Html;
?>

<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row single-product outer-bottom-sm '>

      <div class='col-md-9'>
        <div class="row  wow fadeInUp">
          <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
            <div class="product-item-holder size-big single-product-gallery small-gallery">

              <div id="owl-single-product">
                  <?php
                  $n = 0;
                  foreach ($images as $image) {
                     $n++
                      ?>
                <div class="single-product-gallery-item" id="slide<?=$n?>">
                  <a data-lightbox="image-1" data-title="Gallery" href="<?=$image->image?>">
                    <img class="img-responsive" alt="" src="<?=$image->image?>" data-echo="<?=$image->image?>" />
                  </a>
                </div><!-- /.single-product-gallery-item -->
<?php }?>


              </div><!-- /.single-product-slider -->


              <div class="single-product-gallery-thumbs gallery-thumbs">

                <div id="owl-single-product-thumbnails">
                    <?php
                    $n = 0;
                    foreach ($images as $image) {
                        $n++?>
                  <div class="item">
                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="<?=$n?>" href="#slide<?=$n?>">
                      <img class="img-responsive" width="85" alt="" src="/frontend/web/images/blank.gif" data-echo="<?=$image->image?>" />
                    </a>
                  </div>
                    <?php } ?>


                </div><!-- /#owl-single-product-thumbnails -->



              </div><!-- /.gallery-thumbs -->

            </div><!-- /.single-product-gallery -->
          </div><!-- /.gallery-holder -->
          <div class='col-sm-6 col-md-7 product-info-block'>
            <div class="product-info">
              <h1 class="name"><?=$product->title?></h1>

              <div class="rating-reviews m-t-20">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="rating rateit-small"></div>
                  </div>
                  <div class="col-sm-8">
                    <div class="reviews">
                      <a href="#" class="lnk">(06 Reviews)</a>
                    </div>
                  </div>
                </div><!-- /.row -->
              </div><!-- /.rating-reviews -->

              <div class="stock-container info-container m-t-10">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="stock-box">
                       <span class="<?= ($product->available == 1) ? 'blue-text' : 'red-text' ?>">
                         <?= ($product->available == 1) ? 'В наявності' : 'Немає в наявності' ?>
                       </span>
                    </div>
                  </div>
              <!--    <div class="col-sm-9">
                    <div class="stock-box">
                      <span class="red-text"><?/*= ($product->available!=1) ? 'В наявності' : '' */?></span>
                    </div>
                  </div>-->
                </div><!-- /.row -->
              </div><!-- /.stock-container -->

              <div class="description-container m-t-20">
                    <?= $product->description?>
              </div><!-- /.description-container -->

              <div class="price-container info-container m-t-20">
                <div class="row">


                  <div class="col-sm-6">
                    <div class="price-box">
                      <span class="price"><?= $product->price . ' грн.' ?></span>
                      <!--<span class="price-strike">$900.00</span>-->
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="favorite-button m-t-10">
                      <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                        <i class="fa fa-heart"></i>
                      </a>
<!--                      <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
                        <i class="fa fa-retweet"></i>
                      </a>
                      <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
                        <i class="fa fa-envelope"></i>
                      </a>-->
                    </div>
                  </div>

                </div><!-- /.row -->
              </div><!-- /.price-container -->

              <div class="quantity-container info-container">
                <div class="row">

                  <div class="col-sm-2">
                    <span class="label">Кількість :</span>
                  </div>

                  <div class="col-sm-2">
                    <div class="cart-quantity">
                      <div class="quant-input">
                        <div class="arrows">
                          <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                          <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                        </div>
                        <input id="view_quantity" type="text" value="<?= isset($_SESSION['cart'][$product->id]['quantity']) ? $_SESSION['cart'][$product->id]['quantity'] : 1 ?>">
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-7">

                   <!-- <a href="#" class="btn btn-primary">
                        <i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART
                    </a>-->
                    <?= Html::a(Html::tag('i','',['class'=>'fa fa-shopping-cart inner-right-vs']). 'Купити',
                      ['site/addtocart', 'product_id' => $product->id],
                      ['class'=>'buy btn btn-primary', 'data-id'=>$product->id]);
                    ?>
<!--                      <button  href="<?/*=\yii\helpers\Url::to(['site/addtocart', 'product_id' => $product->id])*/?>"  data-id="<?/*=$product->id*/?>" class="buy btn btn-primary" type="button">Купити</button>
-->
                  </div>


                </div><!-- /.row -->
              </div><!-- /.quantity-container -->

              <div class="product-social-link m-t-20 text-right">
                <span class="social-label">Share :</span>
                <div class="social-icons">
                  <ul class="list-inline">
                    <li><a class="fa fa-facebook" href="http://facebook.com"></a></li>
                    <li><a class="fa fa-twitter" href="#"></a></li>
                    <li><a class="fa fa-linkedin" href="#"></a></li>
                    <li><a class="fa fa-rss" href="#"></a></li>
                    <li><a class="fa fa-pinterest" href="#"></a></li>
                  </ul><!-- /.social-icons -->
                </div>
              </div>

            </div><!-- /.product-info -->
          </div><!-- /.col-sm-7 -->
        </div><!-- /.row -->

      </div><!-- /.col -->
      <div class="clearfix"></div>
    </div><!-- /.row -->
  </div>
</div><!-- /.body-content -->
