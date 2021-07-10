<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DoctorSchedule */

$this->title = 'Create Doctor Schedule';
$this->params['breadcrumbs'][] = ['label' => 'Doctor Timings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-timing-create">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'doctor_id')->dropDownList(\app\helpers\AppHelpers::getDoctors(), ['prompt' => 'Select a doctor']) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'start_date')->input('date') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'end_date')->input('date') ?>
                </div>
            </div>

            <div class="border p-3 form-group">

                <div id="timingSets">

                    <div class="row">
                        <div class="col">
                            <?= $form->field($model, 'start_time[]')->input('time') ?>
                        </div>
                        <div class="col">
                            <?= $form->field($model, 'end_time[]')->input('time') ?>
                        </div>
                        <div class="col-1"></div>
                    </div>

                </div>

                <div class="form-group">
                    <?= Html::button('<i class="fa fa-plus" aria-hidden="true"></i> Add Timing', ['class' => 'btn btn-primary', 'onclick' => 'addTimingSet()']) ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    function addTimingSet() {
        $.get('get-schedule-time-ajax', function (response) {
            $('#timingSets').append(response);
        })
    }
</script>