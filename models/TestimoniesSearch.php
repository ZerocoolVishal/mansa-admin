<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Testimonies;

/**
 * TestimoniesSearch represents the model behind the search form of `app\models\Testimonies`.
 */
class TestimoniesSearch extends Testimonies
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['testimony_id', 'is_active', 'is_deleted'], 'integer'],
            [['image', 'name', 'subtitle', 'content'], 'safe'],
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
        $query = Testimonies::find();

        // add conditions that should always apply here
        $query->where(['is_deleted' => 0]);
        $query->orderBy(['testimony_id' => SORT_DESC]);

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
            'testimony_id' => $this->testimony_id,
            'is_active' => $this->is_active,
            'is_deleted' => $this->is_deleted,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'subtitle', $this->subtitle])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
