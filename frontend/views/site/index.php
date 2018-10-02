<?php
namespace common\models\Categories;

use common\models\Products;
use Yii;
use yii\helpers\Html;
use common\models\Categories;
use yii\web\View;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
//$this->registerJsFile('../js/jquery-1.11.1.min.js', ['position' => View::POS_HEAD]);
 //  $this->registerJsFile('https://code.jquery.com/jquery-migrate-3.0.0.js', ['position' => View::POS_HEAD]);
$this->registerCssFile('../css/flexslider.css');


function limit_words($string, $word_limit) {
  $words=explode(" ",$string);
  return implode(" ",array_splice($words,0,$word_limit));
}

$hot = Products::find()->limit(4)->offset(3)->all();
$upsell = Products::find()->limit(8)->offset(10)->all();
$top = Products::find()->limit(4)->offset(15)->all();



?>


<div class="new">
  <div class="container">
    <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
      <h3 class="title">Нові <span>поступлення </span></h3>
      <p>Щось цікавеньке для Вас із новинок... </p>
    </div>
    <div class="new-info">

      <?php
      //   $hot = [];
      $time = 5;
      if (isset($hot)) {
      foreach ($hot as $hot_item) { ?>
      <div class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay=".<?=$time?>s"">
      <!--<div class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay="1.1s">-->
        <div class="new-top">
          <a href="<?=\yii\helpers\Url::to(['site/view', 'id' => $hot_item->id])?>"><img style="width: 250px; height: 333px" src="<?= $hot_item->image ?>" class="item_image img-responsive" alt=""/></a>
          <div class="new-text">
            <ul>
              <li><a href="<?= \yii\helpers\Url::to(['site/addtocart', 'product_id' => $hot_item->id]) ?>"
                     data-id="<?= $hot_item->id ?>" class="buy"> Купити</a></li>
              <li><a href="<?=\yii\helpers\Url::to(['site/view', 'id' => $hot_item->id])?>">Переглянути </a></li>
              <li><a href="<?=\yii\helpers\Url::to(['site/category', 'cat' => $hot_item->category_id])?>">До категорії </a></li>
            </ul>
          </div>
        </div>
        <div class="new-bottom">
          <h5>
            <?= Html::a(limit_words($hot_item->title, 3), ['site/view', 'id' => $hot_item->id], ['class'=>'item_name name']) ?>

<!--              <a class="name" href="single.html">Child Print Bike </a>-->
          </h5>
          <div class="rating">
            <span class="on">☆</span>
            <span class="on">☆</span>
            <span class="on">☆</span>
            <span class="on">☆</span>
            <span>☆</span>
          </div>
          <div class="ofr">
            <!--<p class="pric1"><del>$5050.00</del></p>-->
            <p><span class="item_price"><?= $hot_item->price . ' грн.' ?></span></p>
          </div>
        </div>
      </div>

      <?php
         $time=+2;
         }
      }?>

      <div class="clearfix"> </div>

    </div>
  </div>
</div>
<!--//new-->
<!--gallery-->
<div class="gallery">
  <div class="container">
    <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
      <h3 class="title">Популярні<span> продукти</span></h3>
      <p>Не пропустіть... </p>
    </div>
    <div class="gallery-info">
      <?php
      // $upsell = [];
      $time = 5;
      if (isset($upsell)) {
      foreach ($upsell as $upsel_item) { ?>
      <div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay=".<?=$time?>s">
       <div class="intr">
        <a href="<?=\yii\helpers\Url::to(['site/view', 'id' => $upsel_item->id])?>"><img src="<?=$upsel_item->image?>" class="item_image img-responsive" alt=""/></a>
        <div class="gallery-text simpleCart_shelfItem">
          <h5>
              <a class="item_name" href="<?=\yii\helpers\Url::to(['site/view', 'id' => $upsel_item->id])?>"><?=limit_words($upsel_item->title, 4)?></a>
          </h5>
          <p><span class="item_price"><?=$upsel_item->price?> грн.</span></p>
<!--          <h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
-->          <ul>
<!--            <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
-->            <li><a href="<?= \yii\helpers\Url::to(['site/addtocart', 'product_id' => $upsel_item->id]) ?>"
                      data-id="<?= $upsel_item->id ?>" class="buy" ><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
          </ul>
        </div>
       </div>
      </div>
      <?php
      $time=+2;
      }
      } ?>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<!--//gallery-->
<!--trend-->
<div class="trend wow zoomIn animated" data-wow-delay=".5s">
  <div class="container">
    <div class="trend-info">
      <section class="slider grid">
        <div class="flexslider trend-slider">
          <ul class="slides">

            <?php
            if (isset($top)) {
            foreach ($top as $top_item) { ?>


                <li>
                    <div  class="col-md-5 trend-left">
                        <img href="<?=\yii\helpers\Url::to(['site/view', 'id' => $top_item->id])?>" style="width: 100%" src="<?=$top_item->image?>" alt=""/>
                    </div>
                    <div class="col-md-7 trend-right">
                        <h4>TOP 10 ТОВАРІВ <span>ДЛЯ ВАС</span></h4>
                        <h5>Знижки до 20% </h5>
                        <p><?=$top_item->description?></p>
                    </div>
                    <div class="clearfix"></div>
                </li>

              <?php
                }
            }
            ?>


          </ul>
        </div>
      </section>
    </div>
  </div>
</div>
<!--//trend-->
<!--footer-->

