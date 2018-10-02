<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order_descript */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Descripts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-descript-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
          'order_id',
            'product_id',
            'quantity',
            'price',
            'created_at',
        ],
    ]) ?>

</div>
