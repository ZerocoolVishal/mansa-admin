<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_blogs".
 *
 * @property int $blog_id
 * @property int $blog_category_id
 * @property int|null $author_id
 * @property string $image
 * @property string $title
 * @property string $content
 * @property int $is_featured
 * @property string $created_at
 * @property int $is_active
 * @property int $is_deleted
 *
 * @property BlogCategories $blogCategory
 * @property BlogAuthors $author
 */
class Blogs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_blogs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_category_id', 'image', 'title', 'content', 'created_at'], 'required'],
            [['blog_category_id', 'author_id', 'is_featured', 'is_active', 'is_deleted'], 'integer'],
            [['content'], 'string'],
            [['created_at'], 'safe'],
            [['image', 'title'], 'string', 'max' => 255],
            [['blog_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlogCategories::className(), 'targetAttribute' => ['blog_category_id' => 'blog_category_id']],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlogAuthors::className(), 'targetAttribute' => ['author_id' => 'author_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'blog_id' => 'Blog',
            'blog_category_id' => 'Blog Category',
            'author_id' => 'Author',
            'image' => 'Image',
            'title' => 'Title',
            'content' => 'Content',
            'is_featured' => 'Featured',
            'created_at' => 'Created At',
            'is_active' => 'Active',
            'is_deleted' => 'Deleted',
        ];
    }

    /**
     * Gets query for [[BlogCategoriy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlogCategory()
    {
        return $this->hasOne(BlogCategories::className(), ['blog_category_id' => 'blog_category_id']);
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(BlogAuthors::className(), ['author_id' => 'author_id']);
    }
}
