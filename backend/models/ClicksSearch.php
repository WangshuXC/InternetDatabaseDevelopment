<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clicks;

/**
 * ClicksSearch represents the model behind the search form of `app\models\Clicks`.
 */
class ClicksSearch extends Clicks
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ClickID', 'ContentID', 'ClickCount'], 'integer'],
            [['ContentType'], 'safe'],
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
        $query = Clicks::find();

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
            'ClickID' => $this->ClickID,
            'ContentID' => $this->ContentID,
            'ClickCount' => $this->ClickCount,
        ]);

        $query->andFilterWhere(['like', 'ContentType', $this->ContentType]);

        return $dataProvider;
    }
}
