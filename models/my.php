<?php

namespace app\models;

use Yii;
use yii\models\Image;

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
 * @property string $gender
 * @property int $email
 * @property string $phone
 * @property string $course
 * @property string $image_path
 */
class Languages extends \yii\db\ActiveRecord
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
            [['name', 'gender', 'email', 'phone', 'course', 'image_path'], 'required'],
            [['name'], 'string'],
            [['email'], 'string'],
            [['gender'], 'string', 'max' => 50],
            [['phone', 'course', 'image_path'], 'string', 'max' => 255],
            [['image_path'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg',]
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
            'gender' => 'Gender',
            'email' => 'Email',
            'phone' => 'Phone',
            'course' => 'Course',
            'image_path' => 'Image Path',
        ];
    }
    public function getImageurl(){
        return \Yii::$app->request->BaseUrl. '/uploads/' .$this->image_path;
    }
}
