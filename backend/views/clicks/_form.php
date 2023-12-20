<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Clicks $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="clicks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ContentID')->textInput() ?>

    <?= $form->field($model, 'ContentType')->dropDownList([ 'Article' => 'Article', 'Video' => 'Video', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ClickCount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
