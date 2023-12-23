<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Articlelikes $model */

$this->title = 'Create Articlelikes';
$this->params['breadcrumbs'][] = ['label' => 'Articlelikes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articlelikes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
