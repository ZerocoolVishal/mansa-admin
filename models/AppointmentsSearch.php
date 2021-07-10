<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Appointments;

/**
 * AppointmentsSearch represents the model behind the search form of `app\models\Appointments`.
 */
class AppointmentsSearch extends Appointments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['appointment_id', 'doctor_id', 'doctor_timing_id', 'status', 'is_email_verified'], 'integer'],
            [['appointment_no', 'name', 'email', 'phone', 'date', 'message', 'email_code', 'created_at'], 'safe'],
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
        $query = Appointments::find();

        // add conditions that should always apply here
        if(empty($params['sort'])) {
            $query->orderBy(['appointment_id' => SORT_DESC]);
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
            'appointment_id' => $this->appointment_id,
            'DATE(date)' => $this->date,
            'doctor_id' => $this->doctor_id,
            'status' => $this->status,
            'is_email_verified' => $this->is_email_verified,
            'created_at' => $this->created_at,
            'doctor_timing_id' => $this->doctor_timing_id,
        ]);

        $query->andFilterWhere(['like', 'appointment_no', $this->appointment_no])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'email_code', $this->email_code]);

        return $dataProvider;
    }
}
