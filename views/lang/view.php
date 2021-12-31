<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Languages */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Course', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="languages-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Profile', ['index', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name:ntext',
            'gender',
            'email:ntext',
             'phone',
            'course',
            array(
                'format' =>['image', ['width'=>'100', 'height' => '100']] ,
                'attribute' => 'image_path',
                'value' => Yii::getAlias('@imgurl') . '/' . $model->image_path
            ),
        ],
    ]) ?>

</div>
