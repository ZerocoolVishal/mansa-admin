<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Features */

$this->title = 'Create Features';
$this->params['breadcrumbs'][] = ['label' => 'Features', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="features-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
