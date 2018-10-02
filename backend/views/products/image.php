<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

  <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>


    <?= $form->field($model, 'image')->widget(\kartik\file\FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
  ]);?>

  <div class="form-group">
  </div>

    <div class="container">
        <div class="row">


            <div class="col-md-12">
              <?php
              foreach ($images as $item) { ?>

                <div class="col-md-1 col-md-offset-1">
                    <?=Html::a(Html::img($item->image, ['width'=>'100px']), ['set-default', 'id'=>$product, 'img_id'=>$item->id], [])?>
                </div>
              <?php
              }
              ?>
            </div>
        </div>
    </div>
  <?php ActiveForm::end();


  ?>


</div>
