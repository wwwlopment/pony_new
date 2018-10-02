<?php

use common\models\OrderDescript;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\captcha\Captcha;
/*if (isset($_SESSION['cart'])) {
  echo '<pre>';
  var_dump($_SESSION['cart']);
  echo '</pre>';
  echo count($_SESSION['cart']);
}*/
//unset($_SESSION['cart']);
$subtotal = 0;
$sum = 0;
if(isset($_SESSION['cart'])){
  $count = count($_SESSION['cart']);
} else {
  $count = 0;
}
if (!empty($_SESSION['cart'])) {
  $subtotal = 0;
  $sum = 0;
  foreach ($_SESSION['cart'] as $id => $item) {
    $sum = $item['quantity'] * $item['price'];
    $subtotal = $subtotal + $sum;
  }
}


$this->title = 'Кошик';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="breadcrumbs">
  <div class="container">
    <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
      <li><a href="<?=\yii\helpers\Url::to(['/'])?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
      <li class="active">Кошик</li>
    </ol>
  </div>
</div>
<!--//breadcrumbs-->
<!--cart-items-->
<div class="simpleCart_items"></div>
<div class="cart-items">
  <div class="container">
    <h3 class="wow fadeInUp animated" data-wow-delay=".5s">Мої покупки</h3>
    <div class="cart-header wow fadeInUp animated" data-wow-delay=".5s">

        <div class="col-md-12 col-sm-12 shopping-cart-table ">
            <div class="table-responsive">
              <?php Pjax::begin(['id' => 'pjaxCreateOrder']); ?>
              <?= Html::a("Обновить", ['site/createorder'], ['hidden'=>true, 'id'=>'create_order_update']);?>

              <?php      $grand_total = 0;
              if (!empty($_SESSION['cart'])) {
              foreach ($_SESSION['cart'] as $id => $item) {
              if(isset($item['image'])) {
                $img_url = $item['image'];
              } else {
                $img_url = '';
              }
              ?>

                <div class="cart-header1 wow fadeInUp animated" data-wow-delay=".7s">
                    <!--<div class="alert-close1">-->
                      <?= Html::a(Html::tag('i', '', ['class'=> 'alert-close1']).'', [Url::to(['site/createorder']), 'product_id' => $id], ['data-id'=> $id, 'class'=> 'rm_from_cart']);?>
                    <!--</div>-->
                    <div class="cart-sec simpleCart_shelfItem">
                        <div class="cart-item cyc">
                            <a href="<?=\yii\helpers\Url::to(['site/view', 'id' => $item['id']])?>"><img src="<?=$img_url?>" class="img-responsive" alt=""></a>
                        </div>
                        <div class="cart-item-info">
                            <h4><a href="<?=\yii\helpers\Url::to(['site/view', 'id' => $item['id']])?>"> <?=$item['title']?> </a>
                                <span>  <?=$item['price']?> грн. </span></h4>
                            <ul class="qty">
                                <li><p style="font-style: italic">в наявності</p></li>
                                <li><p></p></li>
                            </ul>
                            <div class="delivery">
                                <p class="qt"><?=$item['quantity'] * $item['price']?> грн.</p>
                                <div class="quant-input">
                                    <div class="arrows">
                                        <div class="quant-input arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                        <div class="quant-input arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                    </div>
                                    <input class="qinput" style="width: 60px;" data-id="<?=$item['id']?>" type="text" value="<?=$item['quantity']?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
              <?php } ?>
              <?php } ?>


              <?php Pjax::end(); ?>
            </div>
        </div>





  </div>

</div>
<div class="container">
    <div class="subtotal" style="text-align: center">

        <h4>
            <span class="text" style="font-size: 30px;" id="price_subtotal">Підсумок : <?=$subtotal . ' грн.'?></span>
        </h4>
    </div>

    <div class="cart-checkout-btn col-md-offset-3 col-md-6 col-sm-12">
      <?php
      if (!empty($_SESSION['cart'])) {
        if (isset($model)) {
          $form = ActiveForm::begin([
            'id' => 'orderform',
            'options' => ['class' => 'form-horizontal form-group'],
          ]) ?>
          <?= $form->field($model, 'name')->label('Ім\'я')->textInput(['maxlength' => 255, 'class' => 'form-control unicase-form-control name-input', 'placeholder' => 'You name..']) ?>
          <?= $form->field($model, 'phone')->label('Телефон')->textInput(['maxlength' => 255, 'class' => 'form-control unicase-form-control phone-input', 'placeholder' => 'You phone..']) ?>
          <?= $form->field($model, 'email')->label('Е-мейл')->textInput(['maxlength' => 255, 'class' => 'form-control unicase-form-control email-input', 'placeholder' => 'You email..']) ?>
          <?= $form->field($model, 'verifyCode')->label('Код підтвердження')->widget(Captcha::className()) ?>
            <div class="form-group">
                <div class="col-md-offset-4 col-md-4 col-sm-offset-8 col-sm-4 col-xs-offset-4 col-xs-8">
                  <?= Html::submitButton('ОФОРМИТИ ПОКУПКУ', ['class' => 'btn btn-primary ', 'type' => 'submit']); ?>
                </div>
            </div>
          <?php ActiveForm::end();
        }
      }

      ?>

    </div>
</div>