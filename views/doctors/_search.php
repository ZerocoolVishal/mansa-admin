<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DoctorsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctors-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'doctor_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'sibtitle') ?>

    <?= $form->field($model, 'short_about') ?>

    <?= $form->field($model, 'long_about') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'education_training') ?>

    <?php // echo $form->field($model, 'is_featured') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'is_deleted') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
