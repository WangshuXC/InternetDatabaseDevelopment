<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Webviews $model */

$this->title = $model->Views;
$this->params['breadcrumbs'][] = ['label' => 'Webviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="webviews-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Views' => $model->Views], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Views' => $model->Views], [
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
            'Views',
        ],
    ]) ?>

</div>
