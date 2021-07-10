<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_blog_categories".
 *
 * @property int $blog_category_id
 * @property string $name
 * @property int $is_active
 * @property int $is_deleted
 *
 * @property Blogs[] $blogs
 */
class BlogCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_blog_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['is_active', 'is_deleted'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'blog_category_id' => 'Blog Category',
            'name' => 'Name',
            'is_active' => 'Active',
            'is_deleted' => 'Deleted',
        ];
    }

    /**
     * Gets query for [[TblBlogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlogs()
    {
        return $this->hasMany(Blogs::className(), ['blog_category_id' => 'blog_category_id']);
    }
}
