<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SearchOrderDescript */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Descripts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-descript-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 <!--   <p>
        <?/*= Html::a('Create Order Descript', ['create'], ['class' => 'btn btn-success']) */?>
    </p>
-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'order_id',
            'product_id',
            'quantity',
            'price',
            'created_at',
    //      ['label'=>'Description','content' => function ($model) { return \common\models\Products::findOne($model->product_id)->description;}],
     //     ['label'=>'Image','content' => function ($model) { return '<img width = "70px" src="'. \common\models\Products::findOne($model->product_id)->image.'">';}],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
