<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admins';
$this->params['breadcrumbs'][] = $this->title;

\app\assets\SliderAsset::register($this);

?>
<div class="admin-index">

    <p>
        <?= Html::a('Create Admin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="card shadow-sm">
        <div class="card-body">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'pager' => [
                    'class' => \yii\bootstrap4\LinkPager::class,
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'name',
                    'email:email',
                    'phone',
                    [
                        'attribute' => 'is_active',
                        'format' => 'raw',
                        'value' => function($model) {
                            $status = ($model->is_active == 1)? 'checked' : '';
                            $url = \yii\helpers\Url::to(['change-status']);
                            return "<label class=\"switch\">
                                              <input type=\"checkbox\" $status onchange='changeStatus($model->primaryKey, \"$url\")'>
                                              <span class=\"slider round\"></span>
                                            </label>";
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'is_active', [1 => 'Yes' , 0 => 'No'], ['class' => 'form-control', 'prompt' => 'All']),
                    ],

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
