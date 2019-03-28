<?php

namespace app\models;

use yii\base\Model;

/**
 * Class Calculator
 * @package app\models
 * @property string $expression
 * @property string $result
 */
class Calculator extends Model
{
    public $expression;

    public $result = '';

    public function rules()
    {
        return  [
            ['expression','match','pattern' => '(([0-9])\d+|\+|\-|\*|\/|\ )'],
            ['expression','required'],
        ];
    }

    protected function checkArguments($attribute,$params)
    {
        if (strlen($this->$attribute)<3) {
            $this->addError($attribute, "not enough arguments");
        }
    }

    protected function checkOperations($attribute,$params)
    {
        $numbers = 0;
        $operations = 0;
        foreach (explode(' ',$this->$attribute) as $item) {
            if (is_numeric($item)) {
                $numbers++;
            } elseif (in_array($item,['+','-','*','/','^'])) {
                $operations++;
            } else {
              $this->addError($attribute, "$attribute should have only numbers and '+','-','*','/' operations. Others are not permited");
            }
        }
    }
    public function calc()
    {
        if (!$this->validate()) {
            $this->result = 0;
            return false;
        }
        $stack = [];

        foreach (explode(' ',$this->expression) as $item) {
            if (in_array($item, ['*', '/', '+', '-', '^']))
            {
                $b = array_pop($stack);
                $a = array_pop($stack);
                switch ($item)
                {
                    case '*': $res = $a*$b; break;
                    case '/': $res = $a/$b; break;
                    case '+': $res = $a+$b; break;
                    case '-': $res = $a-$b; break;
                    case '^': $res = pow($a,$b); break;
                }
                array_push($stack, $res);
            } else {
                array_push($stack, $item);
            }
        }
        $this->result = array_pop($stack);
        return true;
    }

}