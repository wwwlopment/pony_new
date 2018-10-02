<?php

use common\models\Products;
use yii\web\View;

?>


<?php
$this->registerJsFile('../js/jquery-1.11.1.min.js', ['position' => View::POS_HEAD]);
$this->registerJsFile('../js/jquery.flexslider.js');


$this->title = 'Перегляд товару';
$related = Products::find()->limit(4)->offset(25)->all();

$this->registerCssFile('../css/flexslider1.css', ['position' => View::POS_HEAD]);
?>
<script>
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="<?=\yii\helpers\Url::to(['/'])?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Перегляд товару</li>
        </ol>
    </div>
</div>
<div class="single">
  <div class="container">
    <div class="single-info">
      <div class="col-md-6 single-top wow fadeInLeft animated" data-wow-delay=".5s">
        <div class="flexslider">
          <ul class="slides">
            <li data-thumb="<?=$product->image?>">
              <div class="thumb-image"> <img src="<?=$product->image?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
            </li>
            <?php
            $n = 0;
            foreach ($images as $image) {
            $n++
            ?>
            <li data-thumb="<?=$image->image?>">
              <div class="thumb-image"> <img src="<?=$image->image?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
            </li>
            <?php }?>
        <!--    <li data-thumb="images/s2.jpg">
              <div class="thumb-image"> <img src="images/s2.jpg" data-imagezoom="true" class="img-responsive" alt=""> </div>
            </li>
            <li data-thumb="images/s3.jpg">
              <div class="thumb-image"> <img src="images/s3.jpg" data-imagezoom="true" class="img-responsive" alt=""> </div>
            </li>-->
          </ul>
        </div>
      </div>
      <div class="col-md-6 single-top-left simpleCart_shelfItem wow fadeInRight animated" data-wow-delay=".5s">
        <h3><?=$product->title?></h3>
        <div class="single-rating">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5" checked>
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
          <p>5.00 out of 5</p>
          <a href="#">Add Your Review</a>
        </div>
        <h6 class="item_price"><?=$product->price?> грн.</h6>
        <p><?=$product->description?></p>
 <!--       <ul class="size">
          <h4>Size</h4>
          <li><a href="#">6-12 M</a></li>
          <li><a href="#">1-2 Y</a></li>
          <li><a href="#">2-3 Y</a></li>
          <li><a href="#">3-4 Y</a></li>
        </ul>
        <ul class="color">
          <h4>Color</h4>
          <li><a href="#"></a></li>
          <li><a href="#" class="red"></a></li>
          <li><a href="#" class="green"></a></li>
          <li><a href="#" class="pink"></a></li>
        </ul>-->
        <div class="clearfix"> </div>
       <!-- <div class="quantity">
          <p style="font-style: italic" class="qty"> Кількість :  </p><input min="1" type="number" value="1" class="item_quantity">
        </div>-->
        <div class="btn_form">
            <a href="<?= \yii\helpers\Url::to(['site/addtocart', 'product_id' => $product->id]) ?>"
               data-id="<?= $product->id ?>" class="buy"> КУПИТИ</a>
        </div>
      </div>
      <div class="clearfix"> </div>
    </div>
    <!--collapse-tabs-->
