<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "tagihan".
 *
 * @property int $id
 * @property int $id_group
 * @property string $no_kk
 * @property string $deskripsi
 * @property int $tagihan
 * @property string $status
 *
 * @property DataGroup $group
 */
class Tagihan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tagihan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_group', 'no_kk', 'deskripsi', 'tagihan', 'status'], 'required'],
            [['id_group', 'tagihan'], 'integer'],
            [['no_kk'], 'string', 'max' => 16],
            [['deskripsi'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 12],
            [['id_group'], 'exist', 'skipOnError' => true, 'targetClass' => DataGroup::className(), 'targetAttribute' => ['id_group' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_group' => 'Id Group',
            'no_kk' => 'No Kk',
            'deskripsi' => 'Deskripsi',
            'tagihan' => 'Tagihan',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(DataGroup::className(), ['id' => 'id_group']);
    }

    public function getSum()
    {
        $model = Tagihan::find()->all();

        foreach ($model as $values) {
            $data[$values->tagihan] = $values->tagihan;
        }

        return array_sum($data);
    }

    public function getStat()
    {
        $model = Tagihan::find()->where(['id_group' => Yii::$app->user->identity->id_group])->all();
        $model1 = ArrayHelper::getValue($model, '0.status');
        $model2 = ArrayHelper::getValue($model, '1.status');
        // var_dump($model1);
        // var_dump($model2);
        $out['kebersihan'] = $model1;
        $out['keamanan'] = $model2;

        return $out;
        // var_dump($model);
    }
}
