<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_doctor_certificates".
 *
 * @property int $doctor_certificate_id
 * @property int $doctor_id
 * @property string $image
 *
 * @property Doctors $doctor
 */
class DoctorCertificates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_doctor_certificates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctor_id', 'image'], 'required'],
            [['doctor_id'], 'integer'],
            [['image'], 'string', 'max' => 255],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctors::className(), 'targetAttribute' => ['doctor_id' => 'doctor_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'doctor_certificate_id' => 'Doctor Certificate ID',
            'doctor_id' => 'Doctor ID',
            'image' => 'Image',
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
}
