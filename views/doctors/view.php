<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Doctors */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Doctors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="doctors-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->doctor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->doctor_id], [
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
                    'sibtitle',
                    'short_about',
                    'long_about:ntext',
                    [
                        'attribute' => 'image',
                        'format' => 'html',
                        'value' => function (\app\models\Doctors $model) {
                            return Html::img("@web/uploads/$model->image", ['width' => '100px']);
                        },
                    ],
                    'education_training',
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
