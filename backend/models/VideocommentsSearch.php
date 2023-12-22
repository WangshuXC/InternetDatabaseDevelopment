<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Videocomments;

/**
 * VideocommentsSearch represents the model behind the search form of `app\models\Videocomments`.
 */
class VideocommentsSearch extends Videocomments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CommentID', 'VideoID'], 'integer'],
            [['Comment', 'CommentDate', 'Username'], 'safe'],
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
        $query = Videocomments::find();

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
            'CommentID' => $this->CommentID,
            'VideoID' => $this->VideoID,
            'CommentDate' => $this->CommentDate,
        ]);

        $query->andFilterWhere(['like', 'Comment', $this->Comment])
            ->andFilterWhere(['like', 'Username', $this->Username]);

        return $dataProvider;
    }
}
