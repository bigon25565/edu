<?php

namespace app\test_system\models\test;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\test_system\models\test\Test;

/**
 * TestQuery represents the model behind the search form of `app\test_system\models\test\Test`.
 */
class TestQuery extends Test
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'count_attempt', 'is_exam', 'is_draft', 'time_limit', 'created_by', 'updated_by'], 'integer'],
            [['title', 'description', 'type', 'begin_at', 'end_at', 'deadline_at', 'created_at', 'updated_at'], 'safe'],
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
        $query = Test::find();

        // add conditions that should always apply here

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
            'id' => $this->id,
            'begin_at' => $this->begin_at,
            'end_at' => $this->end_at,
            'deadline_at' => $this->deadline_at,
            'count_attempt' => $this->count_attempt,
            'is_exam' => $this->is_exam,
            'is_draft' => $this->is_draft,
            'time_limit' => $this->time_limit,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
