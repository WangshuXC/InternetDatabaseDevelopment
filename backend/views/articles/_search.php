<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ArticlesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="articles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ArticleID') ?>

    <?= $form->field($model, 'Title') ?>

    <?= $form->field($model, 'Content') ?>

    <?= $form->field($model, 'AuthorID') ?>

    <?= $form->field($model, 'PublicationDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
