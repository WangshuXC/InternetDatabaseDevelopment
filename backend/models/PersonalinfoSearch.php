<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Personalinfo;

/**
 * PersonalinfoSearch represents the model behind the search form of `app\models\Personalinfo`.
 */
class PersonalinfoSearch extends Personalinfo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Info', 'AvatarURL', 'Email', 'GitHubAccount', 'WeChatID'], 'safe'],
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
        $query = Personalinfo::find();

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
        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Info', $this->Info])
            ->andFilterWhere(['like', 'AvatarURL', $this->AvatarURL])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'GitHubAccount', $this->GitHubAccount])
            ->andFilterWhere(['like', 'WeChatID', $this->WeChatID]);

        return $dataProvider;
    }
}
