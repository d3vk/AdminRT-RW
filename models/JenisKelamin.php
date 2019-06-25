<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_kelamin".
 *
 * @property int $id
 * @property string $jenis_kelamin
 *
 * @property AnggotaKeluarga[] $anggotaKeluargas
 */
class JenisKelamin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_kelamin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'jenis_kelamin'], 'required'],
            [['id'], 'integer'],
            [['jenis_kelamin'], 'string', 'max' => 15],
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
            'jenis_kelamin' => 'Jenis Kelamin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggotaKeluargas()
    {
        return $this->hasMany(AnggotaKeluarga::className(), ['jenis_kelamin' => 'jenis_kelamin']);
    }

    public function getListGender()
    {
        $model = JenisKelamin::find()->all();

        foreach ($model as $values) {
            $data[$values->jenis_kelamin] = $values->jenis_kelamin;
        }

        return $data;
    }
}
