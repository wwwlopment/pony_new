<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Order_descript */

$this->title = 'Update Order Descript: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Descripts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-descript-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
