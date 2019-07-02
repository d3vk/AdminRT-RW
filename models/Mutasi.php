<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mutasi".
 *
 * @property int $id
 * @property string $no_kk
 * @property string $kepala_keluarga
 * @property string $tanggal
 * @property string $wilayah_lama
 * @property string $wilayah_baru
 * @property int $group_lama
 * @property int $group_baru
 * @property string $approval
 *
 * @property KartuKeluarga $noKk
 * @property StatusKk $approval0
 */
class Mutasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mutasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_kk', 'kepala_keluarga', 'tanggal', 'wilayah_lama', 'wilayah_baru', 'group_lama', 'group_baru', 'approval'], 'required'],
            [['tanggal'], 'safe'],
            [['group_lama', 'group_baru'], 'integer'],
            [['no_kk'], 'string', 'max' => 16],
            [['kepala_keluarga'], 'string', 'max' => 255],
            [['wilayah_lama', 'wilayah_baru'], 'string', 'max' => 7],
            [['approval'], 'string', 'max' => 15],
            [['no_kk'], 'exist', 'skipOnError' => true, 'targetClass' => KartuKeluarga::className(), 'targetAttribute' => ['no_kk' => 'no_kk']],
            [['approval'], 'exist', 'skipOnError' => true, 'targetClass' => StatusKk::className(), 'targetAttribute' => ['approval' => 'keterangan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_kk' => 'Nomor KK',
            'kepala_keluarga' => 'Kepala Keluarga',
            'tanggal' => 'Tanggal',
            'wilayah_lama' => 'Wilayah Lama',
            'wilayah_baru' => 'Wilayah Baru',
            'group_lama' => 'Group Lama',
            'group_baru' => 'Group Baru',
            'approval' => 'Approval',
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
    public function getApproval0()
    {
        return $this->hasOne(StatusKk::className(), ['keterangan' => 'approval']);
    }

    public function getStatus()
    {
        $model = Mutasi::find()->where(['no_kk' => Yii::$app->user->identity->no_kk])->one();
        // var_dump($model);

        if (!$model) {
            return "Aktif";
        }
        else {
            return $model->approval;
        }
        
    }
}
