<?php

namespace app\models;

use Yii;
use yii\web\identityInterface;

/**
 * This is the model class for table "signupform".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $password_repeat
 */
class User extends \yii\db\ActiveRecord implements identityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'signupform';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'password_repeat'], 'required'],
            [['username', 'password', 'password_repeat'], 'string', 'max' => 255],
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
            'password_repeat' => 'Password Repeat',
        ];
    }
       
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    
        return self::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
   return true;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    public function getUsername()
    {
        return Yii::$app->user->identity->username;
    }
}




