<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Personalinfo $model */

$this->title = 'Create Personalinfo';
$this->params['breadcrumbs'][] = ['label' => 'Personalinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personalinfo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
