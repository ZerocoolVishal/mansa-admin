<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Appointments */

$this->title = 'Update Appointments: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->appointment_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="appointments-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
