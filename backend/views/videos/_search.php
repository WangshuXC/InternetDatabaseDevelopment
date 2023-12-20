<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\VideosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="videos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'VideoID') ?>

    <?= $form->field($model, 'Title') ?>

    <?= $form->field($model, 'Description') ?>

    <?= $form->field($model, 'PictureURL') ?>

    <?= $form->field($model, 'UploadDate') ?>

    <?php // echo $form->field($model, 'VideoURL') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
