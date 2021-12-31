<?php


use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SignupForm */
/* @var $form ActiveForm */
$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-register">
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput()?>
        <?= $form->field($model, 'password_repeat')->passwordInput() ?>
    
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-register -->
