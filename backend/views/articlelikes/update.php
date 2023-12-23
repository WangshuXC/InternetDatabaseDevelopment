<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Articlelikes $model */

$this->title = 'Update Articlelikes: ' . $model->LikeID;
$this->params['breadcrumbs'][] = ['label' => 'Articlelikes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->LikeID, 'url' => ['view', 'LikeID' => $model->LikeID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="articlelikes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
