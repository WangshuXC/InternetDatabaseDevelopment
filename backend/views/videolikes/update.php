<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Videolikes $model */

$this->title = 'Update Videolikes: ' . $model->LikeID;
$this->params['breadcrumbs'][] = ['label' => 'Videolikes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->LikeID, 'url' => ['view', 'LikeID' => $model->LikeID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="videolikes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
