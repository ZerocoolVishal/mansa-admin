<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_contact_us".
 *
 * @property int $contact_us_id
 * @property string $name
 * @property string|null $email
 * @property string $phone
 * @property string $visited_before
 * @property string $subject
 * @property string $message
 * @property string $created_at
 */
class ContactUs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_contact_us';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'visited_before', 'subject', 'message'], 'required'],
            [['message'], 'string'],
            [['created_at'], 'safe'],
            [['name', 'email', 'phone', 'subject'], 'string', 'max' => 255],
            [['visited_before'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'contact_us_id' => 'Contact Us ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'visited_before' => 'Visited Before',
            'subject' => 'Subject',
            'message' => 'Message',
            'created_at' => 'Created At',
        ];
    }

    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->created_at = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
    }
}
