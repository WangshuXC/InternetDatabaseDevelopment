<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Articlelikes;

/**
 * ArticlelikesSearch represents the model behind the search form of `app\models\Articlelikes`.
 */
class ArticlelikesSearch extends Articlelikes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LikeID', 'ArticleID', 'Likes'], 'integer'],
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
        $query = Articlelikes::find();

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
            'LikeID' => $this->LikeID,
            'ArticleID' => $this->ArticleID,
            'Likes' => $this->Likes,
        ]);

        return $dataProvider;
    }
}
