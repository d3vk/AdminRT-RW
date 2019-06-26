<?php

namespace app\models;

use Yii;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $nik;
    public $no_kk;
    public $nama;
    public $password;
    public $id_group;
    public $isAdmin;


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($nik)
    {
        $model = Pengguna::find()->where(['nik' => $nik])->one();

        if (empty($model)) {
            return null;
        }

        return new self($model);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($nik)
    {
        return User::findIdentity($nik);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->nik;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return false;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
}
