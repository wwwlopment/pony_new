<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SearchCategory */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Categories', ['create'], ['class' => 'btn btn-success']) ?>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
          ['label'=>'Icon','content' => function ($model) { return '<i class="'.$model->logo_class.'">';}],
          ['class' => 'yii\grid\ActionColumn'],
            'id',
            'title',
            'logo_class',

        //  'updated_at',
        //  'created_at',


        ],
    ]); ?>
</div>
<?= Html::a('Іконки FontAwesome', 'https://fontawesome.ru/all-icons/', ['target'=>'_blank']) ?>