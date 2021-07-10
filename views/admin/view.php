<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="admin-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->admin_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->admin_id], [
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
                    'email:email',
                    'phone',
                    [
                        'attribute' => 'is_active',
                        'format' => 'raw',
                        'value' => function($model) {
                            return ($model->is_active == 1)? 'Yes' : 'No';
                        },
                    ],
                    [
                        'attribute' => 'is_deleted',
                        'format' => 'raw',
                        'value' => function($model) {
                            return ($model->is_deleted == 1)? 'Yes' : 'No';
                        },
                    ],
                ],
            ]) ?>
        </div>
    </div>

</div>
