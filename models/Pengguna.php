<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengguna".
 *
 * @property string $nik
 * @property string $no_kk
 * @property string $nama
 * @property string $password
 * @property int $id_group
 * @property int $isAdmin
 *
 * @property KartuKeluarga $noKk
 * @property DataGroup $group
 */
class Pengguna extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengguna';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik', 'no_kk', 'nama', 'password', 'id_group', 'isAdmin'], 'required'],
            [['id_group', 'isAdmin'], 'integer'],
            [['nik', 'no_kk'], 'string', 'max' => 16],
            [['nama', 'password'], 'string', 'max' => 255],
            [['nik'], 'unique'],
            [['no_kk'], 'exist', 'skipOnError' => true, 'targetClass' => KartuKeluarga::className(), 'targetAttribute' => ['no_kk' => 'no_kk']],
            [['id_group'], 'exist', 'skipOnError' => true, 'targetClass' => DataGroup::className(), 'targetAttribute' => ['id_group' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nik' => 'Nik',
            'no_kk' => 'No Kk',
            'nama' => 'Nama',
            'password' => 'Password',
            'id_group' => 'Id Group',
            'isAdmin' => 'Is Admin',
        ];
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
    public function getGroup()
    {
        return $this->hasOne(DataGroup::className(), ['id' => 'id_group']);
    }

    public function beforeSave($insert)
    {
        $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);

        return parent::beforeSave($insert);
    }
}
