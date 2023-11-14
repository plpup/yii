<?php

use yii\db\Migration;

class m231110_094015_posts extends Migration
{
    
    public function safeUp()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(), 
            'content' => $this->text()->notNull(),
            'author' => $this->string()->notNull(),
            'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    public function safeDown()
    {
        echo "m231110_094015_posts cannot be reverted.\n";

        return false;
    }
}
