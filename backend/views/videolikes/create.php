<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Videolikes $model */

$this->title = 'Create Videolikes';
$this->params['breadcrumbs'][] = ['label' => 'Videolikes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="videolikes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
