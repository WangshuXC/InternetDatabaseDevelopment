<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Articles $model */

$this->title = 'Update Articles: ' . $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Title, 'url' => ['view', 'ArticleID' => $model->ArticleID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="articles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
