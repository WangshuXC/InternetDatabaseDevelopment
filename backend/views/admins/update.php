<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Admins $model */

$this->title = 'Update Admins: ' . $model->AdminID;
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->AdminID, 'url' => ['view', 'AdminID' => $model->AdminID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="admins-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
