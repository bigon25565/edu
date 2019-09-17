<?php

use yii\db\Migration;

class m190916_101501_create_table_answer_file_upload extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%answer_file_upload}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'file_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'attempt' => $this->tinyInteger()->notNull()->defaultValue('1'),
            'file_link' => $this->string()->notNull(),
            'file_type' => $this->string(),
            'time_left' => $this->integer(),
            'created_by' => $this->integer(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%answer_file_upload}}');
    }
}
