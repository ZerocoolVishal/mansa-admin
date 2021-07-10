<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Testimonies */

$this->title = 'Create Testimonial';
$this->params['breadcrumbs'][] = ['label' => 'Testimonies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimonies-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
