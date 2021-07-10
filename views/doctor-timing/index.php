<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DoctorTimingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Doctor Timings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-timing-index">

    <p>
        <?= Html::a('Create Doctor Timing', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Create Doctor Schedule', ['create-schedule'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="card shadow-sm">
        <div class="card-body">
            <?= GridView::widget([
                'pager' => [
                    'class' => \yii\bootstrap4\LinkPager::class,
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                       'attribute' => 'doctor.name',
                        'filter' => Html::activeDropDownList($searchModel, 'doctor_id', \app\helpers\AppHelpers::getDoctors(), ['class' => 'form-control', 'prompt' => 'Select a doctor']),
                    ],
                    [
                        'attribute' => 'date',
                        'value' => function(\app\models\DoctorTiming $model) {
                            return date('d M Y', strtotime($model->date));
                        },
                        'filter' => Html::activeInput('date', $searchModel, 'date', ['class' => 'form-control'])
                    ],
                    [
                        'attribute' => 'start_time',
                        'value' => function(\app\models\DoctorTiming $model) {
                            return date('h:i A', strtotime($model->start_time));
                        },
                        'filter' => Html::activeInput('time', $searchModel, 'start_time', ['class' => 'form-control'])
                    ],
                    [
                        'attribute' => 'end_time',
                        'value' => function(\app\models\DoctorTiming $model) {
                            return date('h:i A', strtotime($model->end_time));
                        },
                        'filter' => Html::activeInput('time', $searchModel, 'end_time', ['class' => 'form-control'])
                    ],
                    [
                        'attribute' => 'is_booked',
                        'label' => 'Status',
                        'format' => 'html',
                        'value' => function(\app\models\DoctorTiming $model) {
                            $tag = Html::tag('span', 'Available', ['class' => 'badge badge-pill badge-secondary']);
                            if($model->is_booked) {
                                $tag = Html::tag('span', 'Booked', ['class' => 'badge badge-pill badge-success']);
                                return Html::a($tag, ['appointments/index', 'AppointmentsSearch[doctor_timing_id]' => $model->doctor_timing_id]);
                            }
                            return Html::a($tag, ['appointments/index', 'AppointmentsSearch[doctor_timing_id]' => $model->doctor_timing_id]);
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'is_booked', ['1' => 'Booked', '0' => 'Available'], ['class' => 'form-control', 'prompt' => 'All'])
                    ],
                    //'is_deleted',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'buttons' => [
                            'update' =>  function($url,$model) {
                                return Html::a('<i class="fas fa-edit"></i>', $url, [
                                    'title' => Yii::t('app', 'update')
                                ]);
                            },
                            'view' =>  function($url,$model) {
                                return Html::a('<i class="fas fa-eye"></i>', $url, [
                                    'title' => Yii::t('app', 'view')
                                ]);
                            },
                            'delete' => function($url,$model) {
                                return Html::a('<i class="fas fa-trash"></i>', $url, [
                                    'title' => Yii::t('app', 'delete'),
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]);
                            }
                        ]
                    ],
                ],
            ]); ?>
        </div>
    </div>

</div>
