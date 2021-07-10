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
 * @property int $is_active
 * @property int $is_deleted
 *
 * @property DoctorCertificates[] $doctorCertificates
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
            [['name', 'sibtitle', 'short_about', 'long_about', 'image', 'education_training'], 'required'],
            [['long_about', 'education_training'], 'string'],
            [['is_featured', 'is_active', 'is_deleted'], 'integer'],
            [['name', 'sibtitle', 'image'], 'string', 'max' => 255],
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
}
