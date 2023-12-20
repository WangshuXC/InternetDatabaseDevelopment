<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Articles $model */

$this->title = $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="articles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ArticleID' => $model->ArticleID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ArticleID' => $model->ArticleID], [
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
            'ArticleID',
            'Title',
            'Content:ntext',
            'PublicationDate',
        ],
    ]) ?>

</div>
