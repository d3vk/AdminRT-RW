<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mutasi".
 *
 * @property int $id
 * @property string $no_kk
 * @property string $tanggal
 * @property int $group_lama
 * @property int $group_baru
 * @property string $approval
 *
 * @property KartuKeluarga $noKk
 * @property DataGroup $groupBaru
 * @property DataGroup $groupLama
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
            [['id', 'no_kk', 'tanggal', 'group_lama', 'group_baru', 'approval'], 'required'],
            [['id', 'group_lama', 'group_baru'], 'integer'],
            [['tanggal'], 'safe'],
            [['no_kk'], 'string', 'max' => 16],
            [['approval'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['no_kk'], 'exist', 'skipOnError' => true, 'targetClass' => KartuKeluarga::className(), 'targetAttribute' => ['no_kk' => 'no_kk']],
            [['group_baru'], 'exist', 'skipOnError' => true, 'targetClass' => DataGroup::className(), 'targetAttribute' => ['group_baru' => 'id']],
            [['group_lama'], 'exist', 'skipOnError' => true, 'targetClass' => DataGroup::className(), 'targetAttribute' => ['group_lama' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_kk' => 'No Kk',
            'tanggal' => 'Tanggal',
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
    public function getGroupBaru()
    {
        return $this->hasOne(DataGroup::className(), ['id' => 'group_baru']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupLama()
    {
        return $this->hasOne(DataGroup::className(), ['id' => 'group_lama']);
    }
}
