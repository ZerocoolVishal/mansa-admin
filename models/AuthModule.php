<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_auth_module".
 *
 * @property int $auth_module_id
 * @property string $module_name
 * @property string $module_url
 * @property int $is_active
 *
 * @property AuthItem[] $authItems
 */
class AuthModule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_auth_module';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['module_name', 'module_url'], 'required'],
            [['is_active'], 'integer'],
            [['module_name'], 'string', 'max' => 100],
            [['module_url'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'auth_module_id' => 'Auth Module ID',
            'module_name' => 'Module Name',
            'module_url' => 'Module Url',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * Gets query for [[TblAuthItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItems()
    {
        return $this->hasMany(AuthItem::className(), ['auth_module_id' => 'auth_module_id']);
    }
}
