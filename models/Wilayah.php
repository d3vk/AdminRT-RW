<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wilayah".
 *
 * @property int $id
 * @property string $kelurahan
 * @property string $kecamatan
 * @property string $kabupaten
 * @property string $provinsi
 * @property string $kodepos
 *
 * @property DataGroup[] $dataGroups
 */
class Wilayah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wilayah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kelurahan', 'kecamatan', 'kabupaten', 'provinsi', 'kodepos'], 'required'],
            [['id'], 'integer'],
            [['kelurahan', 'kecamatan', 'kabupaten', 'provinsi'], 'string', 'max' => 255],
            [['kodepos'], 'string', 'max' => 7],
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
            'kelurahan' => 'Kelurahan',
            'kecamatan' => 'Kecamatan',
            'kabupaten' => 'Kabupaten',
            'provinsi' => 'Provinsi',
            'kodepos' => 'Kodepos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataGroups()
    {
        return $this->hasMany(DataGroup::className(), ['id_wilayah' => 'kodepos']);
    }
}
