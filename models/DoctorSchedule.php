<?php


namespace app\models;


use yii\base\Model;

class DoctorSchedule extends Model
{
    public $doctor_id;
    public $start_date;
    public $end_date;
    public $start_time;
    public $end_time;

    public function rules()
    {
        return [
            [['doctor_id', 'start_date', 'end_date', 'start_time', 'end_time'], 'required'],
            ['end_date', 'compare', 'compareAttribute' => 'start_date', 'operator' => '>'],
            ['end_time', 'compare', 'compareAttribute' => 'start_time', 'operator' => '>'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'doctor_id' => 'Doctor',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
        ];
    }

}