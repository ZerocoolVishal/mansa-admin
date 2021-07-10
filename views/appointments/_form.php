<?php

use app\models\Appointments;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Appointments */
/* @var $form \yii\bootstrap4\ActiveForm */
?>

<div class="appointments-form">

    <div class="card shadow-sm">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'appointment_no')->textInput(['maxlength' => true, 'disabled' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'doctor_id')->dropDownList(\app\helpers\AppHelpers::getDoctors(), ['id' => 'doctor_id', 'onchange' => 'getDoctorTiming()']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'date')->input('date', ['onchange' => 'getDoctorTiming()']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'doctor_timing_id')->dropDownList([], ['id' => 'doctor-timing']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'status')->dropDownList([Appointments::CONFIRMED => 'Yes', Appointments::NOT_CONFIRMED => 'No'])->label('Confirmed') ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>

<script>
    function getDoctorTiming() {
        let doctor_id = $('#doctor_id').val();
        let date = $('#appointments-date').val();
        if(date) {
            $.get('get-doctor-timing', {doctor_id: doctor_id, date: date}, function(response) {
                if(response) {
                    $('#doctor-timing').html(response);
                }
                else {
                    alert('Doctor not available for ' + date);
                }
            });
        }
    }
</script>
