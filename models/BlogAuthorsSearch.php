<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BlogAuthors;

/**
 * BlogAuthorsSearch represents the model behind the search form of `app\models\BlogAuthors`.
 */
class BlogAuthorsSearch extends BlogAuthors
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'is_active', 'is_deleted'], 'integer'],
            [['name', 'image', 'about'], 'safe'],
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
        $query = BlogAuthors::find();

        // add conditions that should always apply here
        $query->where(['is_deleted' => 0]);
        $query->orderBy(['author_id' => SORT_DESC]);

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
            'author_id' => $this->author_id,
            'is_active' => $this->is_active,
            'is_deleted' => $this->is_deleted,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'about', $this->about]);

        return $dataProvider;
    }
}
