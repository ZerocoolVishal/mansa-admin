<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_appointments".
 *
 * @property int $appointment_id
 * @property string $appointment_no
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $date
 * @property int $doctor_id
 * @property int $doctor_timing_id
 * @property string $message
 * @property int $status
 * @property string|null $email_code
 * @property int $is_email_verified
 * @property string $created_at
 *
 * @property Doctors $doctor
 * @property DoctorTiming $doctorTiming
 */
class Appointments extends \yii\db\ActiveRecord
{

    const NOT_CONFIRMED = 0;
    const CONFIRMED = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_appointments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['appointment_no', 'name', 'email', 'phone', 'date', 'doctor_id', 'status', 'created_at'], 'required'],
            [['date', 'created_at'], 'safe'],
            [['message'], 'string'],
            [['doctor_id', 'status', 'is_email_verified', 'doctor_timing_id'], 'integer'],
            [['appointment_no', 'email_code'], 'string', 'max' => 10],
            [['name', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 15],
            [['email'], 'email'],
            [['phone'], 'match', 'pattern' => '/^[789]\d{9}$/', 'message' => 'Please enter a valid 10 digit mobile number']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'appointment_id' => 'Appointment ID',
            'appointment_no' => 'Appointment No',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'date' => 'Date',
            'doctor_id' => 'Doctor',
            'doctor_timing_id' => 'Doctor Timing',
            'status' => 'Status',
            'email_code' => 'Email Code',
            'is_email_verified' => 'Is Email Verified',
            'created_at' => 'Created At',
        ];
    }

    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->created_at = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
    }

    public function getDoctor()
    {
        return $this->hasOne(Doctors::className(), ['doctor_id' => 'doctor_id']);
    }

    public function getDoctorTiming()
    {
        return $this->hasOne(DoctorTiming::className(), ['doctor_timing_id' => 'doctor_timing_id']);
    }
}
