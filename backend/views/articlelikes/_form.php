<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Articlelikes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="articlelikes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ArticleID')->textInput() ?>

    <?= $form->field($model, 'Likes')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
