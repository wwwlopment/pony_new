<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */
?>
    <?php header('X-Frame-Options: ALLOW-FROM https://google.com.ua/'); ?>
<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Про нас';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="<?=\yii\helpers\Url::to(['/'])?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Про нас</li>
        </ol>
    </div>
</div>
<!--//breadcrumbs-->
<!--contact-->
<div class="contact">
    <div class="container">
        <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
            <h3 class="title">Як нас<span> знайти </span></h3>
            <p> <a href="https://goo.gl/maps/QakkKNVaDon"> наприклад за цим посиланням </a> </p>
        </div>
        <iframe class="wow zoomIn animated animated" data-wow-delay=".5s"  width="600" height="450" frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJQdUbbu-ZJUcRNnapTvdbzLQ&key=" allowfullscreen></iframe>
<!--        <iframe class="wow zoomIn animated animated" data-wow-delay=".5s" src="https://goo.gl/maps/uywJgkm89sC2" allowfullscreen=""></iframe>-->
    </div>
</div>

