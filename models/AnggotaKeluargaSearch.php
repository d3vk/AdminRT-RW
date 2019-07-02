<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AnggotaKeluarga;

/**
 * AnggotaKeluargaSearch represents the model behind the search form of `app\models\AnggotaKeluarga`.
 */
class AnggotaKeluargaSearch extends AnggotaKeluarga
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik', 'no_kk', 'nama_anggota', 'status_hubungan', 'status_perkawinan', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'gol_darah', 'agama', 'pendidikan', 'pekerjaan', 'nama_ibu'], 'safe'],
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
    public function search($params, $self = false)
    {
        $query = AnggotaKeluarga::find();

        if ($self) {
            $query->where(['no_kk' => Yii::$app->user->identity->no_kk]);
        }

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
            'tanggal_lahir' => $this->tanggal_lahir,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'no_kk', $this->no_kk])
            ->andFilterWhere(['like', 'nama_anggota', $this->nama_anggota])
            ->andFilterWhere(['like', 'status_hubungan', $this->status_hubungan])
            ->andFilterWhere(['like', 'status_perkawinan', $this->status_perkawinan])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'gol_darah', $this->gol_darah])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'pendidikan', $this->pendidikan])
            ->andFilterWhere(['like', 'pekerjaan', $this->pekerjaan])
            ->andFilterWhere(['like', 'nama_ibu', $this->nama_ibu]);

        return $dataProvider;
    }
}
