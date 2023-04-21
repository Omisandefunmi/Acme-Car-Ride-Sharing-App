<?php

use yii\helpers\Url;
use \yii\helpers\Html;

$activationUrl = Url::to(['site/activate', 'user' => $user->id, 'token' => $user->uid], true);
echo 'Please click ', Html::a('here', $activationUrl), ' to activate you acme account';
