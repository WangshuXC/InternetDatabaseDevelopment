<?php

use app\models\Articlelikes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ArticlelikesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Articlelikes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articlelikes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Articlelikes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'LikeID',
            'ArticleID',
            'Likes',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Articlelikes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'LikeID' => $model->LikeID]);
                 }
            ],
        ],
    ]); ?>


</div>
