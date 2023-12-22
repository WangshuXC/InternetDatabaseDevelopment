<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Webviews $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="webviews-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Views')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
