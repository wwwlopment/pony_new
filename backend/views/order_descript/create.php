<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Order_descript */

$this->title = 'Create Order Descript';
$this->params['breadcrumbs'][] = ['label' => 'Order Descripts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-descript-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
