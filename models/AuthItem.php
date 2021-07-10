<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_auth_item".
 *
 * @property int $auth_item_id
 * @property string $item_name
 * @property string $item_url
 * @property string|null $item_description
 * @property int $auth_module_id
 * @property string $rule_type
 * @property int $is_active
 *
 * @property AuthAssignment[] $authAssignments
 * @property AuthModule $authModule
 */
class AuthItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_auth_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_name', 'item_url', 'auth_module_id', 'rule_type'], 'required'],
            [['item_description', 'rule_type'], 'string'],
            [['auth_module_id', 'is_active'], 'integer'],
            [['item_name'], 'string', 'max' => 100],
            [['item_url'], 'string', 'max' => 45],
            [['auth_module_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuthModule::className(), 'targetAttribute' => ['auth_module_id' => 'auth_module_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'auth_item_id' => 'Auth Item ID',
            'item_name' => 'Item Name',
            'item_url' => 'Item Url',
            'item_description' => 'Item Description',
            'auth_module_id' => 'Auth Module ID',
            'rule_type' => 'Rule Type',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * Gets query for [[AuthAssignments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthAssignments()
    {
        return $this->hasMany(AuthAssignment::className(), ['auth_item_id' => 'auth_item_id']);
    }

    /**
     * Gets query for [[AuthModule]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthModule()
    {
        return $this->hasOne(AuthModule::className(), ['auth_module_id' => 'auth_module_id']);
    }
}
