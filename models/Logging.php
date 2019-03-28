<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logging".
 *
 * @property int $id
 * @property string $user_id
 * @property string $expression
 * @property string $result
 */
class Logging extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logging';
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'expression' => 'Expression',
            'result' => 'Result',
        ];
    }
}
