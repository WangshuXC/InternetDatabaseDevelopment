<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Articlecomments $model */

$this->title = 'Update Articlecomments: ' . $model->CommentID;
$this->params['breadcrumbs'][] = ['label' => 'Articlecomments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CommentID, 'url' => ['view', 'CommentID' => $model->CommentID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="articlecomments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
