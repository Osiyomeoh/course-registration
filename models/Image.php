<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\base\UploadedFile;
use yii\models\Languages;
use yii\helpers\Url;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property string $image_path
 */
class Image extends Languages
{
 public $image_path;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image_path'], 'required'],
            [['image_path'], 'string', 'max' => 255],
            [['image_path'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg'],
        ];
    }
    public function getImageurl(){
        return \Yii::$app->request->BaseUrl. 'web/uploads/' .$this->image_path;
    }

    }