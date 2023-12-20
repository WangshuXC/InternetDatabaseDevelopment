<?php

use app\models\Clicks;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ClicksSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clicks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clicks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Clicks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ClickID',
            'ContentID',
            'ContentType',
            'ClickCount',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Clicks $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ClickID' => $model->ClickID]);
                 }
            ],
        ],
    ]); ?>


</div>
