<?php

namespace app\models;

use Yii;
use yii\models\Image;
use yii\web\identityInterface;
use yii\base\Model;
use yii\base\UploadedFile;
use yii\helpers\Url;
use yii\models\User;

/**
 * This is the model class for table "languages".
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $password_repeat
 * @property string $gender
 * @property string $email
 * @property string $phone
 * @property string $course
 * @property string $image_path
 */
class Languages extends \yii\db\ActiveRecord implements identityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'languages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'username', 'password', 'password_repeat', 'gender', 'email', 'phone', 'course', 'image_path'], 'required'],
            [['name'], 'string'],
            [['username', 'password', 'password_repeat', 'email', 'phone', 'course', 'image_path'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 50],
            [['image_path'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'username' => 'Username',
            'password' => 'Password',
            'password_repeat' => 'Password Repeat',
            'gender' => 'Gender',
            'email' => 'Email',
            'phone' => 'Phone',
            'course' => 'Course',
            'image_path' => 'Image Path',
        ];
    }
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
    public function getImageurl(){
        return Yii::$app->request->BaseUrl.$this->image_path;
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
    public function getPassword()
    {
        return Yii::$app->user->identity->password;
    }
    public function getPassword_repeat()
    {
        return Yii::$app->user->identity->password_repeat;
    }
    
}






