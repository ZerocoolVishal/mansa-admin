<?php

/**
 * @var $this \yii\web\View;
 * @var $model \app\models\ContactUs;
 */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Alert;

$this->title = "Contact Us";

?>

<!-- GOOGLE MAP
============================================= -->
<div class="m-5" >
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1196.3704958212002!2d73.23783882923755!3d19.298659999185055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTnCsDE3JzU1LjIiTiA3M8KwMTQnMTguMiJF!5e1!3m2!1sen!2sin!4v1633261619600!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>

<!-- CONTACTS-1
============================================= -->
<section id="contacts-1" class="wide-60 contacts-section division" style="padding-top: 0px; padding-bottom: 0px">

    <div class="container mb-5">


        <!-- SECTION TITLE -->
        <div class="row">
            <div class="col-lg-10 offset-lg-1 section-title">

                <!-- Title 	-->
                <h3 class="h3-md dark-brand">Have a Question? Get In Touch</h3>

                <!-- Text -->
                <p></p>

            </div>
        </div>

        <?php if(Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                <strong>Thank You!</strong> Your message has been send successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <div class="row">


            <!-- CONTACTS INFO -->
            <div class="col-md-5 col-lg-4">

                <!-- General Information -->
                <div class="contact-box mb-40">
                    <h5 class="h5-sm dark-brand">General Information</h5>
                    <p>Address: <?= Yii::$app->params['address'] ?></p>
                    <p>Phone: <?= Yii::$app->params['mobile_numbers'] ?></p>
                    <p>Email: <a href="mailto:<?= Yii::$app->params['contact_email'] ?>" class="brand-color"><?= Yii::$app->params['contact_email'] ?></a></p>
                </div>

                <!-- Working Hours -->
                <!--<div class="contact-box mb-40">
                    <h5 class="h5-sm dark-brand">Working Hours</h5>
                    <table>
                        <tr>
                            <td>Mon – Sunday :</td>
                            <td>01:00 PM - 03:00 PM</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>07:30 PM - 09:30 PM</td>
                        </tr>
                        <tr>
                            <td>Sunday :</td>
                            <td>Only emergency services</td>
                        </tr>
                    </table>
                </div>-->

            </div>	<!-- END CONTACTS INFO -->


            <!-- CONTACT FORM -->
            <div class="col-md-7 col-lg-8">
                <div class="form-holder mb-40">

                    <?php $form = ActiveForm::begin([
                            'options' => ['name' => 'contactForm', 'class' => 'row contact-form']
                    ]) ?>

                        <!-- Contact Form Input -->
                        <div id="input-name" class="col-md-12 col-lg-6">
                            <?= $form->field($model, 'name')->input('text', ['placeholder' => 'Enter Your Name*'])->label(false) ?>
                        </div>

                        <div id="input-email" class="col-md-12 col-lg-6">
                            <?= $form->field($model, 'email')->input('email', ['placeholder' => 'Enter Your Email*'])->label(false) ?>
                        </div>

                        <div id="input-phone" class="col-md-12 col-lg-6">
                            <?= $form->field($model, 'phone')->input('text', ['placeholder' => 'Enter Your Phone Number*'])->label(false) ?>
                        </div>

                        <!-- Form Select -->
                        <div id="input-patient" class="col-md-12 col-lg-6 input-patient">
                            <?= $form->field($model, 'visited_before')->dropDownList(['New Patient' => 'New Patient', 'Returning Patient' => 'Returning Patient', 'Other' => 'Other'], ['prompt' => 'Have You Visited Us Before?*'])->label(false) ?>
                        </div>

                        <div id="input-subject" class="col-lg-12">
                            <?= $form->field($model, 'subject')->input('text', ['placeholder' => 'Subject*'])->label(false) ?>
                        </div>

                        <div id="input-message" class="col-lg-12 input-message">
                            <?= $form->field($model, 'message')->textarea(['placeholder' => 'Your Message ...'])->label(false) ?>
                        </div>

                        <!-- Contact Form Button -->
                        <div class="col-lg-12 mt-15">
                            <?= \yii\bootstrap4\Html::submitButton('Send Your Message', ['class' => 'btn btn-brand brand-hover']) ?>
                        </div>

                    <?php ActiveForm::end() ?>

                </div>
            </div> 	<!-- END CONTACT FORM -->


        </div>	<!-- End row -->

    </div>	   <!-- End container -->

</section>	<!-- END CONTACTS-1 -->
