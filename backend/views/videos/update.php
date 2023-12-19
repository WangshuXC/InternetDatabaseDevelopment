<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Videos $model */

$this->title = 'Update Videos: ' . $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Title, 'url' => ['view', 'VideoID' => $model->VideoID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="videos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
