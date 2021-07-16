<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html; ?>

<style>
    .invalid-feedback {
        margin-bottom: 20px;
    }
</style>

<!-- APPOINTMENT PAGE
============================================= -->
<div id="appointment-page" class="wide-60 appointment-page-section division">
    <div class="container">
        <div class="row">


            <!-- SERVICE DETAILS -->
            <div class="col-lg-8">
                <div class="txt-block pr-30">

                    <!-- Title -->
                    <h3 class="h3-md brand-color">Book an Appointment</h3>

                    <?php if (Yii::$app->session->hasFlash('success')): ?>

                      <div class="text-center">
                          <?= \yii\bootstrap4\Html::img('@web/images/tick.png', ['height' => '60px', 'width' => '60px', 'class' => 'm-3']) ?>
                          <p style="font-size: 20px"><?= Yii::$app->session->getFlash('success') ?></p>
                          <p>Kindly check your email</p>
                      </div>

                    <?php else: ?>
                        <!-- Text -->
                        <p>
                            Please fill the following form to request an appointment, After submitting the form you will
                            receive an confirmation email, You need to confirm your email to successfully send the appointment request
                        </p>

                        <!-- APPOINTMENT FORM -->
                        <div class="text-center">
                            <?php $form = ActiveForm::begin([
                                'options' => ['class' => 'row appointment-form']
                            ]); ?>

                            <div id="input-doctor" class="col-md-12 input-doctor">
                                <?= $form->field($model, 'doctor_id')->dropDownList(\app\helpers\AppHelpers::getDoctors(), ['class' => 'custom-select doctor', 'prompt' => 'Select Doctor', 'id' => 'doctor_id', 'onchange' => 'getDoctorTiming()'])->label(false) ?>
                            </div>

                            <div id="input-date" class="col-lg-12">
                                <?= $form->field($model, 'date')->input('date', ['placeholder' => 'Appointment Date', 'class' => 'form-control name', 'id' => 'appointments-date', 'onchange' => 'getDoctorTiming()'])->label(false) ?>
                            </div>

                            <div id="input-date" class="col-lg-12">
                                <?= $form->field($model, 'doctor_timing_id')->dropDownList([], ['class' => 'custom-select doctor', 'prompt' => 'Select Doctor Timing', 'id' => 'doctor-timing'])->label(false) ?>
                            </div>

                            <div id="input-name" class="col-lg-12">
                                <?= $form->field($model, 'name')->textInput(['placeholder' => 'Enter Your Name*', 'class' => 'form-control name'])->label(false) ?>
                            </div>

                            <div id="input-email" class="col-lg-12">
                                <?= $form->field($model, 'email')->textInput(['placeholder' => 'Enter Your Email*', 'class' => 'form-control email'])->label(false) ?>
                            </div>

                            <div id="input-phone" class="col-lg-12">
                                <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Enter Your Phone Number*', 'class' => 'form-control phone'])->label(false) ?>
                            </div>

                            <div id="input-message" class="col-lg-12 input-message">
                                <textarea class="form-control message" name="message" rows="6" placeholder="Your Message ..."></textarea>
                            </div>

                            <!-- Contact Form Button -->
                            <div class="col-lg-12 form-btn">
                                <?= Html::submitButton('Request an Appointment', ['class' => 'btn btn-brand brand-hover']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>

                        </div>	<!-- END APPOINTMENT FORM -->

                    <?php endif ?>
                </div>
            </div>	<!-- END SERVICE DETAILS -->


            <!-- SIDEBAR -->
            <aside id="sidebar" class="col-lg-4">


                <!-- SIDEBAR TABLE -->
                <div class="sidebar-table abox-4-table blue-table sidebar-div mb-50 p-4">
                    <!-- Title -->
                    <h5 class="h5-sm">Working Time</h5>

                    <!-- Text -->
                    <p><?= Yii::$app->params['address'] ?></p>

                    <!-- Table -->
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>Mon – Sat</td>
                            <td> - </td>
                            <td class="text-right">
                                01:00 PM - 03:00 PM <br>
                                07:30 PM - 09:30 PM
                            </td>
                        </tr>
                        <tr class="last-tr">
                            <td>Sun</td>
                            <td>-</td>
                            <td class="text-right">Only emergency services available</td>
                        </tr>
                        </tbody>
                    </table>
                </div>	<!-- END SIDEBAR TABLE -->


            </aside>   <!-- END SIDEBAR -->


        </div>	<!-- End row -->
    </div>	 <!-- End container -->
</div>	<!-- END APPOINTMENT PAGE -->

<script>
    function getDoctorTiming() {
        let doctor_id = $('#doctor_id').val();
        let date = $('#appointments-date').val();
        if(date) {
            $.get('<?= \yii\helpers\Url::to(['appointments/get-doctor-timing']) ?>', {doctor_id: doctor_id, date: date}, function(response) {
                if(response) {
                    $('#doctor-timing').html(response);
                    $('.field-appointments-date .invalid-feedback').html('');
                }
                else {
                    alert('Doctor not available for ' + date);
                    $('.field-appointments-date .invalid-feedback').html('Doctor not available for ' + date)
                }
            });
        }
    }
</script>
