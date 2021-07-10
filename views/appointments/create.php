<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Appointments */

$this->title = 'Book Appointment';
$this->params['breadcrumbs'][] = ['label' => 'Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointments-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
