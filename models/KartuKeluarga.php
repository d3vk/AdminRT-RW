<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kartu_keluarga".
 *
 * @property string $no_kk
 * @property string $kepala_keluarga
 * @property string $alamat
 * @property string $status
 *
 * @property AnggotaKeluarga[] $anggotaKeluargas
 * @property DataGroup[] $dataGroups
 * @property DataGroup[] $dataGroups0
 * @property StatusKk $status0
 * @property Mutasi[] $mutasis
 * @property Pengguna[] $penggunas
 */
class KartuKeluarga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kartu_keluarga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_kk', 'kepala_keluarga', 'alamat', 'status'], 'required'],
            [['no_kk'], 'string', 'max' => 16],
            [['kepala_keluarga', 'alamat'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 15],
            [['no_kk'], 'unique'],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => StatusKk::className(), 'targetAttribute' => ['status' => 'keterangan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_kk' => 'No Kk',
            'kepala_keluarga' => 'Kepala Keluarga',
            'alamat' => 'Alamat',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggotaKeluargas()
    {
        return $this->hasMany(AnggotaKeluarga::className(), ['no_kk' => 'no_kk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataGroups()
    {
        return $this->hasMany(DataGroup::className(), ['no_kk' => 'no_kk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataGroups0()
    {
        return $this->hasMany(DataGroup::className(), ['kepala_keluarga' => 'kepala_keluarga']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(StatusKk::className(), ['keterangan' => 'status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMutasis()
    {
        return $this->hasMany(Mutasi::className(), ['no_kk' => 'no_kk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenggunas()
    {
        return $this->hasMany(Pengguna::className(), ['no_kk' => 'no_kk']);
    }

    public function getStatusKK()
    {
        $model = KartuKeluarga::find()->where(['no_kk' => Yii::$app->user->identity->no_kk])->one();
        return $model->status;

    }
}