<?php
namespace app\components;

use Yii;

/**
 * Extended yiiwebUser
 *
 * This allows us to do "Yii::$app->user->something" by adding getters
 * like "public function getSomething()"
 *
 * So we can use variables and functions directly in `Yii::$app->user`
 */
class User extends yiiwebUser
{
    public function getUsername()
    {
        return Yii::$app->user->identity->username;
    }

    public function getName()
    {
        return Yii::$app->user->identity->name;
    }
}