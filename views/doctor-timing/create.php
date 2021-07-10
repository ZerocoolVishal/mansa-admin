<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DoctorTiming */

$this->title = 'Create Doctor Timing';
$this->params['breadcrumbs'][] = ['label' => 'Doctor Timings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-timing-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
