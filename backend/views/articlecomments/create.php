<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Articlecomments $model */

$this->title = 'Create Articlecomments';
$this->params['breadcrumbs'][] = ['label' => 'Articlecomments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articlecomments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
