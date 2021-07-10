<?php

namespace app\models;

use himiklab\sortablegrid\SortableGridBehavior;
use Yii;

/**
 * This is the model class for table "tbl_pages".
 *
 * @property int $page_id
 * @property string $title
 * @property string $content
 * @property int $show_in_menu
 * @property int|null $sort_order
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['show_in_menu', 'sort_order'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'page_id' => 'Page ID',
            'title' => 'Title',
            'content' => 'Content',
            'show_in_menu' => 'Show In Menu',
        ];
    }

    public function behaviors()
    {
        return [
            'sort' => [
                'class' => SortableGridBehavior::className(),
                'sortableAttribute' => 'sort_order'
            ],
        ];
    }
}
