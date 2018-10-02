<?php

$this->title = $category->title;
?>
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="<?=\yii\helpers\Url::to(['/'])?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active"><?=$category->title?></li>
        </ol>
    </div>
</div>
<div class="products">
  <div class="container">
    <div class="col-md-12 product-model-sec">

      <?php

      use yii\web\View;
      use yii\widgets\LinkPager;

      function limit_words($string, $word_limit) {
        $words=explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
      }

      if (isset ($products)) {
        $time = 5;
      foreach ($products as $product) {
      if(isset($product->image)) {
        $img_url = $product->image;
      } else {
        $img_url = '';
      }
      ?>
      <div class="product-grids simpleCart_shelfItem wow fadeInUp animated"  data-wow-delay=".<?=$time?>s">
        <div class="new-top">
          <a href="<?= \yii\helpers\Url::to(['site/view', 'id' => $product->id]) ?>"><img src="<?= $img_url ?>" class="img-responsive" alt=""/></a>
          <div class="new-text">
            <ul>
              <li><a href="<?= \yii\helpers\Url::to(['site/view', 'id' => $product->id]) ?>">Переглянути </a></li>
<!--              <li><input type="number" class="item_quantity" min="1" value="1"></li>
-->              <li>
                    <a href="<?= \yii\helpers\Url::to(['site/addtocart', 'product_id' => $product->id]) ?>"
                       data-id="<?= $product->id ?>" class="buy"> Купити</a>
                </li>
            </ul>
          </div>
        </div>
        <div class="new-bottom">
          <h5><a class="name" href="<?= \yii\helpers\Url::to(['site/view', 'id' => $product->id]) ?>"><?=limit_words($product->title, 4)?></a></h5>
          <div class="rating">
            <span class="on">☆</span>
            <span class="on">☆</span>
            <span class="on">☆</span>
            <span class="on">☆</span>
            <span>☆</span>
          </div>
          <div class="ofr">
<!--            <p class="pric1"><del>$2000.00</del></p>
-->            <p><span class="item_price"><?=$product->price?> грн.</span></p>
          </div>
        </div>
      </div>
      <?php
        $time=+2;
        }
      }
      ?>

    </div>

      <!-- /.text-right -->



  </div>
    <div class="text-right">
    <div class="pagination-container">
    <?php
    if (isset ($pages)) {
      echo LinkPager::widget([
        'pagination' => $pages,
        'options'      => [
          'class'=>'list-inline list-unstyled'],

      ]);
    }
    ?>
    </div>
    </div><!-- /.pagination-container -->
</div>
