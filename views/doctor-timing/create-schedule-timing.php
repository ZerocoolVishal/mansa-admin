<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DoctorSchedule */
/* @var $form app\models\DoctorSchedule */

$set_id = rand(10,100);

?>

<div class="row" id="timingSet<?= $set_id ?>">
    <div class="col">
        <?= $form->field($model, 'start_time[]')->input('time') ?>
    </div>
    <div class="col">
        <?= $form->field($model, 'end_time[]')->input('time') ?>
    </div>
    <div class="col-1">
        <div class="form-group" style="margin-top: 32px;">
            <?= Html::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger', 'onclick' => "$('#timingSet$set_id').remove()"]) ?>
        </div>
    </div>
</div>

