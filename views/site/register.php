<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $registerForm */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\models\User;

$this->title = 'Register';
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>Please fill out the following fields to sign up:</p>

<?php $registerForm = ActiveForm::begin([
    'id' => 'register-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>

<?= $registerForm->errorSummary($newUser) ?>
<?= $registerForm->field($newUser, 'username')->textInput(['autofocus' => true]) ?>
<?= $registerForm->field($newUser, 'email')->textInput() ?>
<?= $registerForm->field($newUser, 'password')->passwordInput(['value' => '']) ?>

<?php //= $registerForm->field($newUser, 'rememberMe')->checkbox([
//    'template' => "<div class=\"offset-lg-1 col-lg-3 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
//]) ?>

<div class="form-group">
    <div class="offset-lg-1 col-lg-11">
        <?= Html::submitButton('Sign Up', ['class' => 'btn btn-primary', 'name' => 'register-button']); ?>

    </div>
</div>

<?php ActiveForm::end(); ?>
