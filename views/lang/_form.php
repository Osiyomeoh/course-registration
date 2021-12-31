<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Languages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="languages-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'gender')->dropdownList([
               'Male' => 'Male',
               'Female' => 'Female'],
                ['prompt' => 'Select Gender']
    ); ?>


    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'course')->dropdownList([
                'Backend Developer' => 'Backend Developer',
                'Frontend Developer' => 'Frontend Developer',
                'UI/UX Developer' => 'UI/UX Developer',
                'Data science Developer' => 'Data science Developer'],
                ['prompt' => 'Select Course']
    ); ?>

    
    <?= $form->field($model, 'image_path')->fileInput() ?>
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
