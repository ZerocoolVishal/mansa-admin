<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_admin".
 *
 * @property int $admin_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $phone
 * @property int $is_active
 * @property int $is_deleted
 */
class Admin extends \yii\db\ActiveRecord
{
    public $permissions;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'permissions'], 'required'],
            [['password'], 'required', 'on' => 'create'],
            [['is_active', 'is_deleted'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['email', 'password'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['phone'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => 'Admin ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'phone' => 'Phone',
            'is_active' => 'Active',
            'is_deleted' => 'Deleted',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne(['admin_id' => $id, 'is_active' => 1, 'is_deleted' => 0]);
    }

    public static function findByUsername($username)
    {
        return self::findOne(['email' => $username, 'is_active' => 1, 'is_deleted' => 0]);
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
