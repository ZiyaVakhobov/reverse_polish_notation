<?php

namespace app\components\services;


use app\models\Calculator;
use app\models\Logging;
use Yii;

class LoggerService
{

    private $token;

    public function __construct()
    {
        $this->token = Yii::$app->request->cookies->get('token');
    }

    public function addLog(Calculator $calculator)
    {
        $logger = new Logging();
        $logger->expression = $calculator->expression;
        $logger->result = $calculator->result;
        $logger->user_id = $this->token;
        $logger->save();
    }

    public function list()
    {
        return Logging::find()->where(['user_id'=>$this->token])->all();
    }
}