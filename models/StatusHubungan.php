<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_hubungan".
 *
 * @property int $id
 * @property string $status
 *
 * @property AnggotaKeluarga[] $anggotaKeluargas
 */
class StatusHubungan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status_hubungan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'required'],
            [['id'], 'integer'],
            [['status'], 'string', 'max' => 255],
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
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggotaKeluargas()
    {
        return $this->hasMany(AnggotaKeluarga::className(), ['status_hubungan' => 'status']);
    }

    public function getStatusHub()
    {
        $model = StatusHubungan::find()->all();

        foreach ($model as $values) {
            $data[$values->status] = $values->status;
        }

        return $data;
    }
}
