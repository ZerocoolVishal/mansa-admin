<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DoctorTiming */

$this->title = $model->doctor_timing_id;
$this->params['breadcrumbs'][] = ['label' => 'Doctor Timings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="doctor-timing-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->doctor_timing_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->doctor_timing_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="card shadow-sm">
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'attribute' => 'doctor.name',
                        'label' => 'Doctor Name'
                    ],
                    'date:date',
                    'start_time:time',
                    'end_time:time',
                ],
            ]) ?>
        </div>
    </div>

</div>
