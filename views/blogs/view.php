<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Blogs */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="blogs-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->blog_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->blog_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="card shadow-sm">
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'blog_id',
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
                        'attribute' => 'image',
                        'format' => 'html',
                        'value' => function (\app\models\Blogs $model) {
                            return Html::img("@web/uploads/$model->image", ['width' => '100px']);
                        },
                    ],
                    'title',
                    'content:ntext',
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
                            return ($model->is_featured == 1)? 'Yes' : 'No';
                        },
                    ],
                    [
                        'attribute' => 'is_active',
                        'format' => 'raw',
                        'value' => function($model) {
                            return ($model->is_active == 1)? 'Yes' : 'No';
                        },
                    ],
                ],
            ]) ?>
        </div>
    </div>

</div>
