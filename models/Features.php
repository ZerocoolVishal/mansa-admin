<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_features".
 *
 * @property int $feature_id
 * @property string $name
 * @property string $image
 * @property string $contant
 * @property int $is_active
 * @property string $is_deleted
 */
class Features extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_features';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image', 'contant'], 'required'],
            [['is_active'], 'integer'],
            [['name', 'image', 'contant'], 'string', 'max' => 255],
            [['is_deleted'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'feature_id' => 'Feature',
            'name' => 'Name',
            'image' => 'Image',
            'contant' => 'Contant',
            'is_active' => 'Active',
            'is_deleted' => 'Deleted',
        ];
    }
}
