<?php

use yii\db\Migration;

class m190912_120130_create_table_lecture extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%lecture}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text()->notNull(),
            'body' => $this->text()->notNull(),
            'meta_keyword' => $this->string(),
            'meta_description' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'created_by' => $this->integer(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%lecture}}');
    }
}
