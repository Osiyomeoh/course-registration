<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "signupform".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $password_repeat
 */
class Signupform extends \yii\db\ActiveRecord
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
    public function signup(){
        if (!$this->validate()){
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->password = $this->password;
        return $user->save() ? $user : null;
    }
}
