<?php

namespace app\models;

use phpDocumentor\Reflection\Types\This;
use Yii;

/**
 * This is the model class for table "tbl_doctor_timing".
 *
 * @property int $doctor_timing_id
 * @property int $doctor_id
 * @property string $date
 * @property string $start_time
 * @property string $end_time
 * @property int $is_deleted
 * @property int $is_booked
 *
 * @property Doctors $doctor
 */
class DoctorTiming extends \yii\db\ActiveRecord
{

    const BOOKED = 1;
    const AVAILABLE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_doctor_timing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctor_id', 'date', 'start_time', 'end_time'], 'required', 'on' => ['create', 'update']],
            [['doctor_id', 'is_deleted', 'is_booked'], 'integer'],
            [['date', 'start_time', 'end_time'], 'safe'],
            ['end_time', 'compare', 'compareAttribute' => 'start_time', 'operator' => '>'],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctors::className(), 'targetAttribute' => ['doctor_id' => 'doctor_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'doctor_timing_id' => 'Doctor Timing ID',
            'doctor_id' => 'Doctor',
            'date' => 'Date',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'is_deleted' => 'Is Deleted',
            'is_booked' => 'Is Booked',
        ];
    }

    /**
     * Gets query for [[Doctor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctors::className(), ['doctor_id' => 'doctor_id']);
    }

    public function beforeSave($insert)
    {
        if(in_array($this->scenario, ['create', 'update'])) {
            $date = $this->date;
            $this->start_time = date('Y-m-d H:i:s', strtotime("$date $this->start_time"));
            $this->end_time = date('Y-m-d H:i:s', strtotime("$date $this->end_time"));
        }

        return parent::beforeSave($insert);
    }


}
