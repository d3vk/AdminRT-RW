<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forlogin".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $authkey
 * @property string $accessToken
 */
class Forlogin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forlogin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authkey', 'accessToken'], 'required'],
            [['username', 'password'], 'string', 'max' => 255],
            [['authkey', 'accessToken'], 'string', 'max' => 17],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authkey' => 'Authkey',
            'accessToken' => 'Access Token',
        ];
    }
}
