<?php

use app\models\Personalinfo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PersonalinfoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Personalinfos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personalinfo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Personalinfo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Name',
            'Info:ntext',
            'AvatarURL',
            'Email:email',
            'GitHubAccount',
            //'WeChatID',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Personalinfo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Name' => $model->Name]);
                 }
            ],
        ],
    ]); ?>


</div>
