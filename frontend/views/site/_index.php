<?php

namespace common\models\Categories;

use common\models\Products;
use Yii;
use yii\helpers\Html;
use common\models\Categories;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
/*if (isset($_SESSION['cart'])) {
  echo '<pre>';
  var_dump($_SESSION['cart']);
  echo '</pre>';
  echo count($_SESSION['cart']);
}
*/?>



<div class="body-content outer-top-xs">
    <div class='container'>
        <div class="homepage-container">
            <div class='row outer-bottom-sm'>

                <div class='col-md-9'>
                    <!-- ========================================== SECTION – HERO ========================================= -->



                    <!-- ========================================= SECTION – HERO : END ========================================= -->
                    <div class="clearfix filters-container m-t-10">
                        <div class="row">
                            <div class="col col-sm-6 col-md-2">
                                <div class="filter-tabs">
                                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                        <li class="active">
                                            <a data-toggle="tab" href="#grid-container"><i
                                                        class="icon fa fa-th-list"></i>Grid</a>
                                        </li>
                                        <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th"></i>List</a>
                                        </li>
                                    </ul>
                                </div><!-- /.filter-tabs -->
                            </div><!-- /.col -->

                            <div class="col col-sm-12 col-md-10 text-right">
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

                                </div><!-- /.pagination-container -->        </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div>
                    <div class="search-result-container">
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane active" id="grid-container">
                                <div class="category-product inner-top-vs col-sm-12 col-md-12">
                                    <div class="row row-flex">
                                        <?php
                                        if (isset ($products)) {
                                        foreach ($products as $product) {
                                          if(isset($product->image)) {
                                            $img_url = $product->image;
                                          } else {
                                            $img_url = '';
                                          }
                                        ?>
                                        <div  class="col-sm-6 col-md-4">
                                            <div class="products">

                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image">
                                                          <?= Html::a(Html::img($img_url,['width'=>'200px', 'data-echo'=>$img_url]), ['view', 'id' => $product->id])?>

                                                        </div><!-- /.image -->

                                                    </div><!-- /.product-image -->


                                                    <div class="product-info text-left">
                                                        <h3 class="name">
                                                            <?= Html::a($product->title, ['view', 'id' => $product->id])?>
                                                        </h3>

                                                        <div class="description"><?=$product->description;?></div>
                                                        <div class="product-price">
				                                        <span class="price"><?=$product->price. ' грн.';?></span>

                                                        </div><!-- /.product-price -->

                                                    </div><!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">

                                                            <button  href="<?=\yii\helpers\Url::to(['site/addtocart', 'product_id' => $product->id])?>"  data-id="<?=$product->id?>" class="buy btn btn-primary" type="button">Купити</button>



                                                        </div><!-- /.action -->
                                                    </div><!-- /.cart -->
                                                </div><!-- /.product -->

                                            </div><!-- /.products -->
                                        </div><!-- /.item -->
                                        <?php }
                                        }
                                        ?>
                                    </div><!-- /.row -->
                                </div><!-- /.category-product -->

                            </div><!-- /.tab-pane -->

                            <div class="tab-pane" id="list-container">
                                <div class="category-product  inner-top-vs">
                                  <?php
                                  if (isset ($products)) {
                                      foreach ($products as $product) {
                                  if(isset($product->image)) {
                                    $img_url = $product->image;
                                  } else {
                                    $img_url = '';
                                  }
                                  ?>

                                    <div class="category-product-inner">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <img width="150px" data-echo="<?=$img_url?>"
                                                                     src="<?=$img_url?>" alt="">
                                                            </div>
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#"><?=$product->title?></a></h3>
                                                           <!-- <div class="rating rateit-small"></div>-->
                                                            <div class="product-price">
				                                        	<span class="price"><?=$product->price. ' грн.';?></span>

                                                            </div><!-- /.product-price -->
                                                            <div class="description m-t-10">
                                                                <!--<div class="rating rateit-small"></div>-->
                                                            <?=$product->description?>
                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">

                                                                    <button href="<?=\yii\helpers\Url::to(['site/addtocart', 'product_id' => $product->id])?>"  data-id="<?=$product->id?>" class="buy btn btn-primary" type="button">Купити
                                                                    </button>



                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->

                                                        </div><!-- /.product-info -->
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-list-row -->
                                            </div><!-- /.product-list -->
                                        </div><!-- /.products -->
                                    </div><!-- /.category-product-inner -->

                                    <?php }
                                      }
                                    ?>



                                </div><!-- /.category-product -->
                            </div><!-- /.tab-pane #list-container -->
                        </div><!-- /.tab-content -->
                        <div class="clearfix filters-container">

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
                                </div><!-- /.pagination-container -->                                </div>
                            <!-- /.text-right -->

                        </div><!-- /.filters-container -->

                    </div><!-- /.search-result-container -->

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.container -->

</div><!-- /.body-content -->
</body>
</html>