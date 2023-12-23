<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Videolikes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="videolikes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'VideoID')->textInput() ?>

    <?= $form->field($model, 'Likes')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
