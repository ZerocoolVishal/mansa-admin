<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AppointmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Appointments';
$this->params['breadcrumbs'][] = $this->title;

\app\assets\SliderAsset::register($this);

?>
<div class="appointments-index">

    <p>
        <?= Html::a('Book Appointment', ['create'], ['class' => 'btn btn-success']) ?>
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

                    //'appointment_id',
                    [
                        'attribute' => 'doctor.name',
                        'label' => 'Doctor',
                        'filter' => Html::activeDropDownList($searchModel, 'doctor_id', \app\helpers\AppHelpers::getDoctors(), ['class' => 'form-control', 'prompt' => 'All'])
                    ],
                    'appointment_no',
                    'name',
                    'email:email',
                    'phone',
                    [
                        'attribute' => 'date',
                        'value' => function (\app\models\Appointments $model) {
                            return \app\helpers\AppHelpers::formatDateTime($model->date);
                        },
                        'filter' => Html::activeInput('date', $searchModel, 'date', ['class' => 'form-control'])
                    ],
                    //'message:ntext',
                    [
                        'attribute' => 'status',
                        'label' => 'Confirmed',
                        'format' => 'raw',
                        'value' => function(\app\models\Appointments $model) {
                            $status = ($model->status == 1)? 'checked' : '';
                            $url = \yii\helpers\Url::to(['change-status']);
                            return "<label class=\"switch\">
                                       <input type=\"checkbox\" $status onchange='changeStatus($model->primaryKey, \"$url\")'>
                                       <span class=\"slider round\"></span>
                                    </label>";
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'status', [1 => 'Yes' , 0 => 'No'], ['class' => 'form-control', 'prompt' => 'All']),
                    ],
                    //'created_at',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view}',
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
