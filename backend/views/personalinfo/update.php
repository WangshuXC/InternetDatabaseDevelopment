<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Personalinfo $model */

$this->title = 'Update Personalinfo: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Personalinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'Name' => $model->Name]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personalinfo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
