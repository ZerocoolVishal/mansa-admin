<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactUsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contact us';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-us-index">

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

                    'name',
                    'email:email',
                    'phone',
                    'visited_before',
                    'subject',
                    'message:ntext',
                    [
                        'attribute' => 'created_at',
                        'value' => function(\app\models\ContactUs $model) {
                            return \app\helpers\AppHelpers::convertTimezone($model->created_at);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>


</div>
