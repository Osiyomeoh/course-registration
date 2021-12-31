<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forms".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 */
class Forms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['name', 'email'], 'string', 'max'=> 255,'min' => 2],
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
            'email' => 'Email',
        ];
    }
}
