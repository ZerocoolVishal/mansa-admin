<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Doctors;

/**
 * DoctorsSearch represents the model behind the search form of `app\models\Doctors`.
 */
class DoctorsSearch extends Doctors
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctor_id', 'education_training', 'is_featured', 'is_active', 'is_deleted'], 'integer'],
            [['name', 'sibtitle', 'short_about', 'long_about', 'image'], 'safe'],
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
        $query = Doctors::find();

        // add conditions that should always apply here
        $query->where(['is_deleted' => 0]);
        $query->orderBy(['doctor_id' => SORT_DESC]);

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
            'doctor_id' => $this->doctor_id,
            'education_training' => $this->education_training,
            'is_featured' => $this->is_featured,
            'is_active' => $this->is_active,
            'is_deleted' => $this->is_deleted,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'sibtitle', $this->sibtitle])
            ->andFilterWhere(['like', 'short_about', $this->short_about])
            ->andFilterWhere(['like', 'long_about', $this->long_about])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
