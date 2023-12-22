<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PersonalinfoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="personalinfo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Name') ?>

    <?= $form->field($model, 'Info') ?>

    <?= $form->field($model, 'AvatarURL') ?>

    <?= $form->field($model, 'Email') ?>

    <?= $form->field($model, 'GitHubAccount') ?>

    <?php // echo $form->field($model, 'WeChatID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
