<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Features */

$this->title = 'Update Features: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Features', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->feature_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="features-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
