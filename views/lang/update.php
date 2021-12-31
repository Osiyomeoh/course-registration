<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Languages */

$this->title = 'Update Friends: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Friends', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="languages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
