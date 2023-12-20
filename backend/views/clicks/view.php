<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Clicks $model */

$this->title = $model->ClickID;
$this->params['breadcrumbs'][] = ['label' => 'Clicks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="clicks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ClickID' => $model->ClickID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ClickID' => $model->ClickID], [
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
            'ClickID',
            'ContentID',
            'ContentType',
            'ClickCount',
        ],
    ]) ?>

</div>
