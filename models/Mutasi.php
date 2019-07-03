<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mutasi".
 *
 * @property int $id
 * @property string $nik
 * @property string $tanggal
 * @property string $wilayah_lama
 * @property string $wilayah_baru
 * @property int $group_lama
 * @property int $group_baru
 * @property string $approval
 *
 * @property StatusKk $approval0
 * @property Pengguna $nik0
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
            [['nik', 'tanggal', 'wilayah_lama', 'wilayah_baru', 'group_lama', 'group_baru', 'approval'], 'required'],
            [['tanggal'], 'safe'],
            [['group_lama', 'group_baru'], 'integer'],
            [['nik'], 'string', 'max' => 16],
            [['wilayah_lama', 'wilayah_baru'], 'string', 'max' => 7],
            [['approval'], 'string', 'max' => 15],
            [['approval'], 'exist', 'skipOnError' => true, 'targetClass' => StatusKk::className(), 'targetAttribute' => ['approval' => 'keterangan']],
            [['nik'], 'exist', 'skipOnError' => true, 'targetClass' => Pengguna::className(), 'targetAttribute' => ['nik' => 'nik']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nik' => 'Nik',
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
    public function getApproval0()
    {
        return $this->hasOne(StatusKk::className(), ['keterangan' => 'approval']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNik0()
    {
        return $this->hasOne(Pengguna::className(), ['nik' => 'nik']);
    }

    public function getStatus()
    {
        // $criteria = new CDbCriteria;
        // $criteria->select='max(id) as id';
        // $model = Mutasi::find($criteria);
        $model = Mutasi::find()->where(['nik' => Yii::$app->user->identity->nik])->orderBy(['id' => SORT_DESC])->one();
        // var_dump($model);
        if (!$model) {
            return "Aktif";
        } else {
            return $model->approval;
        }
    }
}
