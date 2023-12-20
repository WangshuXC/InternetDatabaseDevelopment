<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Clicks $model */

$this->title = 'Update Clicks: ' . $model->ClickID;
$this->params['breadcrumbs'][] = ['label' => 'Clicks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ClickID, 'url' => ['view', 'ClickID' => $model->ClickID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clicks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
