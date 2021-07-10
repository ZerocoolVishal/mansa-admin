<?php

namespace app\models;

use app\components\UserIdentity;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    public $user;
    public $userType;


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $type = \Yii::$app->session->get(UserIdentity::SESSION_USER_TYPE);

        if($type == UserIdentity::USER_ADMIN) {
            $admin = Admin::findIdentity($id);
            return self::setUser($admin);
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username, $type)
    {
        if($type == UserIdentity::USER_ADMIN) {
            $admin = Admin::findByUsername($username);
            return self::setUser($admin);
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->user->validatePassword($password);
    }

    private static function setUser($model) {

        /* @var $model Admin */
        if($model) {
            $type = \Yii::$app->session->get(UserIdentity::SESSION_USER_TYPE);
            $user = new User();
            if($type == UserIdentity::USER_ADMIN) {
                $user->id = $model->admin_id;
            }
            $user->username = $model->email;
            $user->password = $model->password;
            $user->user = $model;
            $user->userType = $type;
            return $user;
        }
        return null;
    }
}
