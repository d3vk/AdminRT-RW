<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KartuKeluarga;

/**
 * KartuKeluargaSearch represents the model behind the search form of `app\models\KartuKeluarga`.
 */
class KartuKeluargaSearch extends KartuKeluarga
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_kk', 'kepala_keluarga', 'alamat', 'status'], 'safe'],
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
        $query = KartuKeluarga::find();

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
        $query->andFilterWhere(['like', 'no_kk', $this->no_kk])
            ->andFilterWhere(['like', 'kepala_keluarga', $this->kepala_keluarga])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
