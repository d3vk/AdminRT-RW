<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pendidikan_terakhir".
 *
 * @property int $id
 * @property string $pendidikan
 *
 * @property AnggotaKeluarga[] $anggotaKeluargas
 */
class PendidikanTerakhir extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pendidikan_terakhir';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pendidikan'], 'required'],
            [['id'], 'integer'],
            [['pendidikan'], 'string', 'max' => 255],
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
            'pendidikan' => 'Pendidikan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggotaKeluargas()
    {
        return $this->hasMany(AnggotaKeluarga::className(), ['pendidikan' => 'pendidikan']);
    }
}
