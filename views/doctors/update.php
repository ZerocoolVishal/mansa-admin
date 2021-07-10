<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Doctors */

$this->title = 'Update Doctor: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Doctors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->doctor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="doctors-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
