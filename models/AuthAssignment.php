<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_auth_assignment".
 *
 * @property int $auth_assignment_id
 * @property int $auth_item_id
 * @property int $user_id
 * @property string $user_type
 *
 * @property AuthItem $authItem
 */
class AuthAssignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_auth_assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auth_item_id', 'user_id', 'user_type'], 'required'],
            [['auth_item_id', 'user_id'], 'integer'],
            [['user_type'], 'string'],
            [['auth_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuthItem::className(), 'targetAttribute' => ['auth_item_id' => 'auth_item_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'auth_assignment_id' => 'Auth Assignment ID',
            'auth_item_id' => 'Auth Item ID',
            'user_id' => 'User ID',
            'user_type' => 'User Type',
        ];
    }

    /**
     * Gets query for [[AuthItem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItem()
    {
        return $this->hasOne(AuthItem::className(), ['auth_item_id' => 'auth_item_id']);
    }
}
