<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BlogsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blogs';
$this->params['breadcrumbs'][] = $this->title;

\app\assets\SliderAsset::register($this);

?>
<div class="blogs-index">

    <p>
        <?= Html::a('Create Blogs', ['create'], ['class' => 'btn btn-success']) ?>
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
                        'attribute' => 'image',
                        'format' => 'html',
                        'value' => function (\app\models\Blogs $model) {
                            return Html::img("@web/uploads/$model->image", ['width' => '100px']);
                        },
                        'filter' => false,
                    ],
                    'title',
                    [
                            'attribute' => 'blog_category_id',
                            'label' => 'Category',
                            'value' => function (\app\models\Blogs $model) {
                                return $model->blogCategory->name;
                            },
                    ],
                    [
                        'attribute' => 'author_id',
                        'value' => function (\app\models\Blogs $model) {
                            return (isset($model->author))? $model->author->name : '-';
                        },
                    ],
                    [
                        'attribute' => 'created_at',
                        'value' => function (\app\models\Blogs $model) {
                            return \app\helpers\AppHelpers::convertTimezone($model->created_at);
                        },
                    ],
                    [
                        'attribute' => 'is_featured',
                        'format' => 'raw',
                        'value' => function($model) {
                            $status = ($model->is_featured == 1)? 'checked' : '';
                            $url = \yii\helpers\Url::to(['change-featured']);
                            return "<label class=\"switch\">
                                              <input type=\"checkbox\" $status onchange='changeStatus($model->primaryKey, \"$url\")'>
                                              <span class=\"slider round\"></span>
                                            </label>";
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'is_featured', [1 => 'Yes' , 0 => 'No'], ['class' => 'form-control', 'prompt' => 'All']),

                    ],
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
