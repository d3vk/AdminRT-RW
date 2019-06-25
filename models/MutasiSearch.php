<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mutasi;

/**
 * MutasiSearch represents the model behind the search form of `app\models\Mutasi`.
 */
class MutasiSearch extends Mutasi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'group_lama', 'group_baru'], 'integer'],
            [['no_kk', 'tanggal', 'approval'], 'safe'],
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
        $query = Mutasi::find();

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
            'tanggal' => $this->tanggal,
            'group_lama' => $this->group_lama,
            'group_baru' => $this->group_baru,
        ]);

        $query->andFilterWhere(['like', 'no_kk', $this->no_kk])
            ->andFilterWhere(['like', 'approval', $this->approval]);

        return $dataProvider;
    }
}
