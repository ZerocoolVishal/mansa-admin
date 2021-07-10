<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_testimonies".
 *
 * @property int $testimony_id
 * @property string $image
 * @property string $name
 * @property string $subtitle
 * @property string $content
 * @property int $is_active
 * @property int $is_deleted
 */
class Testimonies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_testimonies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'name', 'subtitle', 'content'], 'required'],
            [['is_active', 'is_deleted'], 'integer'],
            [['image', 'name', 'subtitle', 'content'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'testimony_id' => 'Testimony',
            'image' => 'Image',
            'name' => 'Name',
            'subtitle' => 'Subtitle',
            'content' => 'Content',
            'is_active' => 'Active',
            'is_deleted' => 'Deleted',
        ];
    }
}
