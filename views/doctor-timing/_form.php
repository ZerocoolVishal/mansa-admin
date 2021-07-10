<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DoctorTiming */
/* @var $form \yii\bootstrap4\ActiveForm */

if(!$model->isNewRecord) {
    $model->start_time = date('H:i', strtotime($model->start_time));
    $model->end_time = date('H:i', strtotime($model->end_time));
}

?>

<div class="doctor-timing-form">

    <div class="card shadow-sm">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'doctor_id')->dropDownList(\app\helpers\AppHelpers::getDoctors(), ['prompt' => 'Select a doctor']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'date')->input('date') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'start_time')->input('time') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'end_time')->input('time') ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
