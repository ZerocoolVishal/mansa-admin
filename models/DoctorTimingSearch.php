<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DoctorTiming;

/**
 * DoctorTimingSearch represents the model behind the search form of `app\models\DoctorTiming`.
 */
class DoctorTimingSearch extends DoctorTiming
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctor_timing_id', 'doctor_id', 'is_deleted', 'is_booked'], 'integer'],
            [['date', 'start_time', 'end_time'], 'safe'],
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
        $query = DoctorTiming::find()->where(['is_deleted' => 0]);

        // add conditions that should always apply here
        if(empty($params['sort'])) {
            $query->orderBy(['date' => SORT_DESC, 'start_time' => SORT_ASC]);
        }

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
            'doctor_timing_id' => $this->doctor_timing_id,
            'doctor_id' => $this->doctor_id,
            'date' => $this->date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'is_deleted' => $this->is_deleted,
            'is_booked' => $this->is_booked,
        ]);

        return $dataProvider;
    }
}
