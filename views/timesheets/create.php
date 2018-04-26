<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Timesheets */

$this->title = 'Create Timesheets';
$this->params['breadcrumbs'][] = ['label' => 'Timesheets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timesheets-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
