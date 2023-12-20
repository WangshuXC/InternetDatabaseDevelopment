<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ClicksSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="clicks-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ClickID') ?>

    <?= $form->field($model, 'ContentID') ?>

    <?= $form->field($model, 'ContentType') ?>

    <?= $form->field($model, 'ClickCount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
