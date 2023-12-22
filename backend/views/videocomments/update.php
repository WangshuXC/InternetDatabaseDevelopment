<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Videocomments $model */

$this->title = 'Update Videocomments: ' . $model->CommentID;
$this->params['breadcrumbs'][] = ['label' => 'Videocomments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CommentID, 'url' => ['view', 'CommentID' => $model->CommentID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="videocomments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
