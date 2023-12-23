<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Personalinfo $model */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Personalinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="personalinfo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Name' => $model->Name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Name' => $model->Name], [
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
            'Name',
            'Info:ntext',
            'AvatarURL',
            'Email:email',
            'GitHubAccount',
            'WeChatID',
        ],
    ]) ?>

</div>
