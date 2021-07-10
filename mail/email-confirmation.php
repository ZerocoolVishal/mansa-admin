<?php

/**
 * @var $appointment \app\models\Appointments
*/

use yii\helpers\Html;

?>
<style>
    .btn {
        background-color: transparent;
        color: #fff;
        font-size: 0.915rem;
        line-height: 1;
        font-weight: 400;
        letter-spacing: 0.25px;
        padding: 12px 24px;
        border: 2px solid transparent;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        border-radius: 6px;
        -webkit-transition: all 450ms ease-in-out;
        -moz-transition: all 450ms ease-in-out;
        -o-transition: all 450ms ease-in-out;
        -ms-transition: all 450ms ease-in-out;
        transition: all 450ms ease-in-out;
    }

    .btn-brand {
        color: #fff;
        background-color: #6f9330;
        border-color: #6f9330;
    }

    .brand-hover:hover {
        color: #fff;
        background-color: #81aa35;
        border-color: #6f9330;
    }
</style>
<div class="main">
    <div>
        <p align="left">Hello <?= $appointment->name ?>,</p>
        <p> Please click the following button to verify your email</p>
    </div>
    <div style="margin-top: 40px; margin-bottom: 10px; text-align: center">
        <a class="btn btn-brand brand-hover" href="<?= \yii\helpers\Url::to(['site/confirm-email', 'key' => $appointment->email_code], true) ?>">Verify Email</a>
    </div>
    <div style="margin-top: 40px; margin-bottom: 10px; text-align: center">
        <p>If that doesn't work, copy and paste the following link in your browser:</p>
        <a href="<?= \yii\helpers\Url::to(['site/confirm-email', 'key' => $appointment->email_code], true) ?>"><?= \yii\helpers\Url::to(['site/confirm-email', 'key' => $appointment->email_code], true) ?></a>
    </div>
</div>