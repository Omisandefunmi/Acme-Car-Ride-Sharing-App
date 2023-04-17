<?php

namespace app\models;

use Yii;
class Mailer{
    const TYPE_REGISTRATION = 1;
    private static $from = ['omisandefunmi@gmail.com' => 'Acme Mailer'];
    private static $to;
    private static $subject;
    private static $renderFile;
    private static $renderParams = [];

    public static function validate($type, $model){
        switch ($type){
            case self::TYPE_REGISTRATION:
                if(empty($model->id) || empty($model->uid) || empty($model->email) || empty($model->username)){
                    return false;
                }
                self::$to = [$model->email];
                self::$subject = 'Activate Your Acme Account';
                self::$renderFile = 'registration';
                self::$renderParams = ['user' => $model];
                break;
            default:
                return false;
        }
        return true;
    }
    public static function send($type, $model){
        if(!self::validate($type, $model)){
            return false;
        }
        $message = \Yii::$app->mailer->compose(self::$renderFile, self::$renderParams);
        return $message -> setFrom(self::$from)->setTo(self::$to)->setSubject(self::$subject)->send();
    }
}
