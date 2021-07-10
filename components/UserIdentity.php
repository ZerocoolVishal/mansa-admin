<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 04-Feb-20
 * Time: 7:12 PM
 */

namespace app\components;

use app\models\AuthAssignment;
use app\models\AuthItem;
use app\models\AuthModule;
use Yii;
use yii\db\ActiveQuery;

class UserIdentity
{
    const USER_ADMIN = 1;

    const SESSION_USER_TYPE = '_hospitalType';

    public static function getUserActions($controller, $user_id = null) {

        if(\Yii::$app->user->isGuest) {
            return ['/'];
        }

        if($user_id == null) {
            $user_id = \Yii::$app->user->id;
        }

        $rule_type = 'A';
        if(\Yii::$app->user->identity->userType == UserIdentity::USER_ADMIN) {
            $rule_type = 'A';
        }

        $auth = AuthItem::find()
            ->leftJoin('tbl_auth_assignment', 'tbl_auth_assignment.auth_item_id = tbl_auth_item.auth_item_id')
            ->leftJoin('tbl_auth_module', 'tbl_auth_module.auth_module_id = tbl_auth_item.auth_module_id')
            ->where(['tbl_auth_assignment.user_id' => $user_id, 'tbl_auth_assignment.user_type' => \Yii::$app->user->identity->userType])
            ->andWhere(['tbl_auth_module.module_url' => '/'.$controller])
            ->andWhere(['tbl_auth_item.rule_type' => $rule_type])
            ->asArray()
            ->all();

        $authList = [];
        foreach ($auth as $item) {
            $authList[] = trim(str_replace(  '/', '', $item['item_url']));
        }

        if(empty($authList)) {
            return ['/'];
        }

        return $authList;
    }

    public static function isAvailable($controller, $user_id = null) {

        if(\Yii::$app->user->isGuest) {
            return false;
        }

        $rule_type = 'A';
        if(\Yii::$app->user->identity->userType == UserIdentity::USER_ADMIN) {
            $rule_type = 'A';
            $user_id = Yii::$app->user->identity->id;
        }

        $auth = AuthItem::find()
           ->leftJoin('tbl_auth_assignment', 'tbl_auth_assignment.auth_item_id = tbl_auth_item.auth_item_id')
           ->leftJoin('tbl_auth_module', 'tbl_auth_module.auth_module_id = tbl_auth_item.auth_module_id')
           ->where(['tbl_auth_assignment.user_id' => $user_id])
           ->andWhere(['tbl_auth_module.module_url' => '/'.$controller])
           ->andWhere(['tbl_auth_item.rule_type' => $rule_type])
           ->asArray()
           ->all();

        $authList = [];
        foreach ($auth as $item) {
            $authList[] = str_replace(  '/', '', $item['item_url']);
        }

        return count($authList) != 0;
    }
}