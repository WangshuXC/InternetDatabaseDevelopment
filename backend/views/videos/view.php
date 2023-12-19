<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Videos $model */

$this->title = $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="videos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'VideoID' => $model->VideoID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'VideoID' => $model->VideoID], [
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
            'VideoID',
            'Title',
            'Description:ntext',
            'VideoURL',
            'UploadDate',
        ],
    ]) ?>

</div>
