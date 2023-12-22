<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Articlecomments $model */

$this->title = $model->CommentID;
$this->params['breadcrumbs'][] = ['label' => 'Articlecomments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="articlecomments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'CommentID' => $model->CommentID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'CommentID' => $model->CommentID], [
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
            'CommentID',
            'ArticleID',
            'Comment:ntext',
            'CommentDate',
            'Username',
        ],
    ]) ?>

</div>
