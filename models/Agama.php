<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agama".
 *
 * @property int $id
 * @property string $agama
 *
 * @property AnggotaKeluarga[] $anggotaKeluargas
 */
class Agama extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'agama';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'agama'], 'required'],
            [['id'], 'integer'],
            [['agama'], 'string', 'max' => 10],
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
            'agama' => 'Agama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggotaKeluargas()
    {
        return $this->hasMany(AnggotaKeluarga::className(), ['agama' => 'agama']);
    }
}
