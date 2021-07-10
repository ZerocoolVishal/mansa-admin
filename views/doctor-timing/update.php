<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DoctorTiming */

$this->title = 'Update Doctor Timing: ' . $model->doctor_timing_id;
$this->params['breadcrumbs'][] = ['label' => 'Doctor Timings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->doctor_timing_id, 'url' => ['view', 'id' => $model->doctor_timing_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="doctor-timing-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
