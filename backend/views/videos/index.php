<?php

use app\models\Videos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\VideosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="videos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Videos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'VideoID',
            'Title',
            'Description:ntext',
            'PictureURL',
            'UploadDate',
            //'VideoURL',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Videos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'VideoID' => $model->VideoID]);
                 }
            ],
        ],
    ]); ?>


</div>