<!--    <div class="collpse tabs">
      <div class="panel-group collpse" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default wow fadeInUp animated" data-wow-delay=".5s">
          <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Description
              </a>
            </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
        <div class="panel panel-default wow fadeInUp animated" data-wow-delay=".6s">
          <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                additional information
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
        <div class="panel panel-default wow fadeInUp animated" data-wow-delay=".7s">
          <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                reviews (5)
              </a>
            </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
        <div class="panel panel-default wow fadeInUp animated" data-wow-delay=".8s">
          <div class="panel-heading" role="tab" id="headingFour">
            <h4 class="panel-title">
              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                help
              </a>
            </h4>
          </div>
          <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
            <div class="panel-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
      </div>
    </div>-->
    <!--//collapse -->
    <!--related-products-->
    <div class="related-products">
      <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
        <h3 class="title">Подібні<span> товари</span></h3>
        <p>можливо Вам сподобається... </p>
      </div>
      <div class="related-products-info">
        <?php
        $time = 5;
        if (isset($related)) {
        foreach ($related as $related_item) { ?>
            <div class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay=".<?=$time?>s">
                <div class="new-top">
                    <a href="<?= \yii\helpers\Url::to(['site/view', 'id' => $related_item->id]) ?>"><img
                                src="<?=$related_item->image?>" class="img-responsive" alt=""/></a>
                    <div class="new-text">
                        <ul>
                            <li><a href="<?= \yii\helpers\Url::to(['site/addtocart', 'product_id' => $related_item->id]) ?>"
                                   data-id="<?= $related_item->id ?>" class="buy" >
                                   <!-- <a class="item_add" href="">--> Купити</a>
                            </li>
                            <li><a href="<?= \yii\helpers\Url::to(['site/view', 'id' => $related_item->id]) ?>">Переглянути</a>
                            </li>
                            <li>
                                <a href="<?= \yii\helpers\Url::to(['site/category', 'cat' => $related_item->category_id]) ?>">
                                    До категорії </a></li>
                        </ul>
                    </div>
                </div>
                <div class="new-bottom">
                    <h5><a class="name" href="<?= \yii\helpers\Url::to(['site/view', 'id' => $related_item->id]) ?>">
                            <?=$related_item->title?> </a></h5>
                    <div class="rating">
                        <span class="on">☆</span>
                        <span class="on">☆</span>
                        <span class="on">☆</span>
                        <span class="on">☆</span>
                        <span>☆</span>
                    </div>
                    <div class="ofr">
                       <!-- <p class="pric1">
                            <del>$2000.00</del>
                        </p>-->
                        <p><span class="item_price"><?=$related_item->price?> грн.</span></p>
                    </div>
                </div>
            </div>
          <?php
          $time=+2;
            }
        }
        ?>
        <!--<div class="col-md-3 new-grid new-mdl simpleCart_shelfItem wow flipInY animated" data-wow-delay=".7s">
          <div class="new-top">
            <a href="single.html"><img src="images/g10.jpg" class="img-responsive" alt=""/></a>
            <div class="new-text">
              <ul>
                <li><a class="item_add" href=""> Add to cart</a></li>
                <li><a href="single.html">Quick View </a></li>
                <li><a href="products.html">Show Details </a></li>
              </ul>
            </div>
          </div>
          <div class="new-bottom">
            <h5><a class="name" href="single.html">Crocs Sandals </a></h5>
            <div class="rating">
              <span class="on">☆</span>
              <span class="on">☆</span>
              <span class="on">☆</span>
              <span class="on">☆</span>
              <span>☆</span>
            </div>
            <div class="ofr">
              <p class="pric1"><del>$2000.00</del></p>
              <p><span class="item_price">$500</span></p>
            </div>
          </div>
        </div>
        <div class="col-md-3 new-grid new-mdl1 simpleCart_shelfItem wow flipInY animated" data-wow-delay=".9s">
          <div class="new-top">
            <a href="single.html"><img src="images/g11.jpg" class="img-responsive" alt=""/></a>
            <div class="new-text">
              <ul>
                <li><a class="item_add" href=""> Add to cart</a></li>
                <li><a href="single.html">Quick View </a></li>
                <li><a href="products.html">Show Details </a></li>
              </ul>
            </div>
          </div>
          <div class="new-bottom">
            <h5><a class="name" href="single.html">Pink Sip Cup </a></h5>
            <div class="rating">
              <span class="on">☆</span>
              <span class="on">☆</span>
              <span class="on">☆</span>
              <span class="on">☆</span>
              <span>☆</span>
            </div>
            <div class="ofr">
              <p class="pric1"><del>$2000.00</del></p>
              <p><span class="item_price">$500</span></p>
            </div>
          </div>
        </div>
        <div class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay="1.1s">
          <div class="new-top">
            <a href="single.html"><img src="images/g12.jpg" class="img-responsive" alt=""/></a>
            <div class="new-text">
              <ul>
                <li><a class="item_add" href=""> Add to cart</a></li>
                <li><a href="single.html">Quick View </a></li>
                <li><a href="products.html">Show Details </a></li>
              </ul>
            </div>
          </div>
          <div class="new-bottom">
            <h5><a class="name" href="single.html">Child Print Bike </a></h5>
            <div class="rating">
              <span class="on">☆</span>
              <span class="on">☆</span>
              <span class="on">☆</span>
              <span class="on">☆</span>
              <span>☆</span>
            </div>
            <div class="ofr">
              <p class="pric1"><del>$2000.00</del></p>
              <p><span class="item_price">$500</span></p>
            </div>
          </div>
        </div>-->
        <div class="clearfix"> </div>
      </div>
    </div>
    <!--//related-products-->
  </div>
</div>
