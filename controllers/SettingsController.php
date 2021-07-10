<?php

namespace app\controllers;

class SettingsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSms()
    {
        return $this->render('sms');
    }

}
