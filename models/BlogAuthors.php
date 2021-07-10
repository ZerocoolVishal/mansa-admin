<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_blog_authors".
 *
 * @property int $author_id
 * @property string $name
 * @property string $image
 * @property string $about
 * @property int $is_active
 * @property int $is_deleted
 *
 * @property Blogs[] $tblBlogs
 */
class BlogAuthors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_blog_authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image', 'about'], 'required'],
            [['is_active', 'is_deleted'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
            [['about'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'author_id' => 'Author',
            'name' => 'Name',
            'image' => 'Image',
            'about' => 'About',
            'is_active' => 'Active',
            'is_deleted' => 'Deleted',
        ];
    }

    /**
     * Gets query for [[TblBlogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblBlogs()
    {
        return $this->hasMany(Blogs::className(), ['author_id' => 'author_id']);
    }
}
