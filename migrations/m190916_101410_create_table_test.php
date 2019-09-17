<?php

use yii\db\Migration;

class m190916_101410_create_table_test extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%test}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->comment('Название задания'),
            'description' => $this->text()->comment('Краткое описание задания'),
            'type' => $this->string()->notNull()->comment('Тип задания'),
            'begin_at' => $this->dateTime(),
            'end_at' => $this->dateTime(),
            'deadline_at' => $this->dateTime(),
            'count_attempt' => $this->tinyInteger()->notNull()->defaultValue('1')->comment('Количество попвток на выполнение '),
            'is_exam' => $this->tinyInteger()->notNull()->defaultValue('0')->comment('Аттестующий тест'),
            'is_draft' => $this->tinyInteger()->notNull()->defaultValue('1')->comment('Черновик'),
            'time_limit' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%test}}');
    }
}
