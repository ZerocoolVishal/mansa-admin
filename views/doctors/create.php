<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Doctors */

$this->title = 'Create Doctor';
$this->params['breadcrumbs'][] = ['label' => 'Doctors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctors-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
