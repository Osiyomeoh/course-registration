<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LanguagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="languages-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (yii::$app->user->username):
        ?>
    <p>
        <?= Html::a('Create Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
        <?php endif ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php if (yii::$app->user->username): ?>
    <?= GridView::widget([
        function($model){return $model->image_path; },
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name:ntext',
            'email:ntext',
            'gender:ntext',
            'phone',
            'course:ntext',

            array(
                'format' => 'image',
                'attribute' => 'image_path',
                'value' => Yii::getAlias('@imgurl') . '/' .$model->image_path
            ),

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
  <?php endif ?>
  <?php if (!yii::$app->user->username): ?>
    <p>
        YOU ARE NOT LOGGED IN.
    </p>
    <?=Html::a('login' , ['/site/login'], ['class'=>'btn btn-primary']) ?>
    <?php endif; ?>


</div>
