<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Timesheets */

$this->title = 'Update Timesheets: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Timesheets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="timesheets-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
