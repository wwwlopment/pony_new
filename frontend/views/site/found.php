<?php

use frontend\modules\search\SearchAssets;
use yii\helpers\Html;
use yii\widgets\LinkPager;

//$query = '';
$query = yii\helpers\Html::encode($q);
//var_dump($products);
//$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['/site']];
$this->title = "Результати пошуку по запиту \"$query\"";
//$this->params['breadcrumbs'][] = $this->title;
$this->title = 'Пошук';
//SearchAssets::register($this);
//$this->registerJs("jQuery('.search').highlight('{$query}');");
?>
<div class="breadcrumbs">
  <div class="container">
    <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
      <li><a href="<?=\yii\helpers\Url::to(['/'])?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
      <li class="active">Пошук</li>
    </ol>
  </div>
</div>
<br>
<br>
<br>
<div class="row">


    <?php
    if (!empty($products)):
      foreach ($products as $product):
        if(isset($product->image)) {
          $img_url = $product->image;
        } else {
          $img_url = '';
        }
        ?>
    <div class="col-md-12">
          <div class="col-md-3">
              <div class="product-image">
                  <div class="image">
                    <?= Html::a(Html::img($img_url,['width'=>'200px', 'data-echo'=>$img_url]), ['view', 'id' => $product->id])?>

                  </div><!-- /.image -->

              </div>
          </div>
    <div class="col-md-9">


        <h3><?= Html::a($product->title, ['view', 'id' => $product->id])?></h3>
        <p class="search"><?= $product->description ?></p>
        <hr />
    </div>
    </div>
      <?php
      endforeach;
    else:
      ?>
      <div class="alert alert-danger"><h3>По запиту "<?= $query ?>" нічого не знайдено!</h3></div>
    <?php
    endif;

/*    echo LinkPager::widget([
      'pagination' => $pagination,
    ]);
    */?>

</div>
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

    </div><!-- /.pagination-container -->
</div><!-- /.col -->

