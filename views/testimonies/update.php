<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Testimonies */

$this->title = 'Update Testimonies: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Testimonies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->testimony_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="testimonies-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
