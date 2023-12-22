<?php

use app\models\Videocomments;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\VideocommentsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Videocomments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="videocomments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Videocomments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CommentID',
            'VideoID',
            'Comment:ntext',
            'CommentDate',
            'Username',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Videocomments $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'CommentID' => $model->CommentID]);
                 }
            ],
        ],
    ]); ?>


</div>
