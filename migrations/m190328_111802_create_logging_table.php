<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%logging}}`.
 */
class m190328_111802_create_logging_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%logging}}', [
            'id' => $this->primaryKey(),
            'user_id'   =>  $this->string(),
            'expression'    =>  $this->string(),
            'result'    =>  $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%logging}}');
    }
}
