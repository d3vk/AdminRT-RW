<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gol_darah".
 *
 * @property int $id
 * @property string $gol_darah
 *
 * @property AnggotaKeluarga[] $anggotaKeluargas
 */
class GolDarah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gol_darah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'gol_darah'], 'required'],
            [['id'], 'integer'],
            [['gol_darah'], 'string', 'max' => 2],
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
            'gol_darah' => 'Gol Darah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggotaKeluargas()
    {
        return $this->hasMany(AnggotaKeluarga::className(), ['gol_darah' => 'gol_darah']);
    }

    public function getListGoldar()
    {
        $model = GolDarah::find()->all();

        foreach ($model as $values) {
            $data[$values->gol_darah] = $values->gol_darah;
        }

        return $data;
    }
}
