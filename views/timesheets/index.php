<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TimesheetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Timesheets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timesheets-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Timesheets', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'started',
            'finished',
            'total_time',
            //'comments:ntext',
            //'client_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
