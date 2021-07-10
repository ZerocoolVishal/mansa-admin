<?php

/**
 * @var $appointment \app\models\Appointments
 */

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
        <p>Your appointment with <b><?= $appointment->doctor->name ?></b>
            on <b><?= date('d M Y, h:i A', strtotime($appointment->date)); ?></b>
            is <b>Cancelled</b>.
        </p>
    </div>
</div>
