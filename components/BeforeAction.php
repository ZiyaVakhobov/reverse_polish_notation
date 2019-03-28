<?php

namespace app\components;


use Yii;
use yii\base\Behavior;
use yii\web\Controller;
use yii\web\Cookie;

class BeforeAction extends Behavior
{

    public $rules = [];

    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'beforeAction'
        ];
    }


    public function beforeAction()
    {
        if (!Yii::$app->request->cookies->has('token')) {
            $random = Yii::$app->security->generateRandomString();
            $cookie = new Cookie([
                'name' => 'token',
                'value' => $random
            ]);
            Yii::$app->response->cookies->add($cookie);
        }
    }
}