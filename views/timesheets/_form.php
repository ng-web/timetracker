<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper; 
use app\models\Clients; 

/* @var $this yii\web\View */
/* @var $model app\models\Timesheets */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="timesheets-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= '<label>Start Date/Time</label>'; ?>
    <?= $form->field($model, 'started')->widget(DateTimePicker::classname(), [
            'options' => ['placeholder' => 'Enter event time ...'],
            'pluginOptions' => [
                'autoclose' => true
            ]
    ]); ?>

    <?= '<label>End Date/Time</label>'; ?>
    <?= $form->field($model, 'finished')->widget(DateTimePicker::classname(), [
            'options' => ['placeholder' => 'Enter event time ...'],
            'pluginOptions' => [
                'autoclose' => true
            ]
    ]);?>

     <!-- $form->field($model, 'total_time')->textInput(['maxlength' => true])  -->

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'client_id')->dropDownList(
            ArrayHelper::map(Clients::find()->all(),'id','name'),
            ['prompt'=>'Select Client'])
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
