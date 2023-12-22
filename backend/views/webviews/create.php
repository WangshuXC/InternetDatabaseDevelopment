<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Webviews $model */

$this->title = 'Create Webviews';
$this->params['breadcrumbs'][] = ['label' => 'Webviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="webviews-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
