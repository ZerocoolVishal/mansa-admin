<?php

/**
 * @var $this \yii\web\View
 * @var $status boolean
 * @var $appointment \app\models\Appointments
*/

$this->title = "Email Verification";

?>
<div class="container">

    <div class="text-center mt-5 mb-5">
        <?php if($status): ?>
            <?= \yii\bootstrap4\Html::img('@web/images/tick.png', ['height' => '90px', 'width' => '90px', 'class' => 'm-3']) ?>
            <h2>
                Your appointment request has been send successfully
            </h2>
            <div class="m-5">
                <?= \yii\widgets\DetailView::widget([
                    'model' => $appointment,
                    'attributes' => [
                        'name',
                        'appointment_no',
                        'name',
                        'email',
                        'phone',
                        [
                            'attribute' => 'date',
                            'label' => 'Appointment Date',
                            'value' => function (\app\models\Appointments $model) {
                                return date('d M Y, H:i A', strtotime($model->date));
                            }
                        ],
                        [
                            'attribute' => 'status',
                            'label' => 'Appointment Status',
                            'format' => 'raw',
                            'value' => function (\app\models\Appointments $model) {
                                if($model->status == \app\models\Appointments::NOT_CONFIRMED) {
                                    return "Not Confirmed <br> (You will receive an email & call on conformation)";
                                }
                                if($model->status == \app\models\Appointments::CONFIRMED) {
                                    return "Confirmed";
                                }
                            }
                        ]
                    ],
                ]) ?>
            </div>
            <p>
                You will get an confirmation email once the appointment is confirmed
            </p>
        <?php else: ?>
            <?= \yii\bootstrap4\Html::img('@web/images/report.png', ['height' => '90px', 'width' => '90px', 'class' => 'm-3']) ?>
            <h2>
                Email validation code expired
            </h2>
            <p>
                Please try again, If You have already confirmed your email once please ignore this
            </p>
            <?= \yii\bootstrap\Html::a('Book An Appointment', ['site/book-appointment'], ['class' => 'btn btn-brand brand-hover']) ?>
        <?php endif; ?>
    </div>

</div>