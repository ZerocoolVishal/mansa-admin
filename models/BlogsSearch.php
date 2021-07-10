<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Blogs;

/**
 * BlogsSearch represents the model behind the search form of `app\models\Blogs`.
 */
class BlogsSearch extends Blogs
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_id', 'blog_category_id', 'author_id', 'is_featured', 'is_active', 'is_deleted'], 'integer'],
            [['image', 'title', 'content', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Blogs::find();

        // add conditions that should always apply here
        $query->where(['is_deleted' => 0]);
        $query->orderBy(['blog_id' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'blog_id' => $this->blog_id,
            'blog_category_id' => $this->blog_category_id,
            'author_id' => $this->author_id,
            'is_featured' => $this->is_featured,
            'created_at' => $this->created_at,
            'is_active' => $this->is_active,
            'is_deleted' => $this->is_deleted,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
