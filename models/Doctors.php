<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_doctors".
 *
 * @property int $doctor_id
 * @property string $name
 * @property string $sibtitle
 * @property string $short_about
 * @property string $long_about
 * @property string $image
 * @property string $education_training
 * @property int $is_featured
 * @property int $sort_order
 * @property string|null $section_name
 * @property string $appointment_link
 * @property int $is_active
 * @property int $is_deleted
 *
 * @property DoctorCertificates[] $tblDoctorCertificates
 * @property DoctorTiming[] $tblDoctorTimings
 */
class Doctors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_doctors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'sibtitle', 'short_about', 'long_about', 'image', 'education_training', 'appointment_link'], 'required'],
            [['long_about', 'education_training'], 'string'],
            [['is_featured', 'sort_order', 'is_active', 'is_deleted'], 'integer'],
            [['name', 'sibtitle', 'image', 'section_name', 'appointment_link'], 'string', 'max' => 255],
            [['short_about'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'doctor_id' => 'Doctor',
            'name' => 'Name',
            'sibtitle' => 'Sibtitle',
            'short_about' => 'Short About',
            'long_about' => 'Long About',
            'image' => 'Image',
            'education_training' => 'Education Training',
            'is_featured' => 'Featured',
            'sort_order' => 'Sort Order',
            'section_name' => 'Section Name',
            'appointment_link' => 'Appointment Link',
            'is_active' => 'Active',
            'is_deleted' => 'Deleted',
        ];
    }

    /**
     * Gets query for [[TblDoctorCertificates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorCertificates()
    {
        return $this->hasMany(DoctorCertificates::className(), ['doctor_id' => 'doctor_id']);
    }

    /**
     * Gets query for [[TblDoctorTimings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorTimings()
    {
        return $this->hasMany(DoctorTiming::className(), ['doctor_id' => 'doctor_id']);
    }
}
