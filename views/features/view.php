<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Features */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Features', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="features-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->feature_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->feature_id], [
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
                        'value' => function (\app\models\Features $model) {
                            return Html::img("@web/uploads/$model->image", ['width' => '100px']);
                        },
                    ],
                    'contant',
                    [
                        'attribute' => 'is_active',
                        'format' => 'raw',
                        'value' => function(\app\models\Features $model) {
                            return ($model->is_active == 1)? 'Yes' : 'No';
                        },
                    ],
                ],
            ]) ?>
        </div>
    </div>

</div>
