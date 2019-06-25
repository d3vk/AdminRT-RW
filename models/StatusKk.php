<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_kk".
 *
 * @property int $id
 * @property string $keterangan
 *
 * @property KartuKeluarga[] $kartuKeluargas
 */
class StatusKk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status_kk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'keterangan'], 'required'],
            [['id'], 'integer'],
            [['keterangan'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKartuKeluargas()
    {
        return $this->hasMany(KartuKeluarga::className(), ['status' => 'keterangan']);
    }

    public function getStatusKK()
    {
        $model = StatusKk::find()->all();

        foreach ($model as $values) {
            $data[$values->keterangan] = $values->keterangan;
        }

        return $data;
    }
}
