<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BlogAuthors */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Blog Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="blog-authors-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->author_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->author_id], [
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
                    'name',
                    [
                        'attribute' => 'image',
                        'format' => 'html',
                        'value' => function (\app\models\BlogAuthors $model) {
                            return Html::img("@web/uploads/$model->image", ['width' => '100px']);
                        },
                    ],
                    'about',
                    [
                        'attribute' => 'is_active',
                        'format' => 'raw',
                        'value' => function(\app\models\BlogAuthors $model) {
                            return ($model->is_active == 1)? 'Yes' : 'No';
                        },
                    ],
                ],
            ]) ?>
        </div>
    </div>

</div>
