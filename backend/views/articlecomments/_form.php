<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Articlecomments $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="articlecomments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ArticleID')->textInput() ?>

    <?= $form->field($model, 'Comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'CommentDate')->textInput() ?>

    <?= $form->field($model, 'Username')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
