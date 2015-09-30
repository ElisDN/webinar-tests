<?php

use yii\db\Schema;
use yii\db\Migration;

class m150930_171133_create_user_table extends Migration
{
    public function up()
    {
        $this->createTable('{{user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{user}}');
    }
}
