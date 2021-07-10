<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Appointments */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="appointments-view">

    <div class="card shadow-sm">
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'appointment_id',
                    [
                        'attribute' => 'doctor.name',
                        'label' => 'Doctor',
                    ],
                    'appointment_no',
                    'name',
                    'email:email',
                    'phone',
                    [
                        'attribute' => 'date',
                        'value' => function (\app\models\Appointments $model) {
                            return \app\helpers\AppHelpers::formatDateTime($model->date);
                        }
                    ],
                    'message:ntext',
                    [
                            'attribute' => 'status',
                            'format' => 'raw',
                            'value' => function (\app\models\Appointments $model) {
                                if($model->status == \app\models\Appointments::NOT_CONFIRMED) {
                                    return "Not Confirmed";
                                }
                                if($model->status == \app\models\Appointments::CONFIRMED) {
                                    return "Confirmed";
                                }
                            }
                    ],
                    [
                        'attribute' => 'created_at',
                        'value' => function (\app\models\Appointments $model) {
                            return \app\helpers\AppHelpers::convertTimezone($model->created_at);
                        }
                    ],
                ],
            ]) ?>
        </div>
    </div>

</div>
