<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Videocomments $model */

$this->title = $model->CommentID;
$this->params['breadcrumbs'][] = ['label' => 'Videocomments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="videocomments-view">

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
            'VideoID',
            'Comment:ntext',
            'CommentDate',
            'Username',
        ],
    ]) ?>

</div>
