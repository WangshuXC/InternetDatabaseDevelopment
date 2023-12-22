<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Videocomments $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="videocomments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'VideoID')->textInput() ?>

    <?= $form->field($model, 'Comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'CommentDate')->textInput() ?>

    <?= $form->field($model, 'Username')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
