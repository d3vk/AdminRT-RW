<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_group".
 *
 * @property int $id
 * @property string $id_wilayah
 * @property string $no_kk
 * @property string $kepala_keluarga
 * @property string $nama_group
 * @property int $rt
 * @property int $rw
 *
 * @property Wilayah $wilayah
 * @property KartuKeluarga $noKk
 * @property KartuKeluarga $kepalaKeluarga
 * @property Mutasi[] $mutasis
 * @property Mutasi[] $mutasis0
 * @property Pengguna[] $penggunas
 */
class DataGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_wilayah', 'no_kk', 'kepala_keluarga', 'nama_group', 'rt', 'rw'], 'required'],
            [['rt', 'rw'], 'integer'],
            [['id_wilayah', 'kepala_keluarga', 'nama_group'], 'string', 'max' => 255],
            [['no_kk'], 'string', 'max' => 16],
            [['id_wilayah'], 'exist', 'skipOnError' => true, 'targetClass' => Wilayah::className(), 'targetAttribute' => ['id_wilayah' => 'kodepos']],
            [['no_kk'], 'exist', 'skipOnError' => true, 'targetClass' => KartuKeluarga::className(), 'targetAttribute' => ['no_kk' => 'no_kk']],
            [['kepala_keluarga'], 'exist', 'skipOnError' => true, 'targetClass' => KartuKeluarga::className(), 'targetAttribute' => ['kepala_keluarga' => 'kepala_keluarga']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_wilayah' => 'ID Wilayah',
            'no_kk' => 'Nomor KK',
            'kepala_keluarga' => 'Kepala Keluarga',
            'nama_group' => 'Nama Group',
            'rt' => 'RT',
            'rw' => 'RW',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWilayah()
    {
        return $this->hasOne(Wilayah::className(), ['kodepos' => 'id_wilayah']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoKk()
    {
        return $this->hasOne(KartuKeluarga::className(), ['no_kk' => 'no_kk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKepalaKeluarga()
    {
        return $this->hasOne(KartuKeluarga::className(), ['kepala_keluarga' => 'kepala_keluarga']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMutasis()
    {
        return $this->hasMany(Mutasi::className(), ['group_baru' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMutasis0()
    {
        return $this->hasMany(Mutasi::className(), ['group_lama' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenggunas()
    {
        return $this->hasMany(Pengguna::className(), ['id_group' => 'id']);
    }

    public function getListGroupID()
    {
        $model = DataGroup::find()->all();

        foreach ($model as $values) {
            $data[$values->id] = $values->id . " - " . $values->nama_group;
        }

        return $data;
    }
}
